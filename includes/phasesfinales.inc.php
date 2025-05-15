<?php
defined('_LPDT') or die; 
//debug
//$nbEquipes = 32;

if (isset($_POST['creerPhaseFinale'])){
	$numPhaseFinale = $_POST['numPhaseFinale'];
	$nbEquipes = $_POST['nbEquipes'];
	$labelPhaseFinale = $_POST['labelPhaseFinale'];
	//$typePhaseFinale = $_POST['typePhaseFinale'];
	$typePhaseFinale = "arbre";
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
				Libellé : <input class=\"uk-input uk-form-width-medium uk-margin-right\" type=\"text\" name=\"labelPhaseFinale\" required />
				<input type=\"hidden\" name=\"creerPhaseFinale\" value=\"1\" />
				<input type=\"hidden\" name=\"numPhaseFinale\" value=\"". $numPhaseFinale+1 ."\" />
				Nombre de joueurs : <select class=\"uk-select uk-form-width-small uk-margin-right\" name=\"nbEquipes\"><option value=\"4\">4</option><option value=\"8\">8</option><option value=\"16\">16</option><option value=\"32\">32</option><option value=\"64\">64</option><option value=\"128\" disabled>128(indisponible)</option></select>
				<!--- Type de phase : <select class=\"uk-select uk-form-width-small uk-margin-right\" name=\"typePhaseFinale\"><option value=\"arbre\">Arbre de tournoi</option><option value=\"poule\"disabled>Poule(indisponible)</option></select> --->
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
				//$trashButton = "<a href=\"index.php?idtournoi=". $idTournoi ."&action=supprphasefinale&phasefinale=". $numPhaseFinale ."\" class=\"uk-icon-link trash-icon\" title=\"Supprimer\" data-uk-tooltip data-uk-icon=\"icon: trash\"></a>";
				$trashButton = "<a style=\"margin-left: 40px;color: red\" href=\"\" onclick=\"supprPhaseFinale(". $idTournoi .",". $numPhaseFinale .")\" uk-icon=\"icon: trash; ratio: 1\" uk-toggle=\"target: #supprPhaseFinale\"></a>";
			}else{
				$trashButton = " ";
			}
			
			
			if(empty($content)){
				$content="";
			}

			$content = $content."<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-2@xl\">
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
										<div class=\"uk-text-center\">
											<button class=\"uk-button uk-button-default\" disabled>Nombre d'équipes : <strong>". $infosPhaseFinale['nb_equipes'] ."</strong></button>
										</div>
										<hr>
										<div class=\"uk-text-center\">
											<a href=\"index.php?idtournoi=". $idTournoi ."&idphase=". $infosPhaseFinale['id_phasefinale'] ."&page=phase". $infosPhaseFinale['nb_equipes'] ."\" title=\"Accéder à l'arbre de tournoi\" data-uk-tooltip>
												<button class=\"uk-button uk-button-primary\"><img src=\"img/bracket.png\" class=\"uk-margin-small-right\" />Tableau</button>
											</a>
											<a href=\"http://localhost/tournoipalet/index.php?idtournoi=$idTournoi&idphase=$idPhaseFinale&page=matchsphasesfinales\" title=\"Accéder à la liste des matchs\" data-uk-tooltip>
												<button class=\"uk-button uk-button-primary\"><span class=\"uk-margin-small-right uk-icon\" data-uk-icon=\"icon: table\"></span>Matchs</button>
											</a>
											<a href=\"http://localhost/tournoipalet/index.php?idtournoi=$idTournoi&idphasefinale=$idPhaseFinale&page=classementphasesfinales\" title=\"Classement\" data-uk-tooltip>
												<button class=\"uk-button uk-button-primary\"><span class=\"uk-margin-small-right uk-icon\" data-uk-icon=\"icon: list\"></span>Classement</button>
											</a>
										</div>
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

<div id="supprPhaseFinale" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title uk-text-center"><span uk-icon="icon: warning; ratio: 2"></span> ATTENTION <span uk-icon="icon: warning; ratio: 2"></span></h2>
        <p>Vous allez supprimer cette phase finale. Cette action n'est pas réversible. Tous les matchs associés seront supprimés !<br /><br />Souhaitez vous continuer ?</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
            <a id="supprPhaseFinaleBouton" href="#" class="uk-button uk-button-primary" style="background-color: red" type="button">Supprimer cette phase</a>
        </p>
    </div>
</div>