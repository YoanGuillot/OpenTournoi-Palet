<?php
defined('_LPDT') or die; 
//debug
//$nbEquipes = 32;

if (isset($_POST['creerPhaseFinale'])){
	$numPhaseFinale = $_POST['numPhaseFinale'];
	$nbEquipes = $_POST['nbEquipes'];
	$labelPhaseFinale = $_POST['labelPhaseFinale'];
	$typePhaseFinale = $_POST['typePhaseFinale'];
	creerPhaseFinale($idTournoi, $numPhaseFinale, $nbEquipes, $labelPhaseFinale, $typePhaseFinale);	
}

$infosPhasesFinales = infosPhasesFinales($idTournoi);


if ($infosPhasesFinales == ''){
		$numPhaseFinale = 0;
		$content = "Aucune phase finale";
}else{
		$colonnePhaseFinale = array_column($infosPhasesFinales, 'num_phasefinale');
		rsort($colonnePhaseFinale, SORT_NUMERIC);
		$numPhaseFinale = $colonnePhaseFinale[0];
}

if ($infosTournoi['statut_inscriptions'] == 'ferme' && $infosTournoi['statut_qualifs'] == 'ferme'){
	$dispoBouton = "enabled";
	$messagePhasesFinales = "";
}else{
	$dispoBouton = "disabled";
	$messagePhasesFinales = "Vous devez avoir clôturer les phases qualificatives <a href=\"index.php?idtournoi=$idTournoi&page=qualifs\">(ici)</a> avant de pouvoir créer une phase finale.";
}

		echo "<div style=\"display:block;width: 100%\">		
		
			<div style=\"display:inline-block;width:100%;text-align:left;\">
				<form method=\"POST\" action=\"index.php?idtournoi=$idTournoi&page=phasesfinales\">
				Libellé : <input type=\"text\" name=\"labelPhaseFinale\" />
				<input type=\"hidden\" name=\"creerPhaseFinale\" value=\"1\" />
				<input type=\"hidden\" name=\"numPhaseFinale\" value=\"". $numPhaseFinale+1 ."\" />
				Nombre de joueurs : <select class=\"uk-select uk-form-width-small\" name=\"nbEquipes\"><option value=\"4\">4</option><option value=\"8\">8</option><option value=\"16\">16</option><option value=\"32\">32</option><option value=\"64\">64</option><option value=\"128\">128</option></select>
				Type de phase : <select class=\"uk-select uk-form-width-small\" name=\"typePhaseFinale\"><option value=\"arbre\">Arbre de tournoi</option><option value=\"poule\">Poule</option></select>
				<button type=\"submit\" class=\"uk-button uk-button-primary\" $dispoBouton>Créer une phase finale</button>
				</form>
			</div>	
		</div><hr />";
?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
<?php



if ($infosPhasesFinales == ''){
		$numPhasesFinales = 0;
		$content = "Aucune phase finale";
}else{

		$colonnePhaseFinale = array_column($infosPhasesFinales, 'num_phasefinale');
		rsort($colonnePhaseFinale, SORT_NUMERIC);
		$numPhaseFinale = $colonnePhaseFinale[0];
		unset($content);
		 	
		$countPhase = 1;
		while ($countPhase < $numPhaseFinale+1){
		$infosPhaseFinale = infosPhaseFinaleNum($countPhase);
		$idPhaseFinale = $infosPhaseFinale['id_phasefinale'];
			if ($countPhase == $numPhaseFinale){	
				$trashButton = "<a href=\"index.php?idtournoi=". $idTournoi ."&action=supprphasefinale&phasefinale=". $numPhaseFinale ."\" class=\"uk-icon-link trash-icon\" title=\"Supprimer\" data-uk-tooltip data-uk-icon=\"icon: trash\"></a>";
			}else{
				$trashButton = " ";
			}
			
			
			if(empty($content)){
				$content="";
			}

			$content = $content."<div class=\"uk-width-1-1 uk-width-1-2@l uk-width-1-4@xl\">
							<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
								<div class=\"uk-card-header\">
									<div class=\"uk-grid uk-grid-small\">
										<div class=\"uk-width-auto\"><h4>". $infosPhaseFinale['label_phasefinale'] ."</h4></div>
										<div class=\"uk-width-expand uk-text-right panel-icons\">
											". $trashButton ."
										</div>
									</div>
								</div>
								<div class=\"uk-card-body\">
									<div>
										Nombre d'équipes : ". $infosPhaseFinale['nb_equipes'] ." <a href=\"index.php?idtournoi=". $idTournoi ."&idphase=". $infosPhaseFinale['id_phasefinale'] ."&page=phase". $infosPhaseFinale['nb_equipes'] ."\" class=\"uk-icon-link sign-in-icon uk-float-right\" title=\"Accéder à cette phase\" data-uk-tooltip data-uk-icon=\"icon: sign-in; ratio :1.5\"></a>
									</div>
								</div>
							</div>
						</div>"; 
				$countPhase = $countPhase + 1;
		}
}

echo $content;
?>
	
	<p class="uk-text-center"><?php echo $messagePhasesFinales; ?></p>
	

</div>