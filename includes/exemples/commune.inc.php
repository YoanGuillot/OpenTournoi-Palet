<?php
$idCommune = $_GET['id'];

if (empty($_GET['task'])){
	$actionTask = "&task=save";
}else{
	$task = $_GET['task'];
}

//----------------------------------------------------------------
if ($task == "save" || $task == "update") {
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCommune = intval($_GET['id']);
$nomCommune = mysqli_real_escape_string($_POST['nomCommune']);
$cpCommune = intval($_POST['cpCommune']);
$telCommune = mysqli_real_escape_string($_POST['telCommune']);
$faxCommune = mysqli_real_escape_string($_POST['faxCommune']);
$emailCommune = mysqli_real_escape_string($_POST['emailCommune']);
$idDechetterie = intval($_POST['idDechetterie']);


	//----------------------------------------------------------------
	if ($task == "save"){
		
		$req = "INSERT INTO communes SET id_commune='$idCommune', nom_commune = '$nomCommune', cp_commune = '$cpCommune', tel_commune = '$telCommune', fax_commune = '$faxCommune', email_commune = '$emailCommune', id_dechetterie = '$idDechetterie'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "addSuccess";

	//----------------------------------------------------------------
	}else{
	//----------------------------------------------------------------
	if ($task == "update"){
												
			$req = "UPDATE communes SET id_commune='$idCommune', nom_commune = '$nomCommune', cp_commune = '$cpCommune', tel_commune = '$telCommune', fax_commune = '$faxCommune', email_commune = '$emailCommune', id_dechetterie = '$idDechetterie' WHERE id_commune = '$idCommune'";
			$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
			$messageSql = "updSuccess";
					
		}
	//----------------------------------------------------------------
	}

	echo "<script>
          document.location='index.php?page=communes&message=". $messageSql ."';
          </script>";

mysqli_close();		  
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($task =="edit") {



$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * from communes WHERE id_commune=". $idCommune ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idCommune = $ligne['id_commune'];
  $nomCommune = $ligne['nom_commune'];
  $cpCommune = $ligne['cp_commune'];
  $telCommune = $ligne['tel_commune'];
  $faxCommune = $ligne['fax_commune'];
  $emailCommune = $ligne['email_commune'];
  $idDechetterie = $ligne['id_dechetterie'];
 }
 
mysqli_close();

$actionTask = "&task=update&id=$idCommune";
}
//----------------------------------------------------------------

//----------------------------------------------------------------
if ($task == "suppr"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCommune = mysqli_real_escape_string($_GET['id']);

$req = "SELECT * from communes WHERE id_commune=". $idCommune ."";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $nomCommune = $ligne['nom_commune'];
 }
 
mysqli_close();
	echo '<div class="container" style="text-align:center;">Voulez-vous vraiment SUPPRIMER cette commune ? Attention, cela aura pour conséquence la suppression des informations liées à cette communes !<br />
	<form method="post" action="index.php?page=commune&task=supprOK&id='. $idCommune .'"><br /><br />
	<p style="font-weight:bold">'. $nomCommune .'</p><br />
	<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;<input type="submit" name="Supprimer" id="Supprimer" value="Supprimer">
	
	</form>
	</div>
	';
exit();
}

if ($task == "supprOK"){
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");

$req1 = "DELETE from bornes WHERE bornes.id_commune = $idCommune";
$resultat1 = mysqli_query($db, $req1) or die('SQL Error :: '.mysqli_error());

$req2 = "DELETE from collectes WHERE collectes.id_commune = $idCommune";
$resultat2 = mysqli_query($db, $req2) or die('SQL Error :: '.mysqli_error());

$req3 = "DELETE from liaisondechetterie WHERE liaisondechetterie.id_commune = $idCommune";
$resultat3 = mysqli_query($db, $req3) or die('SQL Error :: '.mysqli_error());

while ($ligne = mysqli_fetch_assoc($resultat)) {
  $nomCommune = $ligne['nom_commune'];
  
 }
 
mysqli_close();

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$idCommune = mysqli_real_escape_string($_GET['id']);
$req = "DELETE from communes WHERE id_commune = '$idCommune'";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());

$messageSql = "supprSuccess";


echo "<script>
          document.location='index.php?page=communes&message=". $messageSql ."';
          </script>";
		  



}
//----------------------------------------------------------------

mysqli_close();


$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = "SELECT * FROM dechetteries";
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $idListeDechetterie = $ligne['id_dechetterie'];
  $nomListeDechetterie = $ligne['nom_dechetterie'];
 
	if ($idDechetterie == $idListeDechetterie){
		$selected = "selected";
	}else{
		$selected = "";
	}
  
  $listeDechetteries .= "<OPTION value='$idListeDechetterie' $selected>$nomListeDechetterie</OPTION>";
}
 
 mysqli_close();


?>


<form method="post" action="index.php?page=commune<?php echo $actionTask ?>">


<div class="container">
<div style="border-bottom: 2px dashed #cccccc;margin-bottom:20px;">
<a href="index.php" title="Retour au panneau d'administration"><img style="float:left;" src="images/panel.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/communes.png" style="width:50px;margin-right:48px;"/><br />Ajout d'une commune</div>
</div>
Nom de la communes : <input type="text" value="<?php echo $nomCommune; ?>" name="nomCommune" id="nomCommune" required /><br /><br />
Code Postal de la communes : <input type="text" value="<?php echo $cpCommune; ?>" name="cpCommune" id="cpCommune" /><br /><br />
Téléphone de la communes : <input type="text" value="<?php echo $telCommune; ?>" name="telCommune" id="telCommune" /><br /><br />
Fax de la communes : <input type="text" value="<?php echo $faxCommune; ?>" name="faxCommune" id="faxCommune" /><br /><br />
Email de la communes : <input type="text" size="50" value="<?php echo $emailCommune; ?>" name="emailCommune" id="emailCommune" /><br /><br />
Déchèterie principale : <select id="idDechetterie" name="idDechetterie"><?php echo $listeDechetteries; ?></select>




<div style="text-align:center;">
<input type="button" onClick="javascript:history.go(-1);" name="boutonAnnuler" Value="Annuler" />&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="boutonValider" value=" Valider ">
</div>
</form>
</div><br /><br />




<script src="js/bootstrap.js"></script>
