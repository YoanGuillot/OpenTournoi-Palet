<?php
defined('_LPDT') or die; 
$infosPhasesFinales = infosPhasesFinales($idTournoi);

$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
$nbEquipes = $infosPhasefinale['nb_equipes'];
$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
$nbPlaques = $nbEquipes/2;

$prevNbEquipes = 0;
foreach($infosPhasesFinales as $row){
	if ($row['num_phase'] < $numPhaseFinale){
		$prevNbEquipes = $prevNbEquipes + $row['nb_equipes'];
	}
}

if($prevNbEquipes == 0){
	$debutPlaques = 1;
}else{
	$plaquesDejaUtilises = $prevNbEquipes /2;
	$debutPlaques = $plaquesDejaUtilises + 1;
}



?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
<?php


	///////////////////////////////////////////////////////////////////////////////////////////////////
		









	////////////////////////////////////////////////////////////////////////////////////////////////////

		$colonnePhaseFinale = array_column($infosPhasesFinales, 'num_phasefinale');
		rsort($colonnePhaseFinale, SORT_NUMERIC);
		$numPhaseFinale = $colonnePhaseFinale[0];
		unset($content);
		 	
		$countPhase = 1;
		while ($countPhase < $numPhaseFinale+1){
		
			if ($countPhase == $numPhaseFinale){	
				$trashButton = "<a href=\"index.php?idtournoi=". $idTournoi ."&action=supprphasefinale&phasefinale=". $numPhaseFinale ."\" class=\"uk-icon-link trash-icon\" title=\"Supprimer\" data-uk-tooltip data-uk-icon=\"icon: trash\"></a>";
			}else{
				$trashButton = " ";
			}
			$listeMatchsPhaseFinale = listeMatchsPhaseFinale($idTournoi, $countPhase);
			//DEBUG
			//print_r($listeMatchsPhaseFinale);
			$tableauMatchs = "<table class=\"uk-table uk-table-striped\" style=\"width: 100%\">
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
			
			$numPlaque = $debutPlaques;
			foreach ($listeMatchsPhaseFinale as $row){
				$idMatch = $row['id_matchphasesfinales'];
				$score1 = $row['score1'];
				$score2 = $row['score2'];
				$equipe1 = $row['equipe1'];
				$equipe2 = $row['equipe2'];
				$indexSelect = 0;
				$selectOptions1 = "<option value=\"\"></option>";
				$selectOptions2 = "<option value=\"\"></option>";
				
				while ($indexSelect < $infosTournoi['pts_qualifs']){
					$realValue = $indexSelect + 1;
					if($realValue == $score1){
						$selected1 = "selected";
					}else{
						$selected1 = "";
					}
						if($realValue == $score2){
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
								<select id=\"match-$idMatch-side1\" onchange=\"activateLink('validMatch-$idMatch', 'side2', ".$infosTournoi['pts_qualifs'] .", $idMatch)\" name=\"score1\" class=\"uk-select\"  >
									$selectOptions1
								</select>
							</div>
							<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\"><a id=\"validMatch-$idMatch\" style=\"color: gray\" href=\"javascript:document.getElementById('formMatch-$idMatch').submit();\" uk-icon=\"check\" class=\"disabled\"></a></div>
							
							<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
								<select id=\"match-$idMatch-side2\" onchange=\"activateLink('validMatch-$idMatch', 'side1', ".$infosTournoi['pts_qualifs'] .", $idMatch)\" name=\"score2\" class=\"uk-select\"  >
									$selectOptions2
								</select>
							</div>
							
							<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe2</div>
						
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

			$content = $content."<div class=\"uk-width-1-1 uk-width-1-2@l uk-width-1-2@xl\">
							<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
								<div class=\"uk-card-header\">
									<div class=\"uk-grid uk-grid-small\">
										<div class=\"uk-width-auto\"><h4>Phase $countPhase</h4></div>
										<div class=\"uk-width-expand uk-text-right panel-icons\">
											<a uk-icon=\"print\"></a>". $trashButton ."
										</div>
									</div>
								</div>
								<div class=\"uk-card-body\">
									<div>
										". $tableauMatchs ."
									</div>
								</div>
							</div>
						</div>"; 
				$countPhase = $countPhase + 1;
		}


echo $content;
?>
	
	<p class="uk-text-center"><?php echo $messagePhasesFinales; ?></p>
	

</div>