<?php
//------- Suppression des anciens reports--------------
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");

$dateActuelle = date('Ymd');
$dateSuppr = date('Ymd', strtotime($dateActuelle . '-7 day'));
$dateActuelle = intval($dateActuelle);
$dateSuppr = intval($dateSuppr);
$dateSuppr = intval($dateSuppr);


$req="DELETE FROM report WHERE date_report < $dateSuppr";
$resultat=mysqli_query($db, $req) or die ('SQL Error :: '.mysqli_error());

mysqli_close();

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = 'SELECT * FROM report ORDER by date_report';
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
	$couleurLigne = 1;
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $id = $ligne['id_report'];
  $dateReport = $ligne['date_report'];
  $idCollecte = $ligne['id_collecte'];
  $idFerie = $ligne['id_ferie'];
	
  $dateReport = date('l d F  Y', strtotime($dateReport));
  $dateReport = str_replace($jourReplace, $jourSearch, $dateReport);
  
  $couleurLigne = $couleurLigne + 1;	
	
  if ($couleurLigne%2 == 1){
    $fond = "#C7E7FF";
  }else{
    $fond = "#ADD9FB";
  }
  
  $req2 = "SELECT * FROM collectes WHERE id_collecte = $idCollecte";
	$resultat2 = mysqli_query($db, $req2) or die('SQL Error :: '.mysqli_error());
	while ($ligne2 = mysqli_fetch_assoc($resultat2)) {
		$idCommune = (int)$ligne2['id_commune'];
		$plageCollecte = (int)$ligne2['plage_collecte'];
		
		if ($plageCollecte == 1){
			$plageCollecte = "Noir, matin";
		}
		if ($plageCollecte == 2){
			$plageCollecte = "Noir, après-midi";
		}
		if ($plageCollecte == 3){
			$plageCollecte = "Jaune, matin, paire";
		}
		if ($plageCollecte == 4){
			$plageCollecte = "Jaune, après-midi, paire";
		}
		if ($plageCollecte == 5){
			$plageCollecte = "Jaune, matin, impaire";
		}
		if ($plageCollecte == 6){
			$plageCollecte = "Jaune, après-midi, impaire";
		}
		
		
		$req1 = "SELECT nom_commune FROM communes WHERE id_commune = $idCommune";
		$resultat1 = mysqli_query($db, $req1) or die('SQL Error :: '.mysqli_error());
		while ($ligne1 = mysqli_fetch_assoc($resultat1)) {
		$nomCommune = $ligne1['nom_commune'];
		
		}
		
	}
	
   $req3 = "SELECT * FROM feries WHERE id_ferie = $idFerie";
	$resultat3 = mysqli_query($db, $req3) or die('SQL Error :: '.mysqli_error());
	while ($ligne3 = mysqli_fetch_assoc($resultat3)) {
		$dateFerie = $ligne3['date_ferie'];
		
		$dateFerie = date_decode($dateFerie);
	}
  
	
  $tableauReports .= '<tr id="'. $id .'" style="background-color:'. $fond .';"><td style="width:30px;padding-left: 5px;">'. $id .'</td><td style="padding-left: 5px;">'. $dateReport .'</td><td style="padding-left: 5px;">'.$idCollecte.' - '.$nomCommune.' - '. $plageCollecte.'</td><td style="padding-left: 5px;">'.$dateFerie.'</td><td style="width:30px;text-align:center;"><a href="index.php?page=report&task=edit&id='.$id.'"><img src="images/edit.png" /></a></td><td style="width:30px;text-align:center;"><a href="index.php?page=report&task=suppr&id='.$id.'"><img src="images/suppr.png" /></a></td></tr>'; 
}

mysqli_close();


?>
<div class="container">
<?php
$message = $_GET['message'];
	if ($message == "addSuccess"){
		$message = "Le report a été ajouté avec succès !";
	}else{
		if ($message == "updSuccess"){
			$message = "Le report a été mis à jour avec succès !";
		}else{
			if ($message == "supprSuccess"){
			$message = "Le report a bien été suprimé !";
			}
		}
	}


	
if (!empty($message)){
?>
<div style="text-align:center"><?php echo $message; ?></div><br /><br />
<?php
}
?> 
<div style="border-bottom: 2px dashed #cccccc;margin-bottom:20px;">
<a href="index.php" title="Retour au panneau d'administration"><img style="float:left;" src="images/panel.png" /></a>
<a href="index.php?page=report" title="Ajouter un report"><img style="float:right;width:50px;" src="images/report.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/gestionreports.png" style="width:50px;"/><br />Gestion des reports</div>
</div>





<table style="width:100%; border-spacing: 1px;border-collapse:separate;">
	<tbody>
	<tr bgcolor="#eeeeee" ><th style="width:40px;padding-left: 5px;">id</th><th style="padding-left: 5px;">Date du report</th><th style="padding-left: 5px;">ID - Commune - plage de la Collecte</th><th style="padding-left: 5px;">Jour férié</th><th>Edit</th><th style="width:30px;">Suppr</th></tr>
	
	<?php echo $tableauReports; ?>
</tbody>
</table>

<?php
?>

</div>