<?php
defined('_LPDT') or die; 
$infosPhasesFinales = infosPhasesFinales($idTournoi);

$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
$nbEquipes = $infosPhaseFinale['nb_equipes'];

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

	$tableauDemis = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsDemis, $numPlaque);
	$tableauF = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsF, $numPlaque);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque);

}
//Pour 8 equipes
if($nbEquipes == 8){
	$aLabel = "Quarts finale";
	$bLabel = "Demi-finales";
	$cLabel = "Finale";
	$pfLabel = "Petite finale";
	$clLabel = "Classements";

	$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","A");
	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","B");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","C");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","PF");
	$listeMatchsCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CL");
	$listeMatchsCLF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","CL");

	$tableauQuarts = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsQuarts, $numPlaque);
	$tableauDemis = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsDemis, $numPlaque);
	$tableauF = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsF, $numPlaque);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque);
	$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque);
	$tableauCLF = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLF, $numPlaque);
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
	$clLabel = "Classements";


	$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","A");
	$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finales","B");
	$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","C");
	$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","D");
	$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","PF");

	$listeMatchsCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CL");
	$listeMatchsCLF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","CL");

	$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","CHA");
	$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CHB");
	$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","CHC");
	$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Finales","CHPF");

	$listeMatchsCHCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","CHCL");
	$listeMatchsCHCLF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","CHCL");


	$tableau8 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs8, $numPlaque);
	$tableauQuarts = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsQuarts, $numPlaque);
	$tableauDemis = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsDemis, $numPlaque);
	$tableauF = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsF, $numPlaque);
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque);
	
	$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque);
	$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque);
	$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque);
	$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque);
	
	$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque);
	$tableauCLF = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLF, $numPlaque);
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


		



?>
