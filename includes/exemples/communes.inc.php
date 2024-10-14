<?php

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = 'SELECT * FROM communes ORDER by id_commune';
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
	$couleurLigne = 1;
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $id = $ligne['id_commune'];
  $nomCommune = $ligne['nom_commune'];

  
  $couleurLigne = $couleurLigne + 1;	
	
  if ($couleurLigne%2 == 1){
    $fond = "#C7E7FF";
  }else{
    $fond = "#ADD9FB";
  }

  
	
  $tableauCommunes .= '<tr id="'. $id .'" style="background-color:'. $fond .';"><td style="width:30px;padding-left: 5px;">'.$id.'</td><td style="padding-left: 5px;">'.$nomCommune.'</td><td style="width:30px;text-align:center;"><a href="index.php?page=commune&task=edit&id='.$id.'"><img src="images/edit.png" /></a></td><td style="width:30px;text-align:center;"><a href="index.php?page=commune&task=suppr&id='.$id.'"><img src="images/suppr.png" /></a></td></tr>'; 
}

mysqli_close();



?>
<div class="container">
<?php
$message = $_GET['message'];
if ($message == "addSuccess"){
	$message = "La commune a été ajoutée avec succès !";
	}else{
	if ($message == "updSuccess"){
	$message = "La commune a été mise à jour avec succès !";
	}else{
	if ($message == "supprSuccess"){
	$message = "La commune a bien été suprimée !";
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
<a href="index.php?page=commune" title="Ajouter une commune"><img style="float:right;width:50px;" src="images/communes.png" /></a>

<div style="text-align:center;font-size:20px;"><img src="images/gestioncommunes.png" style="width:50px;"/><br />Gestion des communes</div>
</div>





<table style="width:100%; border-spacing: 1px;border-collapse:separate;">
	<tbody>
	<tr bgcolor="#eeeeee" ><th style="width:40px;padding-left: 5px;">id</th><th style="padding-left: 5px;">Nom de la commune</th><th>Edit</th><th style="width:30px;">Suppr</th></tr>
	
	<?php echo "$tableauCommunes"; ?>
</tbody>
</table>

<?php
?>

</div>