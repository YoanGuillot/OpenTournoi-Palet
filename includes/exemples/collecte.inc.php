<?php
$idCollecte = $_GET['id'];

if (empty($_GET['task'])){
	$actionTask = "&task=save";
}else{
	$task = $_GET['task'];
}

//----------------------------------------------------------------
if ($task == "save" || $task == "update") {
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCollecte = intval($_GET['id']);
$jourCollecte = mysqli_real_escape_string($_POST['jourCollecte']);
$idCommune = intval($_POST['idCommune']);
$plageCollecte = intval($_POST['plageCollecte']);
$specialCollecte = intval($_POST['specialCollecte']);
$lieuxCollecte = mysqli_real_escape_string($_POST['lieuxCollecte']);
$idType = intval($_POST['idType']);


	//----------------------------------------------------------------
	if ($task == "save"){
		
		$req = "INSERT INTO collectes SET id_collecte = '$idCollecte', id_commune='$idCommune', jour_collecte = '$jourCollecte', plage_collecte = '$plageCollecte', id_type = '$idType', special_collecte = '$specialCollecte', lieux_collecte = '$lieuxCollecte'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "addSuccess";

	//----------------------------------------------------------------
	}else{
	//----------------------------------------------------------------
	if ($task == "update"){
												
			$req = "UPDATE collectes SET id_commune='$idCommune', jour_collecte = '$jourCollecte', plage_collecte = '$plageCollecte', id_type = '$idType', special_collecte = '$specialCollecte', lieux_collecte = '$lieuxCollecte' WHERE id_collecte = '$idCollecte'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "updSuccess";
					
		}
	//----------------------------------------------------------------
	}

	echo "<script>
          document.location='index.php?page=collectes&message=". $messageSql ."';
          </script>";

mysqli_close();		  
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($task =="edit") {



$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * from collectes WHERE id_collecte=". $idCollecte ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idCollecte = $ligne['id_collecte'];
  $idCommune = $ligne['id_commune'];
  $jourCollecte = $ligne['jour_collecte'];
  $plageCollecte = $ligne['plage_collecte'];
  $idType = $ligne['id_type'];
  $specialCollecte = $ligne['special_collecte'];
  $lieuxCollecte = $ligne['lieux_collecte'];
 }
 
 $$jourCollecte = "selected";
 
mysqli_close();

$actionTask = "&task=update&id=$idCollecte";
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($task == "suppr"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCollecte = mysqli_real_escape_string($_GET['id']);

$req = "SELECT * FROM collectes JOIN communes ON collectes.id_commune = communes.id_commune JOIN type ON collectes.id_type = type.id_type WHERE id_collecte=". $idCollecte ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $nomCommune = $ligne['nom_commune'];
  $jourCollecte = $ligne['jour_collecte'];
  $lieuxCollecte = $ligne['lieux_collecte'];
  $nomType = $ligne['nom_type'];
  $plageCollecte = $ligne['plage_collecte'];
 }
 
 if ($plageCollecte == 1){
			$plageCollecte = "matin";
		}
		if ($plageCollecte == 2){
			$plageCollecte = "après-midi";
		}
		if ($plageCollecte == 3){
			$plageCollecte = "matin paire";
		}
		if ($plageCollecte == 4){
			$plageCollecte = "après-midi paire";
		}
		if ($plageCollecte == 5){
			$plageCollecte = "matin impaire";
		}
		if ($plageCollecte == 6){
			$plageCollecte = "après-midi, impaire";
	}
 
mysqli_close();
	echo '<div class="container" style="text-align:center;">Voulez-vous vraiment SUPPRIMER cette collecte ?<br />
	<form method="post" action="index.php?page=collecte&task=supprOK&id='. $idCollecte .'"><br /><br />
	<p style="font-weight:bold">'. $nomCommune .' - '. $nomType .' - '. $jourCollecte .', '. $plageCollecte .'</p><br />
	<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;<input type="submit" name="Supprimer" id="Supprimer" value="Supprimer">
	
	</form>
	</div>
	';
exit();
}

if ($task == "supprOK"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCollecte = mysqli_real_escape_string($_GET['id']);
$req = "DELETE from collectes WHERE id_collecte = '$idCollecte'";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

$messageSql = "supprSuccess";


echo "<script>
          document.location='index.php?page=collectes&message=". $messageSql ."';
          </script>";
		  



}
//----------------------------------------------------------------

mysqli_close();


$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * FROM communes";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idListeCommune = $ligne['id_commune'];
  $nomListeCommune = $ligne['nom_commune'];
   
	if ($idListeCommune == $idCommune){
		$selected = "selected";
	}else{
		$selected = "";
	}
  
  $listeCommunes .= "<OPTION value='$idListeCommune' $selected>$nomListeCommune</OPTION>";
}
 
 mysqli_close();
 
 $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * FROM type";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idListeType = $ligne['id_type'];
  $nomListeType = $ligne['nom_type'];
   
	if ($idListeType == $idType){
		$selected = "selected";
	}else{
		$selected = "";
	}
  
  $listeTypes .= "<OPTION value='$idListeType' $selected>$nomListeType</OPTION>";
}
 
 mysqli_close();

 ${'_'.$plageCollecte} = "selected";
 
 $listePlageCollecte = "<option value='1' $_1>matin</option><option value='2' $_2>après-midi</option><option value='3' $_3>matin paire</option><option value='4' $_4>matin impaire</option><option value='5' $_5>après-midi paire</option><option value='6' $_6>après-midi impaire</option>";
 
 
 
$listeJourCollecte = "<option value='Lundi' $Lundi>Lundi</option><option value='Mardi' $Mardi>Mardi</option><option value='Mercredi' $Mercredi>Mercredi</option><option value='Jeudi' $Jeudi>Jeudi</option><option value='Vendredi' $Vendredi>Vendredi</option><option value='Samedi' $Samedi>Samedi</option><option value='Dimanche' $Dimanche>Dimanche</option>";

if ($specialCollecte == 1){
		$checked = "checked";
	}else{
		$checked = "";
	}

?>


<form method="post" action="index.php?page=collecte<?php echo $actionTask ?>">


<div class="container">
<div style="border-bottom: 2px dashed #cccccc;margin-bottom:20px;">
<a href="index.php" title="Retour au panneau d'administration"><img style="float:left;" src="images/panel.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/collecte.png" style="width:50px;margin-right:48px;"/><br />Ajout d'une collecte</div>
</div>
Communes : <select id="idCommune" name="idCommune"><?php echo $listeCommunes ?></select><br /><br />
Type de collecte : <select id="idType" name="idType"><?php echo $listeTypes ?></select><br /><br />
Jour de collecte : <select id="jourCollecte" name="jourCollecte"><?php echo $listeJourCollecte ?></select><br /><br />
Plage collecte : <select id="plageCollecte" name="plageCollecte"><?php echo $listePlageCollecte ?></select><br /><br />
Lieu de la collecte : <textarea name="lieuxCollecte" id="lieuxCollecte" /><?php echo $lieuxCollecte; ?></textarea><br /><br />
Collecte spéciale : <input id="specialCollecte" name="specialCollecte" type="checkbox" value="1" <?php echo $checked ?>></input>



<div style="text-align:center;">
<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="boutonValider" value=" Valider ">
</div>
</form>
</div><br /><br />




<script src="js/bootstrap.js"></script>
