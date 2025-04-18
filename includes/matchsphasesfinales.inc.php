<?php
defined('_LPDT') or die; 
$infosPhasesFinales = infosPhasesFinales($idTournoi);

$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
$nbEquipes = $infosPhaseFinale['nb_equipes'];
$idPhaseFinale = $infosPhaseFinale['id_phasefinale'];
$labelPhaseFinale = $infosPhaseFinale['label_phasefinale'];

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
//DEBUG
//echo $numPhaseFinale."-".$nbEquipes;
//die();

calculPhaseFinale($numPhaseFinale, $nbEquipes);


$print1 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print1()'><span uk-icon=\"icon: print\"> </span> Finales</button>";
$print2 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print2()'><span uk-icon=\"icon: print\"> </span> Demis</button>";
$print4 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print4()'><span uk-icon=\"icon: print\"> </span> Quarts</button>";
$print8 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print8()'><span uk-icon=\"icon: print\"> </span> 8èmes</button>";
$print16 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print16()'><span uk-icon=\"icon: print\"> </span> 16èmes</button>";
$print32 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print32()'><span uk-icon=\"icon: print\"> </span> 32èmes</button>";
$print64 = "<button class='uk-button uk-button-primary uk-margin-left uk-margin-right' onclick='print64()'><span uk-icon=\"icon: print\"> </span> 64èmes</button>";

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
//Pour 4 equipes
if($nbEquipes == 4){

	echo "<div class='uk-width-3-4'>
			<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
				<div class=\"uk-card-header\">
					<div class=\"uk-grid uk-grid-small\">
						<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\">$print2  $print1</div>
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

	echo"<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><span uk-icon=\"icon: print\">Impression :</span> $print4 - $print2 - $print1</div>
				</div>
			</div>
		</div>";

	$aLabel = "Quarts finale";
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
	$tableauPF = constructTableMatchsPF($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque, $numPhaseFinale);
	$tableauCLDemis = constructTableMatchsPF($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque, $numPhaseFinale);
	$tableauCLF = constructTableMatchsPF($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque, $numPhaseFinale);

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

	echo"<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><span uk-icon=\"icon: print\">Impression :</span> $print8 - $print4 - $print2 - $print1</div>
				</div>
			</div>
		</div>";


	$aLabel = "8èmes de finale";
	$bLabel = "Quarts finale";
	$cLabel = "Demi-finales";
	$dLabel = "Finale";
	$pfLabel = "Petite Finale";
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
	$cLabel = "Quarts finale";
	$dLabel = "Demi-finales";
	$eLabel = "Finale";
	$pfLabel = "Petite Finale";
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

	echo"<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><span uk-icon=\"icon: print\">Impression :</span> $print32 - $print16 - $print8 - $print4 - $print2 - $print1</div>
				</div>
			</div>
		</div>";	

	$aLabel = "32èmes de finale";
	$bLabel = "16èmes de finale";
	$cLabel = "8èmes de finale";
	$dLabel = "Quarts finale";
	$eLabel = "Demi-finales";
	$fLabel = "Finale";
}

if($nbEquipes == 128){

	echo"<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><span uk-icon=\"icon: print\">Impression :</span> $print64 - $print32 - $print16 - $print8 - $print4 - $print2 - $print1</div>
				</div>
			</div>
		</div>";	

	$aLabel = "64èmes de finale";
	$bLabel = "32èmes de finale";
	$cLabel = "16èmes de finale";
	$dLabel = "8èmes de finale";
	$eLabel = "Quarts finale";
	$fLabel = "Demi-finales";
	$gLabel = "Finale";
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