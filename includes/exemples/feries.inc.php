<?php

//------- Suppression des anciens jours feries--------------
$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");

$dateActuelle = date('Ymd');
$dateSuppr = date('Ymd', strtotime($dateActuelle . '-14 day'));
$dateActuelle = intval($dateActuelle);
$dateSuppr = intval($dateSuppr);

 $req="DELETE FROM feries WHERE date_ferie < $dateSuppr";
 $resultat=mysqli_query($db, $req) or die ('SQL Error :: '.mysqli_error());

mysqli_close();



$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = 'SELECT * FROM feries ORDER by date_ferie';
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
	$couleurLigne = 1;
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $id = $ligne['id_ferie'];
  $dateFerie = $ligne['date_ferie'];
  $nomFerie = $ligne['nom_ferie'];
  $zoneFerie = $ligne['zone_ferie'];
	
  $dateFerie = date_decode($dateFerie);
   
  $couleurLigne = $couleurLigne + 1;	
	
  if ($couleurLigne%2 == 1){
    $fond = "#C7E7FF";
  }else{
    $fond = "#ADD9FB";
  }	
  $tableauFeries .= '<tr id="'. $id .'" style="background-color:'. $fond .';"><td style="width:30px;padding-left: 5px;">'. $id .'</td><td style="padding-left: 5px;">'. $dateFerie .'</td><td style="padding-left: 5px;">'.$nomFerie.'</td><td style="padding-left: 5px;">'.$zoneFerie.'</td><td style="width:30px;text-align:center;"><a href="index.php?page=ferie&task=edit&id='.$id.'"><img src="images/edit.png" /></a></td><td style="width:30px;text-align:center;"><a href="index.php?page=ferie&task=suppr&id='.$id.'"><img src="images/suppr.png" /></a></td></tr>'; 
}

mysqli_close();


?>
<div class="container">
<?php
$message = $_GET['message'];
	if ($message == "addSuccess"){
		$message = "Le jour férié a été ajouté avec succès !";
	}else{
		if ($message == "updSuccess"){
			$message = "Le jour férié a été mis à jour avec succès !";
		}else{
			if ($message == "supprSuccess"){
			$message = "Le jour férié a bien été suprimé !";
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
<a href="index.php?page=ferie" title="Ajouter un jour férié"><img style="float:right;width:50px;" src="images/jferie.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/gestionferies.png" style="width:50px;"/><br />Gestion des jours fériés</div>
</div>





<table style="width:100%; border-spacing: 1px;border-collapse:separate;">
	<tbody>
	<tr bgcolor="#eeeeee" ><th style="width:40px;padding-left: 5px;">id</th><th style="padding-left: 5px;">Date</th><th style="padding-left: 5px;">Nom</th><th style="padding-left: 5px;">Zone</th><th>Edit</th><th style="width:30px;">Suppr</th></tr>
	
	<?php echo $tableauFeries; ?>
</tbody>
</table>

<?php
?>

</div>