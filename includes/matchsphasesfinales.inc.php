<?php
defined('_LPDT') or die; 
$infosPhasesFinales = infosPhasesFinales($idTournoi);

$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
$nbEquipes = $infosPhaseFinale['nb_equipes'];
$idPhaseFinale = $infosPhaseFinale['id_phasefinale'];

$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
$nbPlaques = $nbEquipes/2;
$prevNbEquipes = 0;
foreach($infosPhasesFinales as $row){
	if ($row['num_phasefinale'] < $numPhaseFinale){
		$prevNbEquipes = $prevNbEquipes + $row['nb_equipes'];
	}
}

if($prevNbEquipes == 0){
	$debutPlaques = 1;
}else{
	$plaquesDejaUtilises = $prevNbEquipes /2;
	$debutPlaques = $plaquesDejaUtilises + 1;
}

$numPlaque = $debutPlaques;


calculPhaseFinale($numPhaseFinale, $nbEquipes);


?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
<?php



///////////////////////////////////////////////////////////////////////////////////////////////////
//Pour 4 equipes
if($nbEquipes == 4){
	$aLabel = "Demi-finales";
	$bLabel = "Finale";
	$pfLabel = "Petite finale";


	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","A");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","B");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","PF");

	$tableauDemis = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
	$tableauF = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque, $numPhaseFinale);

	echo $listeMatchsDemis;
	echo $listeMatchsF;
	echo $listeMatchsPF;

}
//Pour 8 equipes
if($nbEquipes == 8){
	$aLabel = "Quarts finale";
	$bLabel = "Demi-finales";
	$cLabel = "Finale";
	$pfLabel = "Petite finale";
	$clLabel = "Classements 1er Tour";
	$cl2Label = "Classements 2ème Tour";

	$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","A");
	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","B");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","C");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","PF");
	$listeMatchsCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CL");
	$listeMatchsCLF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","CL");

	$tableauQuarts = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
	$tableauDemis = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
	$tableauF = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque, $numPhaseFinale);
	$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque, $numPhaseFinale);
	$tableauCLF = constructTableMatchsPF($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque, $numPhaseFinale);

	echo $listeMatchsQuarts;
	echo $listeMatchsDemis;
	echo $listeMatchsF;
	echo $listeMatchsPF;
	echo $listeMatchsCLDemis;
	echo $listeMatchsCLF;
}	
// Pour 16 Equipes
if($nbEquipes == 16){
	$aLabel = "8èmes de finale";
	$bLabel = "Quarts finale";
	$cLabel = "Demi-finales";
	$dLabel = "Finale";
	$pfLabel = "Petite Finale";
	$CH4Label = "Challenge Quarts de finale";
	$CH2Label = "Challenge Demi-finales";
	$CHpfLabel = "Challenge Petite finale";
	$CHfLabel = "Challenge finale";
	$clLabel = "Classements 1er Tour";
	$cl2Label = "Classements 2ème Tour";
	$CHclLabel = "Challenge Classements 1er Tour";
	$CHcl2Label = "Challenge Classements 2ème Tour";


	$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","A");
	$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","B");
	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","C");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","D");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");

	$listeMatchsCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Classement 1er Tour","CL");
	$listeMatchsCLF = listeEquipesPhaseFinale($numPhaseFinale,"Classement 2ème Tour","CL");

	$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Quarts de finale","CHA");
	$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Demi-finales","CHB");
	$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Finale","CHC");
	$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Petite finale","CHPF");

	$listeMatchsCHCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Classement 1er Tour","CHCL");
	$listeMatchsCHCLF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Classement 2ème Tour","CHCL");


	$tableau8 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
	$tableauQuarts = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
	$tableauDemis = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
	$tableauF = constructTableMatchsPF($idTournoi, $dLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
	
	$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 4, $numPhaseFinale);
	$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 4, $numPhaseFinale);
	$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 4, $numPhaseFinale);
	$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 5, $numPhaseFinale);
	
	$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque + 2, $numPhaseFinale);
	$tableauCLF = constructTableMatchsPF($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque + 2, $numPhaseFinale);
	
	$tableauCLCHDemis = constructTableMatchsPF($idTournoi, $CHclLabel, $listeMatchsCLDemis, $numPlaque + 6, $numPhaseFinale);
	$tableauCLCHF = constructTableMatchsPF($idTournoi, $CHcl2Label, $listeMatchsCLF, $numPlaque + 6, $numPhaseFinale);

	
	echo $tableau8;
	echo $tableauQuarts;
	echo $tableauDemis;
	echo $tableauF;
	
	echo $tableauPF;
	echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
	echo $tableauCLDemis;
	echo $tableauCLF;
	echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /><br /><br /></div>";
	echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
	echo $tableauCHQuarts;
	echo $tableauCHDemis;
	echo $tableauCHF;
	echo $tableauCHPF;
	echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
	echo $tableauCLCHDemis;
	echo $tableauCLCHF;
	echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";

	

}

//pour 32 / 64 / 128 Equipes
if($nbEquipes == 32){
	$aLabel = "16èmes de finale";
	$bLabel = "8èmes de finale";
	$cLabel = "Quarts finale";
	$dLabel = "Demi-finales";
	$eLabel = "Finale";
	$pfLabel = "Petite Finale";
	$CH8Label = "Challenge 8èmes de finale";
	$CH4Label = "Challenge Quarts de finale";
	$CH2Label = "Challenge Demi-finales";
	$CHpfLabel = "Challenge Petite finale";
	$CHfLabel = "Challenge finale";
	


	$listeMatchs16 = listeEquipesPhaseFinale($numPhaseFinale,"16èmes de finale","A");
	$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","B");
	$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finales","C");
	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","D");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","E");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","PF");


	$listeMatchsCH8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","CHA");
	$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","CHA");
	$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CHB");
	$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","CHC");
	$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","CHPF");




	$tableau16 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs16, $numPlaque);
	$tableau8 = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchs8, $numPlaque);
	$tableauQuarts = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsQuarts, $numPlaque);
	$tableauDemis = constructTableMatchsPF($idTournoi, $dLabel, $listeMatchsDemis, $numPlaque);
	$tableauF = constructTableMatchsPF($idTournoi, $eLabel, $listeMatchsF, $numPlaque);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque);
	
	$tableauCH8 = constructTableMatchsPF($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque);
	$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque);
	$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque);
	$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque);
	$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque);
	
}


if($nbEquipes == 64){
	$aLabel = "32èmes de finale";
	$bLabel = "16èmes de finale";
	$cLabel = "8èmes de finale";
	$dLabel = "Quarts finale";
	$eLabel = "Demi-finales";
	$fLabel = "Finale";
}

if($nbEquipes == 128){
	$aLabel = "64èmes de finale";
	$bLabel = "32èmes de finale";
	$cLabel = "16èmes de finale";
	$dLabel = "8èmes de finale";
	$eLabel = "Quarts finale";
	$fLabel = "Demi-finales";
	$gLabel = "Finale";
}



if ($infosTournoi['statut_phasesfinales'] == "ferme"){
?>
<script>
	$(document).ready(function() {
		$('select').attr('disabled', true);
		$('.uk-button').attr('disabled', true);
	});
</script>
<?php } ?>