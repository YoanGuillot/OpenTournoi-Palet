<?php

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
mysqli_query($db, "SET NAMES 'utf8'");
$req = 'SELECT * FROM collectes JOIN communes ON collectes.id_commune = communes.id_commune JOIN type ON collectes.id_type = type.id_type ORDER by nom_commune, special_collecte';
$resultat = mysqli_query($db, $req) or die('SQL Error :: '.mysqli_error());
	$couleurLigne = 1;
while ($ligne = mysqli_fetch_assoc($resultat)) {
  $id = $ligne['id_collecte'];
  $typeCollecte = $ligne['nom_type'];
  $lieuxCollecte = $ligne['lieux_collecte'];
  $plageCollecte = (int)$ligne['plage_collecte'];
  $jourCollecte = $ligne['jour_collecte'];
  $idCommune = (int)$ligne['id_commune'];
  $nomCommune = $ligne['nom_commune'];
  $specialCollecte = $ligne['special_collecte'];
  $couleurLigne = $couleurLigne + 1;
  
  if (strlen($nomCommune) > 25){
	$nomCommuneTr = substr($nomCommune,0,25).'...';
  }else{
	$nomCommuneTr = $nomCommune;
  }
  if (strlen($lieuxCollecte) > 50){
	$lieuxCollecteTr = substr($lieuxCollecte,0,50).'...'; 
  }else{
	$lieuxCollecteTr = $lieuxCollecte;
  }
  
  if ($couleurLigne%2 == 1){
    $fond = "#C7E7FF";
  }else{
    $fond = "#ADD9FB";
  }
  
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
  
	
  $tableauCollectes .= '<tr id="'. $id .'" style="background-color:'. $fond .';"><td style="width:30px;padding-left: 5px;">'. $id .'</td><td style="padding-left: 5px;">'. $nomCommuneTr .'</td><td style="padding-left: 5px;">'.$jourCollecte.' - '. $plageCollecte.'</td><td style="padding-left: 5px;">'.$specialCollecte.'</td><td style="padding-left: 5px;">'.$lieuxCollecteTr.'</td><td style="width:30px;text-align:center;"><a href="index.php?page=collecte&task=edit&id='.$id.'"><img src="images/edit.png" /></a></td><td style="width:30px;text-align:center;"><a href="index.php?page=collecte&task=suppr&id='.$id.'"><img src="images/suppr.png" /></a></td></tr>'; 
}

mysqli_close();


?>
<div class="container">
<?php
$message = $_GET['message'];
	if ($message == "addSuccess"){
		$message = "La collecte a été ajoutée avec succès !";
	}else{
		if ($message == "updSuccess"){
			$message = "La collecte a été mise à jour avec succès !";
		}else{
			if ($message == "supprSuccess"){
			$message = "La collecte a bien été suprimée !";
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

<div style="text-align:center;font-size:20px;"><img src="images/gestionreports.png" style="width:50px;"/><br />Gestion des collectes</div>
</div>





<table style="width:100%; border-spacing: 1px;border-collapse:separate;">
	<tbody>
	<tr bgcolor="#eeeeee" ><th style="width:40px;padding-left: 5px;">id</th><th style="padding-left: 5px;">Commune</th><th style="padding-left: 5px;">Jour - plage de la Collecte</th><th style="padding-left: 5px;">Sp</th><th style="padding-left: 5px;">Lieux de la collecte</th><th>Edit</th><th style="width:30px;">Suppr</th></tr>
	
	<?php echo $tableauCollectes; ?>
</tbody>
</table>

<?php
?>

</div>