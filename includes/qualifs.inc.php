<?php
defined('_LPDT') or die; 

if (isset($_POST['creerPhase'])){
	$numPhase = $_POST['numPhase'];
	creerPhaseQualif($idTournoi, $numPhase, $nbEquipes);	
}

$infosPhase = infosPhase();


//echo "Equipes inscrites : ". $nbEquipes."<br/><br/>";

if ($infosPhase == ''){
		$numPhase = 0;
		$content = "Aucune phase de qualification";
}else{
		$colonnePhase = array_column($infosPhase, 'num_phase');
		rsort($colonnePhase, SORT_NUMERIC);
		$numPhase = $colonnePhase[0];
}

if ($infosTournoi['statut_inscriptions'] == 'ferme' && $infosTournoi['statut_qualifs'] == 'encours'){
	$dispoBouton = "enabled";
	$messageQualif = "";
}else{
	$dispoBouton = "disabled";
	if($infosTournoi['statut_inscriptions'] != 'ferme'){
		$messageQualif = "Vous devez avoir clôturer les inscriptions <a href=\"index.php?idtournoi=$idTournoi&page=equipes\">(ici)</a> avant de pouvoir créer une phase de qualification.";
	}else{
		$messageQualif = "Les phases de qualifications sont closes !";
	}
	
}

echo "<p class='uk-text-center donotprint'>$messageQualif</p>";

echo "<div style=\"width: 100%\">		
		
			<div style=\"display:inline-block;width:49%;text-align:left;\">
				<form id=\"form-creerPhaseQualif\" method=\"POST\" action=\"index.php?idtournoi=$idTournoi&page=qualifs\">
				<input type=\"hidden\" name=\"creerPhase\" value=\"1\" />
				<input type=\"hidden\" name=\"numPhase\" value=\"". $numPhase+1 ."\" />
				</form>
				<button id=\"creerPhaseQualifBouton\" href=\"\" onclick=\"creerPhaseQualifBouton();\" style=\"background-color: mediumseagreen;color: #ffffff;\" class=\"uk-button\" $dispoBouton><span uk-icon=\"icon: plus-circle\" style=\"margin-right: 5px;\"></span> Créer une phase de qualification</button>
				
			</div>	
			<div style=\"display:inline-block;width:49%;text-align:right;\">
				<form method=\"POST\" action=\"index.php?idtournoi=$idTournoi&page=qualifs\">
				<input type=\"hidden\" name=\"idTournoi\" value=\"$idTournoi\" />
				<input type=\"hidden\" name=\"action\" value=\"cloturerPhasesQualifs\" />
				<button type=\"submit\" class=\"uk-button uk-button-danger\"><span uk-icon=\"icon: ban\" style=\"margin-right: 5px;vertical-align: text-bottom\"></span> Clôturer les phases qualificatives</button>
				</form>
			</div>
		</div><hr/>";
?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
<?php



if ($infosPhase == ''){
		$numPhase = 0;
		$content = "Aucune phase de qualification";
}else{
		$colonnePhase = array_column($infosPhase, 'num_phase');
		rsort($colonnePhase, SORT_NUMERIC);
		$numPhase = $colonnePhase[0];
		
	
		unset($content);
		 	
		$countPhase = 1;
		while ($countPhase < $numPhase + 1){
		
		$isLock = isLock($countPhase);
		$isLock = $isLock[0]['phasequalif_locked'];
		if($isLock == 1){
			$lockedColor = "red";
			$lockedIcon = "lock";
			$lockAction = "unlock";
			$disableSelect = "disabled";
		}else{
			$lockedColor = "green";
			$lockedIcon = "unlock";
			$lockAction = "lock";
			$disableSelect = "";
		}


		if ($countPhase == $numPhase){		
			//$trashButton = "<a href=\"index.php?idtournoi=". $idTournoi ."&action=supprphasequalif&phasequalif=". $numPhase ."\" class=\"uk-icon-link trash-icon\" title=\"Supprimer\" data-uk-tooltip data-uk-icon=\"icon: trash\"></a>";
			$trashButton = "<a style=\"margin-left: 40px;color: red\" href=\"\" onclick=\"supprPhaseQualif(". $idTournoi .",". $numPhase .")\" uk-icon=\"icon: trash; ratio: 1\" uk-toggle=\"target: #supprPhaseQualif\"></a>";

		}else{
			$trashButton = " ";
		}
		$listeMatchs = listeMatchsQualif($countPhase);
		
		$tableauMatchs = "<table id=\"table-$countPhase\" otpname=\"$countPhase\" class=\"uk-table uk-table-striped tableQualif\" style=\"width: 100%\">
							<tr>
								<th style=\"box-sizing:border-box;width: 100%\">
									<div style=\"box-sizing:border-box;display:inline-block;width: 10%\" class=\"uk-text-center uk-text-bolder\">PLAQUE</div>
									<div style=\"box-sizing:border-box;display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">EQUIPE 1</div>
									<div style=\"box-sizing:border-box;display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">SCORE 1</div>
									<div style=\"box-sizing:border-box;display:inline-block;width: 10%\"  class=\"uk-text-center uk-text-bolder\"></div>
									<div style=\"box-sizing:border-box;display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">SCORE 2</div>
									<div style=\"box-sizing:border-box;display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">EQUIPE 2</div>
								</th>
							</tr>";
							
		$numPlaque = 1;
		$indexPlayed = 0;
		$nbMatchs = $nbEquipes;
		if($nbEquipes&1){
			$nbMatchs = $nbEquipes + 1;
		}
		$nbMatchs = $nbMatchs / 2;
		foreach ($listeMatchs as $row){
			$idMatch = $row['id_matchqualif'];
			$score1 = $row['score1'];
			$score2 = $row['score2'];
						
			if($score1 == $infosTournoi['pts_qualifs'] || $score2 == $infosTournoi['pts_qualifs']){
				$matchPlayed = "green";
				$indexPlayed = $indexPlayed + 1;
			}else{
				$matchPlayed = "red";
			}

			if($indexPlayed == $nbMatchs){
				$allPlayed = "green";
			}else{
				$allPlayed = "red";
			}

			$equipe1 = $row['equipe1'];
			$equipe2 = $row['equipe2'];
			$indexSelect = -1;
			$selectOptions1 = "<option value=\"\"></option>";
			$selectOptions2 = "<option value=\"\"></option>";
			
			while ($indexSelect < $infosTournoi['pts_qualifs']){
				$realValue = $indexSelect + 1;
				if($realValue === $score1){
					$selected1 = "selected";
				}else{
					$selected1 = "";
				}
					if($realValue === $score2){
					$selected2 = "selected";
				}else{
					$selected2 = "";
				}
				$selectOptions1 = $selectOptions1."<option value=\"". $realValue ."\" $selected1>". $realValue ."</option>";
				$selectOptions2 = $selectOptions2."<option value=\"". $realValue ."\" $selected2>". $realValue ."</option>";
				$indexSelect = $indexSelect + 1;
			}

			$tableauMatchs = $tableauMatchs."
				<tr style=\"scroll-margin-top: 300px;\" id=\"matchid-$idMatch\">
					<td style=\"with:100%\">
						<form method=\"POST\" id=\"formMatch-$idMatch\" action=\"index.php?idtournoi=$idTournoi&page=qualifs#matchid-$idMatch\">
						<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\">$numPlaque</div>
						<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe1</div>
						<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
							<select id=\"match-$idMatch-side1\" onchange=\"activateLinkQualifs('validMatch-$idMatch', 'side2', ".$infosTournoi['pts_qualifs'] .", $idMatch)\" name=\"score1\" class=\"uk-select\" $disableSelect >
								$selectOptions1
							</select>
						</div>
						<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\"><a id=\"validMatch-$idMatch\" style=\"color: gray\" uk-icon=\"check\" class=\"disabled\"></a></div>
						
						<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
							<select id=\"match-$idMatch-side2\" onchange=\"activateLinkQualifs('validMatch-$idMatch', 'side1', ".$infosTournoi['pts_qualifs'] .", $idMatch)\" name=\"score2\" class=\"uk-select\" $disableSelect >
								$selectOptions2
							</select>
						</div>
						
						<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe2</div>
						<div class=\"pointStatut $matchPlayed\" style=\"display:inline-block;width: 10px;height:10px;border-radius: 50%;background-color:". $matchPlayed ."\"></div>
					
						<input type=\"hidden\" name=\"idTournoi\"  value=\"$idTournoi\"></input>
						<input type=\"hidden\" name=\"idMatchQualif\"  value=\"$idMatch\"></input>
						<input type=\"hidden\" name=\"action\"  value=\"miseajourMatchQualif\"></input>
						</form>
					</td>
				</tr>";
				
				
			$numPlaque = $numPlaque + 1;
		}
		
		$tableauMatchs = $tableauMatchs."</table>";
		if(empty($content)){
			$content="";
		}
	
		$content = $content."<div class=\"phaseQualif uk-width-1-1 uk-width-1-2@l uk-width-1-2@xl\">
						<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
							<div class=\"uk-card-header\">
								<div class=\"uk-grid uk-grid-small\">
									<div style=\"display:inline-bock;\" class=\"uk-width-auto\"><h4>Qualifs - Tour " .$countPhase ." en ". $infosTournoi['pts_qualifs'] ." Points</h4></div><div id=\"bigPoint-$countPhase\" style=\"margin-top: 8px;margin-left: 20px;display:inline-block;border-radius: 50%; height: 15px;background-color:$allPlayed ;\"></div>
									<div class=\"uk-width-expand uk-text-right panel-icons\">
										<a style=\"color: $lockedColor\" href=\"index.php?page=qualifs&idtournoi=". $idTournoi ."&action=". $lockAction ."phasequalif&numphase=$countPhase\" class=\"uk-margin-medium-right\"  uk-icon=\"$lockedIcon\"></a>
										<a href=\"PDF-phase-qualif.php?idtournoi=$idTournoi&numphase=$countPhase&ptsqualifs=". $infosTournoi['pts_qualifs'] ."\" uk-icon=\"print\"></a>". $trashButton ."
									</div>
								</div>
							</div>
							<div id=\"phase$countPhase\" class=\"uk-card-body\">
								<div>
									". $tableauMatchs ."
								</div>
							</div>
						</div>
					</div>"; 
			$countPhase = $countPhase + 1;
		}
}

echo $content;
?>
	

	

</div>

<div id="supprPhaseQualif" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title uk-text-center"><span uk-icon="icon: warning; ratio: 2"></span> ATTENTION <span uk-icon="icon: warning; ratio: 2"></span></h2>
        <p>Vous allez supprimer cette phase. Cette action n'est pas réversible. Tous les matchs associés seront supprimés !<br /><br />Souhaitez vous continuer ?</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
            <a id="supprPhaseQualifBouton" href="#" class="uk-button uk-button-primary" style="background-color: red" type="button">Supprimer cette phase</a>
        </p>
    </div>
</div>

<div id="creerPhaseQualif" style="display:none;position: fixed; z-index:999; top: 0px; left:0px;height: 100vh; width: 100vw;background: radial-gradient(#ffffff, rgba(255,255,255,0.8));text-align:center;">
	<div style="display:table-cell;width:100vw; height: 100vh;text-align:center;vertical-align:middle;">
		<img style="border-radius: 50%;margin:0 auto;" src="img/loading2.gif" />
		<h2 style="margin-top: -200px;">GENERATION EN COURS...</h2>
	</div>
</div>


<script>

	<?php 
	if ($infosTournoi['statut_qualifs'] == "ferme"){
	?>

	$(document).ready(function() {
		$('select').attr('disabled', true);
		$('.uk-button').attr('disabled', true);
	});
	

<?php } ?>

</script>