<?php
$idReport = $_GET['id'];

if (empty($_GET['task'])){
	$actionTask = "&task=save";
}else{
	$task = $_GET['task'];
}

$dateActuelle = date('Ymd');
$dateActuelle = intval($dateActuelle);

//----------------------------------------------------------------
if ($task =="edit") {



$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * from report WHERE id_report=". $idReport ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idReport = $ligne['id_report'];
  $dateReport = date_decode($ligne['date_report']);
  $idFerie = $ligne['id_ferie'];
  $idCollecte = $ligne['id_collecte'];
 }
 
mysqli_close();

$actionTask = "&task=update&id=$idReport";
}
//----------------------------------------------------------------

//------- Recuperation liste des futurs jours feries--------------
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");

$req="SELECT * FROM feries WHERE date_ferie > $dateActuelle";
$resultat=mysqli_query($db, $req) or die ('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idFerieListe = $ligne['id_ferie'];
  $dateFerieListe = $ligne['date_ferie'];
  $zoneFerieListe = $ligne['zone_ferie'];
  $nomFerieListe = $ligne['nom_ferie'];
  $selectedDateFerie = "";
  if ($task == "edit"){
	if ($idFerie == $idFerieListe){
		$selectedDateFerie = "selected='selected'";
	}
  }
  
  $selectFerie .= "<option value='$idFerieListe' $selectedDateFerie >$nomFerieListe</option>";
}

mysqli_close();

//------- Recuperation liste des collectes--------------
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");

$req="SELECT * FROM collectes INNER JOIN communes ON collectes.id_commune = communes.id_commune INNER JOIN type ON collectes.id_type = type.id_type  ORDER BY communes.nom_commune";
$resultat=mysqli_query($db, $req) or die ('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idCollecteListe = $ligne['id_collecte'];
  $nomCommuneListe = $ligne['nom_commune'];
  $lieuxCollecteListe = $ligne['lieux_collecte'];
  $jourCollecteListe = $ligne['jour_collecte'];
  $nomTypeListe = $ligne['nom_type'];
  $plageCollecteListe = $ligne['plage_collecte'];
  
  if ($plageCollecteListe == 1){
	$plageCollecteListe = "matin";
	$colorLabelListe = "lightgray";
  }
  if ($plageCollecteListe == 2){
	$plageCollecteListe = "après-midi";
	$colorLabelListe = "lightgray";
  }
  if ($plageCollecteListe == 3){
	$plageCollecteListe = "matin, semaine paire";
	$colorLabelListe = "lightyellow";
  }
  if ($plageCollecteListe == 4){
	$plageCollecteListe = "après-midi, semaine paire";
	$colorLabelListe = "lightyellow";
  }
  if ($plageCollecteListe == 5){
	$plageCollecteListe = "matin, semaine impaire";
	$colorLabelListe = "lightyellow";
  }
  if ($plageCollecteListe == 6){
	$plageCollecteListe = "après-midi, semaine impaire";
	$colorLabelListe = "lightyellow";
  }
  
  if ($lieuxCollecteListe != ""){
	$nomCommuneListe = substr($lieuxCollecteListe,0,30).'...';
  }
  $selectedCollecte = "";
   if($task == "edit"){
	if ($idCollecte == $idCollecteListe){
		$selectedCollecte = "selected='selected'";  
	}
  }
  
  $selectCollecte .= "<option value='$idCollecteListe' style='background-color: $colorLabelListe;' $selectedCollecte >$nomCommuneListe - $nomTypeListe - $jourCollecteListe $plageCollecteListe</option>";
}

mysqli_close();

//----------------------------------------------------------------
if ($task == "save" || $task == "update") {
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCollecte = intval($_POST['idCollecte']);
$idFerie = intval($_POST['idFerie']);
$dateReport = intval(date_encode($_POST['dateReport']));



	//----------------------------------------------------------------
	if ($task == "save"){
		
		$req = "INSERT INTO report SET date_report = '$dateReport', id_ferie = '$idFerie', id_collecte = '$idCollecte'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "addSuccess";

	//----------------------------------------------------------------
	}else{
	//----------------------------------------------------------------
	if ($task == "update"){
												
			$req = "UPDATE report SET date_report='$dateReport', id_ferie = '$idFerie', id_collecte = '$idCollecte' WHERE id_report = '$idReport'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "updSuccess";
					
		}
	//----------------------------------------------------------------
	}

	echo "<script>
          document.location='index.php?page=reports&message=". $messageSql ."';
          </script>";

mysqli_close();		  
}
//----------------------------------------------------------------


//----------------------------------------------------------------
if ($task == "suppr"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idReport = mysqli_real_escape_string($_GET['id']);

$req = "SELECT * from report INNER JOIN feries ON report.id_ferie = feries.id_ferie WHERE id_report=". $idReport ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idReport = $ligne['id_report'];
  $idCollecte = $ligne['id_collecte'];
  $idFerie = $ligne['id_ferie'];
  $dateReport = $ligne['date_report'];
  $dateFerie = $ligne['date_ferie'];
 }
 
mysqli_close();
	echo '<div class="container" style="text-align:center;">Voulez-vous vraiment SUPPRIMER ce report ?<br />
	<form method="post" action="index.php?page=report&task=supprOK&id='. $idReport .'"><br /><br />
	<p style="font-weight:bold">Report ID : '. $idReport .' - date de report : '. date_decode($dateReport) .' au lieu du jour férié du '. date_decode($dateFerie) .'</p><br />
	<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;<input type="submit" name="Supprimer" id="Supprimer" value="Supprimer">
	
	</form>
	</div>
	';
exit();
}

if ($task == "supprOK"){

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idReport = mysqli_real_escape_string($_GET['id']);
$req = "DELETE from report WHERE id_report = '$idReport'";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

$messageSql = "supprSuccess";


echo "<script>
          document.location='index.php?page=reports&message=". $messageSql ."';
          </script>";
	
}
//----------------------------------------------------------------

mysqli_close();

?>


<form method="post" action="index.php?page=report<?php echo $actionTask ?>">


<div class="container">
<div style="border-bottom: 2px dashed #cccccc;margin-bottom:20px;">
<a href="index.php" title="Retour au panneau d'administration"><img style="float:left;" src="images/panel.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/reports.png" style="width:50px;margin-right:48px;"/><br />Ajout d'un report</div>
</div>

Collecte concernée : <select id="idCollecte" name="idCollecte"><?php echo $selectCollecte; ?></select><br /><br />
Jour férié concerné : <select id="idFerie" name="idFerie"><?php echo $selectFerie; ?></select><br /><br />
Date de report : <input type="text" value="<?php echo $dateReport; ?>" name="dateReport" id="dateReport" class="datepicker"required /><br /><br />




<div style="text-align:center;">
<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="boutonValider" value=" Valider ">
</div>
</form>
</div><br /><br />


<script>
 $(function() {
	jQuery("#idCollecte").chosen();
	jQuery("#idFerie").chosen();
	
	var today = new Date();
	var dateString = $.datepicker.formatDate("dd/mm/yy", today);
	$('#idCollecte.datepicker').val(dateString);
	$('input').filter('.datepicker').datepicker({ closeText: 'Fermer',prevText: 'Précédent',nextText: 'Suivant',currentText: 'Aujourd\'hui',monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],firstDay:1,monthNamesShort: ['Jan.', 'Fév.', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],dayNamesMin: ['D', 'L', 'Ma', 'Me', 'J', 'V', 'S'],dateFormat:"dd/mm/yy"});
});
</script>
