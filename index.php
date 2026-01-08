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



//print_r($_POST);
//die();



//renvoi vers le dashboard dashboard
include 'includes/dashboard.inc.php';

?>

</body>
</html>

<?php $db->close(); ?>