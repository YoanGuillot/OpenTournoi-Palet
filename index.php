<?php
//Interdit l'accès directe
define( '_LPDT', 1 );
date_default_timezone_set("Europe/Paris");

ini_set("default_charset", 'utf-8');

if (isset($_GET['idtournoi'])){
	$idTournoi = $_GET['idtournoi'];

	//Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');
	if (!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = "gestion";
	}
}else{
	if(!file_exists('includes/conf/tournois.db')){
		copy('./includes/conf/models/tournois.db', './includes/conf/tournois.db');
	}
	//Connexion à la base de donnée
	$db = new SQLite3('includes/conf/tournois.db');

	$page="accueil";
}

//Vérification des mise à jour de base de données
//////// creation equipes_poule_pf ///////////
	// Vérifier si la table existe déjà
	// La table n'existe pas, on l'importe
	// Exécuter le script SQL pour créer la table
	$sql = "
	PRAGMA foreign_keys = off;
	BEGIN TRANSACTION;
	-- Tableau : equipes_poule_pf
	CREATE TABLE IF NOT EXISTS equipes_poule_pf (
		id_equipe_poule_pf INTEGER PRIMARY KEY AUTOINCREMENT, 
		num_equipe NUMERIC, 
		num_phasefinale NUMERIC REFERENCES phases_finales (num_phasefinale) ON DELETE CASCADE, 
		nb_victoires NUMERIC,
		pts_pour NUMERIC,
		pts_contre NUMERIC,
		pts_diff NUMERIC
	);
	COMMIT TRANSACTION;
	PRAGMA foreign_keys = on;
	";
    $db->exec($sql);



//Chargement des fonctions
include 'includes/fonctions.inc.php';

//Inclure les actions
include 'includes/actions.inc.php';


// Handle AJAX FTP test request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'testFTP') {
    // Process FTP test here
    $ftpServer = $_POST['ftpServer'] ?? '';
    $ftpUsername = $_POST['ftpUsername'] ?? '';
    $ftpPassword = $_POST['ftpPassword'] ?? '';
    $ftpPort = $_POST['ftpPort'] ?? 21;
    
    // Your FTP connection test logic
    $result = testFTPConnection($ftpServer, $ftpUsername, $ftpPassword, $ftpPort);
    
    // Return ONLY the result, then exit
    echo $result;
    exit;
}


?>
<!DOCTYPE html>
<head>
    <title>Tournoi de Palet</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/arbres.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<script src="js/fonctions.js"></script>

	

</head>

<body>
	
<?php
	if ($page != 'accuei') { ?>
	<div style="position: fixed;top: 60px; right: 100px;z-index: 1000;">
		<a href="#" style="background-color: #FFFFFF; color: #000000;border:1px solid #cccccc; border-radius:50%; padding: 16px; box-shadow: 0 5px 25px rgba(0,0,0,.1)" class="uk-icon-link generate-web-btn" title="Générer site Web" data-idtournoi="<?= $idTournoi ?>" data-uk-tooltip data-uk-icon="icon: cloud-upload"></a>
		</a>
	</div>
<?php } 


//renvoi vers le dashboard dashboard
include 'includes/dashboard.inc.php';

?>

<!-- Modal pour affichage du résultat de generateweb.php -->
<div id="generateWebModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h3 class="uk-modal-title">Génération du site web</h3>
        <div id="generateWebModalContent" style="max-height:60vh; overflow:auto;">
            <div class="uk-text-center uk-padding-small">
                <div uk-spinner="ratio: 1.5"></div>
                <div>Génération en cours, veuillez patienter...</div>
            </div>
        </div>
        <div class="uk-text-right uk-margin-top">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fermer</button>
        </div>
    </div>
</div>

<script>
// petit helper pour échapper le HTML (afin d'afficher le output brut)


$(document).ready(function() {
    $('.generate-web-btn, .generate-web-btn-gestion').on('click', function(e){
        e.preventDefault();
        var idtournoi = $(this).data('idtournoi');
        var $modal = UIkit.modal('#generateWebModal');
        // afficher modal et loader
        $('#generateWebModalContent').html('<div class="uk-text-center uk-padding-small"><div uk-spinner="ratio: 1.5"></div><div>Génération en cours, veuillez patienter...</div></div>');
        $modal.show();

        // lancer la requête AJAX (GET car generateweb.php lit idtournoi en GET)
        $.ajax({
            url: 'generateweb.php',
            method: 'GET',
            data: { idtournoi: idtournoi },
            dataType: 'text',
            timeout: 120000, // augmenter si génération/FTP prend du temps
            success: function(response) {
                // afficher la réponse brute en conservant la mise en forme
                $('#generateWebModalContent').html('<pre style="white-space:pre-wrap; word-wrap:break-word;">' + response + '</pre>');
            },
            error: function(xhr, status, err) {
                var msg = 'Erreur lors de la génération (' + status + ')';
                if (xhr && xhr.responseText) msg += ' : ' + xhr.responseText;
                $('#generateWebModalContent').html('<div class="uk-alert-danger" uk-alert><p>' + msg + '</p></div>');
            }
        });
    });
});
</script>



</body>
</html>

<?php $db->close(); ?>