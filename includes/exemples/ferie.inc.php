<?php
$idFerie = $_GET['id'];

if (empty($_GET['task'])){
	$actionTask = "&task=save";
}else{
	$task = $_GET['task'];
}



//----------------------------------------------------------------
if ($task == "save" || $task == "update") {
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$nomFerie = $_POST['nomFerie'];
$zoneFerie = $_POST['zoneFerie'];
$dateFerie = date_encode($_POST['dateFerie']);


	//----------------------------------------------------------------
	if ($task == "save"){
		
		$req = "INSERT INTO feries SET date_ferie = '$dateFerie', nom_ferie = '$nomFerie', zone_ferie = '$zoneFerie'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "addSuccess";

	//----------------------------------------------------------------
	}else{
	//----------------------------------------------------------------
	if ($task == "update"){
		
		
		
		
												
			$req = "UPDATE feries SET date_ferie='$dateFerie', nom_ferie = '$nomFerie', zone_ferie = '$zoneFerie' WHERE id_ferie = '$idFerie'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "updSuccess";
					
		}
	//----------------------------------------------------------------
	}

	echo "<script>
          document.location='index.php?page=feries&message=". $messageSql ."';
          </script>";

mysqli_close();		  
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($task =="edit") {



$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * from feries WHERE id_ferie=". $idFerie ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idFerie = $ligne['id_ferie'];
  $dateFerie = date_decode($ligne['date_ferie']);
  $nomFerie = $ligne['nom_ferie'];
  $zoneFerie = $ligne['zone_ferie'];
 }
 
mysqli_close();

$actionTask = "&task=update&id=$idFerie";
}
//----------------------------------------------------------------

//------- Recuperation liste des zones --------------
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_select_db($dbName,$db);
mysqli_query($db, "SET NAMES 'utf8'");

$req="SELECT * FROM zones";
$resultat=mysqli_query($db, $req) or die ('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idZone = $ligne['id_zone'];
  $nomZone = $ligne['nom_zone'];
  $communesZone = $ligne['nom_ferie'];
  
  if ($task =="edit") {
	 if ($zoneFerie == $idZone){
		$selected="selected";
	 }else{
		$selected="";
	 }
  }else{
		$selected="";
  }
  
  
  $selectZone .= "<option value='$idZone' $selected>$nomZone</option>";
}
 if ($task =="edit") {
	if($zoneFerie == "1,2"){
	 $selectZone .= "<option value='1,2' selected >Toutes les Zones</option>";
	}else{
		 $selectZone .= "<option value='1,2'>Toutes les Zones</option>";
	}
 }else{
	 $selectZone .= "<option value='1,2'>Toutes les Zones</option>";
 }
	
mysqli_close();

//----------------------------------------------------------------
if ($task == "suppr"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idFerie = mysqli_real_escape_string($_GET['id']);

$req = "SELECT * from feries INNER JOIN zones ON feries.zone_ferie = zones.id_zone WHERE id_ferie=". $idFerie ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idFerie = $ligne['id_ferie'];
  $nomFerie = $ligne['nom_ferie'];
  $dateFerie = $ligne['date_ferie'];
  $zoneFerie = $ligne['zone_ferie'];
  $nomZone = $ligne['nom_zone'];
 }
 
mysqli_close();
	echo '<div class="container" style="text-align:center;">Voulez-vous vraiment SUPPRIMER ce jour férié ?<br />
	<form method="post" action="index.php?page=ferie&task=supprOK&id='. $idFerie .'"><br /><br />
	<p style="font-weight:bold">Jour férié ID : '. $idFerie .' - date du jour férié : '. date_decode($dateFerie) .'</p><br />
	<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;<input type="submit" name="Supprimer" id="Supprimer" value="Supprimer">
	
	</form>
	</div>
	';
exit();
}

if ($task == "supprOK"){

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_select_db($dbName,$db);
mysqli_query($db, "SET NAMES 'utf8'");
$idReport = mysqli_real_escape_string($_GET['id']);
$req = "DELETE from feries WHERE id_ferie = '$idFerie'";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

$messageSql = "supprSuccess";


echo "<script>
          document.location='index.php?page=feries&message=". $messageSql ."';
          </script>";
	
}
//----------------------------------------------------------------

mysqli_close();

?>


<form method="post" action="index.php?page=ferie<?php echo $actionTask ?>">


<div class="container">
<div style="border-bottom: 2px dashed #cccccc;margin-bottom:20px;">
<a href="index.php" title="Retour au panneau d'administration"><img style="float:left;" src="images/panel.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/jferie.png" style="width:50px;margin-right:48px;"/><br />Ajout d'un jour férié</div>
</div>

Date : <input id="dateFerie" name="dateFerie" class="datepicker" value="<?php echo $dateFerie; ?>" required ></input><br /><br />
Nom : <input type="text" value="<?php echo $nomFerie; ?>" name="nomFerie" id="nomFerie" /><br /><br />
Zone : <select id="zoneFerie" name="zoneFerie"><?php echo $selectZone; ?></select><br /><br />




<div style="text-align:center;">
<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="boutonValider" value=" Valider ">
</div>
</form>
</div><br /><br />


<script>
 $(function() {
	jQuery("#zoneFerie").chosen();

<?php if ($task != 'edit'){ ?>	
	var today = new Date();
	var dateString = $.datepicker.formatDate("dd/mm/yy", today);
	$('#dateFerie.datepicker').val(dateString);
<?php }else{ ?>
	dateString = '<?php echo $dateFerie; ?>';
	$('#dateFerie.datepicker').val(dateString);
<?php } ?>
	$('input').filter('.datepicker').datepicker({ closeText: 'Fermer',prevText: 'Précédent',nextText: 'Suivant',currentText: 'Aujourd\'hui',monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],firstDay:1,monthNamesShort: ['Jan.', 'Fév.', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],dayNamesMin: ['D', 'L', 'Ma', 'Me', 'J', 'V', 'S'],dateFormat:"dd/mm/yy"});
});
</script>
