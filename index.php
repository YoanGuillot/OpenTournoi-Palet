<?php

//Interdit l'accès directe
define( '_LPDT', 1 );
//Connexion à la base de donnée
$db = new SQLite3('includes/conf/tournois.db');
//Chargement des fonctions
include 'includes/fonctions.inc.php';
?>
<!DOCTYPE html>
<head>
    <title>Tournoi de Palet</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<script src="js/fonctions.js"></script>

</head>

<body>
<?php

print_r($_POST);
//die();


if (isset($_GET['idtournoi'])){
	$idTournoi = $_GET['idtournoi'];
	if (!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = "gestion";
	}
}else{
	$page="accueil";
}

//Inclure les actions
include 'includes/actions.inc.php';


//renvoi vers le dashboard dashboard
include 'includes/dashboard.inc.php';
?>

</body>
</html>

<?php $db->close(); ?>