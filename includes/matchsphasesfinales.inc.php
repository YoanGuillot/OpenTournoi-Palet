<?php
defined('_LPDT') or die; 
$infosPhasesFinales = infosPhasesFinales($idTournoi);

$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
$nbEquipes = $infosPhaseFinale['nb_equipes'];
$idPhaseFinale = $infosPhaseFinale['id_phasefinale'];
$labelPhaseFinale = $infosPhaseFinale['label_phasefinale'];
$typePhaseFinale = $infosPhaseFinale['type_phasefinale'];
$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];

if($nbEquipes % 2 != 0){
	$nbEquipes = $nbEquipes + 1;
}

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
//DEBUG
//echo $numPhaseFinale."-".$nbEquipes;
//die();

if($typePhaseFinale == "arbre"){
	calculPhaseFinale($numPhaseFinale, $nbEquipes);

	$print1 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print1(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> Finales</button>";
	$print2 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print2(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> Demis</button>";
	$print4 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print4(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> Quarts</button>";
	$print8 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print8(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> 8èmes</button>";
	$print16 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print16(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> 16èmes</button>";
	$print32 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print32(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> 32èmes</button>";
	$print64 = "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-smal-right' onclick='print64(\"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> 64èmes</button>";
}

if($typePhaseFinale == "poule"){
	//récupérer le nombre de tours de poules
	$resultats = $db->query("SELECT DISTINCT tour_poule FROM matchs_phasesfinales WHERE id_tournoi = '". $idTournoi ."' AND id_phasefinale = '". $idPhaseFinale ."'");
	while ($row = $resultats->fetchArray(1)) {
		$nbTours[] = $row['tour_poule'];
	}
	$nbTours = count($nbTours);

	$printButtons = '';
	$listeTableauxTours = '';
	for ($i = 1; $i <= $nbTours; $i++) {
		//Afficher les boutons d'impression pour chaque tour
		$printButtons .= "<button class='uk-button uk-button-primary uk-margin-small-left uk-margin-small-right' onclick='printTour($i, \"$labelPhaseFinale\")'><span uk-icon=\"icon: print\"> </span> Tour $i</button>";
		
		//Récuperer les matchs de chaque tour
		$resultats = $db->query("SELECT * FROM matchs_phasesfinales WHERE id_tournoi = '". $idTournoi ."' AND id_phasefinale = '". $idPhaseFinale ."' AND tour_poule = '". $i ."'");
		while ($row = $resultats->fetchArray(1)) {
			$matchsTour[$i][] = $row;
		}

		//Générer le tableau des matchs pour chaque tour
		$tableauTour = constructTableMatchsPoule($idTournoi, "Tour $i", $matchsTour[$i], $numPlaque, $numPhaseFinale, $i);
		$listeTableauxTours .= $tableauTour;
			
	
	}


################################################################################################## en cours de modif ###########

}








?>
<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">

<?php
echo "<div class='uk-width-1-4'>
		<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div style='height:40px;' class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-auto\"><h4>". $labelPhaseFinale ."</h4></div>
					<div class=\"uk-width-expand uk-text-right panel-icons\"></div>
					
				</div>
			</div>
		</div>
	</div>";

///////////////////////////////////////////////////////////////////////////////////////////////////
if($typePhaseFinale == "arbre"){
	//Pour 4 equipes
	if($nbEquipes == 4){

		echo "<div class='uk-width-3-4'>
				<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
					<div class=\"uk-card-header\">
						<div class=\"uk-grid uk-grid-small\">
							<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print2 $print1</div>
						</div>
					</div>
				</div>
			</div>";

		$aLabel = "Demi-finales";
		$bLabel = "Finale";
		$pfLabel = "Petite finale";


		$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","A");
		$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","B");
		$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");

		$tableauDemis = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
		$tableauF = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
		$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque, $numPhaseFinale);

		echo $tableauDemis;
		echo $tableauF;
		echo $tableauPF;



	}
	//Pour 8 equipes
	if($nbEquipes == 8){

		echo"<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print4  $print2  $print1</div>
					</div>
				</div>
			</div>
		</div>";

		$aLabel = "Quarts de finale";
		$bLabel = "Demi-finales";
		$cLabel = "Finale";
		$pfLabel = "Petite finale";
		$clLabel = "Classements 1er Tour";
		$cl2Label = "Classements 2ème Tour";

		$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","A");
		$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","B");
		$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","C");
		$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");
		$listeMatchsCLDemis = listeEquipesPhaseFinale($numPhaseFinale,"Classement 1er Tour","CL");
		$listeMatchsCLF = listeEquipesPhaseFinale($numPhaseFinale,"Classement 2ème Tour","CL");
		

		$tableauQuarts = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
		$tableauDemis = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
		$tableauF = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
		$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
		$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque + 2, $numPhaseFinale);
		$tableauCLF = constructTableMatchsPF($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque + 2, $numPhaseFinale);

		echo $tableauQuarts;
		echo $tableauDemis;
		echo $tableauF;
		
		echo $tableauPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo $tableauCLDemis;
		echo $tableauCLF;
	}	


	// Pour 16 Equipes
	if($nbEquipes == 16){

		echo"<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print8  $print4  $print2  $print1</div>
					</div>
				</div>
			</div>
		</div>";


		$aLabel = "8èmes de finale";
		$bLabel = "Quarts de finale";
		$cLabel = "Demi-finales";
		$dLabel = "Finale";
		$pfLabel = "Petite finale";
		$CH4Label = "Challenge Quarts de finale";
		$CH2Label = "Challenge Demi-finales";
		$CHpfLabel = "Challenge Petite finale";
		$CHfLabel = "Challenge Finale";
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
		
		$tableauCLCHDemis = constructTableMatchsPF($idTournoi, $CHclLabel, $listeMatchsCHCLDemis, $numPlaque + 6, $numPhaseFinale);
		$tableauCLCHF = constructTableMatchsPF($idTournoi, $CHcl2Label, $listeMatchsCHCLF, $numPlaque + 6, $numPhaseFinale);

		
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

		echo"<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print16  $print8  $print4  $print2  $print1</div>
					</div>
				</div>
			</div>
		</div>";	


		$aLabel = "16èmes de finale";
		$bLabel = "8èmes de finale";
		$cLabel = "Quarts de finale";
		$dLabel = "Demi-finales";
		$eLabel = "Finale";
		$pfLabel = "Petite finale";
		$CH8Label = "Challenge 8èmes de finale";
		$CH4Label = "Challenge Quarts de finale";
		$CH2Label = "Challenge Demi-finales";
		$CHpfLabel = "Challenge Petite finale";
		$CHfLabel = "Challenge Finale";
		


		$listeMatchs16 = listeEquipesPhaseFinale($numPhaseFinale,"16èmes de finale","A");
		$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","B");
		$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","C");
		$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","D");
		$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","E");
		$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");


		$listeMatchsCH8 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 8èmes de finale","CHA");
		$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Quarts de finale","CHB");
		$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Demi-finales","CHC");
		$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Finale","CHD");
		$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Petite finale","CHPF");




		$tableau16 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
		$tableau8 = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
		$tableauQuarts = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
		$tableauDemis = constructTableMatchsPF($idTournoi, $dLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
		$tableauF = constructTableMatchsPF($idTournoi, $eLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
		$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);

		$tableauCH8 = constructTableMatchsPF($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 8, $numPhaseFinale);
		$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 8, $numPhaseFinale);
		$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 8, $numPhaseFinale);
		$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 8, $numPhaseFinale);
		$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 9, $numPhaseFinale);


		echo $tableau16;
		echo $tableau8;
		echo $tableauQuarts;
		echo $tableauDemis;
		echo $tableauF;
		echo $tableauPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /><br /><br /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo $tableauCH8;
		echo $tableauCHQuarts;
		echo $tableauCHDemis;
		echo $tableauCHF;
		echo $tableauCHPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		
	}


	if($nbEquipes == 64){

		echo"<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print32  $print16  $print8  $print4  $print2  $print1</div>
					</div>
				</div>
			</div>
		</div>";	


		$aLabel = "32èmes de finale";
		$bLabel = "16èmes de finale";
		$cLabel = "8èmes de finale";
		$dLabel = "Quarts de finale";
		$eLabel = "Demi-finales";
		$fLabel = "Finale";
		$pfLabel = "Petite finale";
		$CH16Label = "Challenge 16èmes de finale";
		$CH8Label = "Challenge 8èmes de finale";
		$CH4Label = "Challenge Quarts de finale";
		$CH2Label = "Challenge Demi-finales";
		$CHpfLabel = "Challenge Petite finale";
		$CHfLabel = "Challenge Finale";
		


		$listeMatchs32 = listeEquipesPhaseFinale($numPhaseFinale,"32èmes de finale","A");
		$listeMatchs16 = listeEquipesPhaseFinale($numPhaseFinale,"16èmes de finale","B");
		$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","C");
		$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","D");
		$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","E");
		$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","F");
		$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");


		$listeMatchsCH16 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 16èmes de finale","CHA");
		$listeMatchsCH8 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 8èmes de finale","CHB");
		$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Quarts de finale","CHC");
		$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Demi-finales","CHD");
		$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Finale","CHE");
		$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Petite finale","CHPF");


		$tableau32 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs32, $numPlaque, $numPhaseFinale);
		$tableau16 = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
		$tableau8 = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
		$tableauQuarts = constructTableMatchsPF($idTournoi, $dLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
		$tableauDemis = constructTableMatchsPF($idTournoi, $eLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
		$tableauF = constructTableMatchsPF($idTournoi, $fLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
		$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);

		$tableauCH16 = constructTableMatchsPF($idTournoi, $CH16Label, $listeMatchsCH16, $numPlaque + 16, $numPhaseFinale);
		$tableauCH8 = constructTableMatchsPF($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 16, $numPhaseFinale);
		$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 16, $numPhaseFinale);
		$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 16, $numPhaseFinale);
		$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 16, $numPhaseFinale);
		$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 17, $numPhaseFinale);


		echo $tableau32;
		echo $tableau16;
		echo $tableau8;
		echo $tableauQuarts;
		echo $tableauDemis;
		echo $tableauF;
		echo $tableauPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /><br /><br /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo $tableauCH16;
		echo $tableauCH8;
		echo $tableauCHQuarts;
		echo $tableauCHDemis;
		echo $tableauCHF;
		echo $tableauCHPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		
	}

	if($nbEquipes == 128){

		echo"<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$print64 $print32 $print16 $print8 $print4 $print2 $print1</div>
					</div>
				</div>
			</div>
		</div>";	


		$aLabel = "64èmes de finale";
		$bLabel = "32èmes de finale";
		$cLabel = "16èmes de finale";
		$dLabel = "8èmes de finale";
		$eLabel = "Quarts de finale";
		$fLabel = "Demi-finales";
		$gLabel = "Finale";
		$pfLabel = "Petite finale";
		$CH32Label = "Challenge 32èmes de finale";
		$CH16Label = "Challenge 16èmes de finale";
		$CH8Label = "Challenge 8èmes de finale";
		$CH4Label = "Challenge Quarts de finale";
		$CH2Label = "Challenge Demi-finales";
		$CHpfLabel = "Challenge Petite finale";
		$CHfLabel = "Challenge Finale";
		


		$listeMatchs64 = listeEquipesPhaseFinale($numPhaseFinale,"64èmes de finale","A");
		$listeMatchs32 = listeEquipesPhaseFinale($numPhaseFinale,"32èmes de finale","B");
		$listeMatchs16 = listeEquipesPhaseFinale($numPhaseFinale,"16èmes de finale","C");
		$listeMatchs8 = listeEquipesPhaseFinale($numPhaseFinale,"8èmes de finale","D");
		$listeMatchsQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Quarts de finale","E");
		$listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","F");
		$listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","G");
		$listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");


		$listeMatchsCH32 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 32èmes de finale","CHA");
		$listeMatchsCH16 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 16èmes de finale","CHB");
		$listeMatchsCH8 = listeEquipesPhaseFinale($numPhaseFinale,"Challenge 8èmes de finale","CHC");
		$listeMatchsCHQuarts = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Quarts de finale","CHD");
		$listeMatchsCHDemis = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Demi-finales","CHE");
		$listeMatchsCHF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Finale","CHF");
		$listeMatchsCHPF = listeEquipesPhaseFinale($numPhaseFinale,"Challenge Petite finale","CHPF");


		$tableau64 = constructTableMatchsPF($idTournoi, $aLabel, $listeMatchs64, $numPlaque, $numPhaseFinale);
		$tableau32 = constructTableMatchsPF($idTournoi, $bLabel, $listeMatchs32, $numPlaque, $numPhaseFinale);
		$tableau16 = constructTableMatchsPF($idTournoi, $cLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
		$tableau8 = constructTableMatchsPF($idTournoi, $dLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
		$tableauQuarts = constructTableMatchsPF($idTournoi, $eLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
		$tableauDemis = constructTableMatchsPF($idTournoi, $fLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
		$tableauF = constructTableMatchsPF($idTournoi, $gLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
		$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
		//OK

		$tableauCH32 = constructTableMatchsPF($idTournoi, $CH32Label, $listeMatchsCH32, $numPlaque + 32, $numPhaseFinale);
		$tableauCH16 = constructTableMatchsPF($idTournoi, $CH16Label, $listeMatchsCH16, $numPlaque + 32, $numPhaseFinale);
		$tableauCH8 = constructTableMatchsPF($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 32, $numPhaseFinale);
		$tableauCHQuarts = constructTableMatchsPF($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 32, $numPhaseFinale);
		$tableauCHDemis = constructTableMatchsPF($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 32, $numPhaseFinale);
		$tableauCHF = constructTableMatchsPF($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 32, $numPhaseFinale);
		$tableauCHPF = constructTableMatchsPF($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 33, $numPhaseFinale);


		echo $tableau64;
		echo $tableau32;
		echo $tableau16;
		echo $tableau8;
		echo $tableauQuarts;
		echo $tableauDemis;
		echo $tableauF;
		echo $tableauPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /><br /><br /></div>";
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		echo $tableauCH32;
		echo $tableauCH16;
		echo $tableauCH8;
		echo $tableauCHQuarts;
		echo $tableauCHDemis;
		echo $tableauCHF;
		echo $tableauCHPF;
		echo "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
		
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////

if($typePhaseFinale == "poule"){
	echo "<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div style='margin-bottom: 0px;' class='uk-align-center uk-flex'>$printButtons</div>
					</div>
				</div>
			</div>
		</div>";
	
	echo $listeTableauxTours;
}

echo "<div id='printDiv' style='display:none'></div>";

if ($infosTournoi['statut_phasesfinales'] == "ferme"){
?>
<script>
	$(document).ready(function() {
		$('select').attr('disabled', true);
		$('.uk-button').attr('disabled', true);
	});
</script>
<?php } ?>