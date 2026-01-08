<?php
//Interdit l'accès direct
defined('_LPDT') or die;

//Activation des liaisons clés étrangère
$resultats = $db->query('PRAGMA foreign_keys = "On"');

function infosTournoi($idTournoi)
{	
	global $db;
	$resultats = $db->query('SELECT * FROM tournois WHERE id_tournoi == '. $idTournoi .'');
	while ($row = $resultats->fetchArray(1)) {
		$infosTournoi = $row;
	}
	if(!empty($infosTournoi)){
		return $infosTournoi;
	}
}

function infosEquipe($idEquipe)
{	
	global $db;
	$resultats = $db->query('SELECT * FROM equipe WHERE id_equipe == '. $idEquipe .'');
	while ($row = $resultats->fetchArray(1)) {
		$infosEquipe[] = $row;
	}
	return $infosEquipe;
}

function infosEquipePoulePF($numEquipe)
{	
	global $db;
	$resultats = $db->query('SELECT * FROM equipes_poule_pf WHERE num_equipe == "'. $numEquipe .'"');
	while ($row = $resultats->fetchArray(1)) {
		$infosEquipePoulePF = $row;
	}
	if(!empty($infosEquipePoulePF)){
		return $infosEquipePoulePF;
	}
}

function nbEquipesrestantesPF(){
	global $db;
	$resultats = $db->query('SELECT COUNT(DISTINCT num_equipe) as nbEquipes FROM equipes WHERE dispo_phasesfinales == 1');
	while ($row = $resultats->fetchArray(1)) {
		$nbEquipesRestantesPF = $row['nbEquipes'];
	}
	return $nbEquipesRestantesPF;
}

function dernierTournoi()
{	
	global $db;
	$resultats = $db->query('SELECT id_tournoi FROM tournois ORDER BY id_tournoi DESC LIMIT 1');
	while ($row = $resultats->fetchArray(1)) {
		$dernierIdTournoi = $row['id_tournoi'];
	}
	return $dernierIdTournoi;
}

function infosPhase()
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_qualif');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhase[] = $row;
	}
	if(!empty($infosPhase)){
		return $infosPhase;
	}else{
		$infosPhase = "";
		return $infosPhase;
	}
}

function infosPhasesFinales()
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_finales');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhasesFinales[] = $row;
	}
	if(!empty($infosPhasesFinales)){
		return $infosPhasesFinales;
	}
	
	
}

function infosPhaseFinale($idPhaseFinale)
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_finales WHERE id_phasefinale == "'. $idPhaseFinale .'"');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhaseFinale = $row;
	}
	if(!empty($infosPhaseFinale)){
		return $infosPhaseFinale;
	}
	
	
}

function infosPhaseFinaleNum($numPhaseFinale)
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_finales WHERE num_phasefinale == "'. $numPhaseFinale .'"');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhaseFinale = $row;
	}
	
	if(!empty($infosPhaseFinale)){
		return $infosPhaseFinale;
	}
	
	
}

//function getNumPhaseFinale($idPhaseFinale)
//{
//	global $db;
//	$resultats = $db->query('SELECT * FROM phases_finales WHERE id_phasefinale == "'. $idPhaseFinale .'"');
//	while ($row = $resultats->fetchArray(1)) {
//		$getPhaseFinale[] = $row;
//	}
//	if(!empty($getPhaseFinale)){
//		return $getPhaseFinale;
//	}	
//}



function infosPositions($numPhaseFinale){
	global $db;
	$resultats = $db->query('SELECT position_label, num_equipe, position_score FROM positions_phasesfinales WHERE num_phasefinale == '. $numPhaseFinale .'');
	while ($row = $resultats->fetchArray(1)) {
		$infosPositions[] = $row;
	}
	if(!empty($infosPositions)){
		return $infosPositions;
	}


}

function listeTournois()
{
	global $db;
	$resultats = $db->query('SELECT * FROM tournois ORDER BY id_tournoi DESC');
	while ($row = $resultats->fetchArray(1)) {
		$listeTournois[] = $row;
	}
	
	if(!empty($listeTournois)){
		return $listeTournois;
	}
}

function classementQualifs($idTournoi)
{
	global $db;
	$infosTournoi = infosTournoi($idTournoi);
	$typeClassement = $infosTournoi['type_classement'];
	switch($infosTournoi['type_classperso1']){
		case "nbvictoires";
			$condition1 = 'nb_victoires DESC';
			break;
		case "ptspour";
			$condition1 = 'pts_pour DESC';
			break;
		case "ptscontre";
			$condition1 = 'pts_contre ASC';
			break;
		case "diff";
			$condition1 = 'pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso2']){
		case "aucun";
			$condition2 = '';
			break;
		case "nbvictoires";
			$condition2 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition2 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition2 = ', pts_contre ASC';
			break;
		case "diff";
			$condition2 = ', pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso3']){
		case "aucun";
			$condition3 = '';
			break;
		case "nbvictoires";
			$condition3 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition3 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition3 = ', pts_contre ASC';
			break;
		case "diff";
			$condition3 = ', pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso4']){
		case "aucun";
			$condition4 = '';
			break;
		case "nbvictoires";
			$condition4 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition4 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition4 = ', pts_contre ASC';
			break;
		case "diff";
			$condition4 = ', pts_diff DESC';
			break;
	}


	
	switch ($typeClassement){
		case "CF":
			$orderBY = 'nb_victoires DESC, pts_pour DESC, pts_diff DESC, bonus_qualifs DESC';
			break;
		case "Challenge17":
			$orderBY = 'nb_victoires DESC, pts_diff DESC, pts_pour DESC, bonus_qualifs DESC';
			break;
		case "Perso":
			$orderBY = $condition1.$condition2.$condition3.$condition4.', bonus_qualifs DESC';
			break;
	}

	$resultats = $db->query('SELECT * FROM equipes ORDER BY '. $orderBY .'');
	while ($row = $resultats->fetchArray(1)) {
		$classementQualifs[] = $row;
	}
	if(!empty($classementQualifs)){
		return $classementQualifs;
	}
}

function classementPoulePF($idTournoi)
{
	global $db;
	$infosTournoi = infosTournoi($idTournoi);
	$typeClassement = $infosTournoi['type_classement'];
	switch($infosTournoi['type_classperso1']){
		case "nbvictoires";
			$condition1 = 'nb_victoires DESC';
			break;
		case "ptspour";
			$condition1 = 'pts_pour DESC';
			break;
		case "ptscontre";
			$condition1 = 'pts_contre ASC';
			break;
		case "diff";
			$condition1 = 'pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso2']){
		case "aucun";
			$condition2 = '';
			break;
		case "nbvictoires";
			$condition2 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition2 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition2 = ', pts_contre ASC';
			break;
		case "diff";
			$condition2 = ', pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso3']){
		case "aucun";
			$condition3 = '';
			break;
		case "nbvictoires";
			$condition3 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition3 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition3 = ', pts_contre ASC';
			break;
		case "diff";
			$condition3 = ', pts_diff DESC';
			break;
	}

	switch($infosTournoi['type_classperso4']){
		case "aucun";
			$condition4 = '';
			break;
		case "nbvictoires";
			$condition4 = ', nb_victoires DESC';
			break;
		case "ptspour";
			$condition4 = ', pts_pour DESC';
			break;
		case "ptscontre";
			$condition4 = ', pts_contre ASC';
			break;
		case "diff";
			$condition4 = ', pts_diff DESC';
			break;
	}


	
	switch ($typeClassement){
		case "CF":
			$orderBY = 'nb_victoires DESC, pts_pour DESC, pts_diff DESC';
			break;
		case "Challenge17":
			$orderBY = 'nb_victoires DESC, pts_diff DESC, pts_pour DESC';
			break;
		case "Perso":
			$orderBY = $condition1.$condition2.$condition3.$condition4;
			break;
	}

	$resultats = $db->query('SELECT * FROM equipes_poule_pf ORDER BY '. $orderBY .'');
	while ($row = $resultats->fetchArray(1)) {
		$classementPoulePF[] = $row;
	}
	if(!empty($classementPoulePF)){
		return $classementPoulePF;
	}
}



function classementPF($numPhaseFinale)
{
	global $db;
	$resultats = $db->query("SELECT * FROM classements WHERE class_numphase == '$numPhaseFinale' ORDER BY class_place ASC");
	while ($row = $resultats->fetchArray(1)) {
		$classementPF[] = $row;
	}
	if(!empty($classementPF)){
		return $classementPF;
	}
}

function classementFinal()
{
	global $db;
	$resultats = $db->query("SELECT * FROM classements ORDER BY class_numphase ASC, class_place ASC");
	while ($row = $resultats->fetchArray(1)) {
		$classementFinal[] = $row;
	}
	if(!empty($classementFinal)){
		return $classementFinal;
	}
}

function listeEquipes()
{
	global $db;
	$resultats = $db->query('SELECT * FROM equipes');
	while ($row = $resultats->fetchArray(1)) {
		$listeEquipes[] = $row;
	}
	if(!empty($listeEquipes)){
		return $listeEquipes;
	}else{
		$listeEquipes = "";
		return $listeEquipes;
	}
}

function updateNumEquipe($idEquipe, $numEquipe){
	global $db;

	$db->exec("UPDATE equipes SET num_equipe = \"$numEquipe\" WHERE id_equipe == '$idEquipe'");


}



function listeMatchsQualif($numPhase)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_qualifs WHERE num_phase == '. $numPhase .'');
	while ($row = $resultats->fetchArray(1)) {
		$listeMatchs[] = $row;
	}
	
	return $listeMatchs;
}

function isLock($numPhase)
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_qualif WHERE num_phase == '. $numPhase .'');
	while ($row = $resultats->fetchArray(1)) {
		$detailsPhase[] = $row;
	}
	
	return $detailsPhase;
}

function listeEquipesPhaseFinale($numPhase,$niveau,$position)
{
	global $db;
	$resultats = $db->query('SELECT * FROM positions_phasesfinales WHERE num_phasefinale == '. $numPhase .' AND position_niveau == "'. $niveau .'" and position_label LIKE "'. $position .'%"');
	while ($row = $resultats->fetchArray(1)) {
		$listeEquipes[] = $row;
	}


	if(empty($listeEquipes)){
		$listeEquipes = [];
	}
	return $listeEquipes;
}

function constructTableMatchsPF($idTournoi, $label, $listeEquipes , $numPlaque, $numPhaseFinale)
{
	
	//$label = mb_convert_encoding($label, 'UTF-8', 'ISO-8859-1');
	$infosTournoi = infosTournoi($idTournoi);
	$idPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
	$idPhaseFinale = $idPhaseFinale['id_phasefinale'];
	$nbEquipes = count($listeEquipes);
	$nbRencontres = $nbEquipes / 2;

	$tablePair = [];
	$tableImpair = [];
	$indexRow = 0;
	$indexEquipe = 1;
	
	foreach($listeEquipes as $row){
		if ($indexEquipe&1){
			$tableImpair[] = $row;
		}else{
			$tablePair[] = $row;
		}
		$indexEquipe++;
	}
	$listeMatchs = [];
	while( $indexRow < $nbRencontres){
		$listeMatchs[] = ["position1" => $tableImpair[$indexRow]['position_label'], "equipe1" => $tableImpair[$indexRow]['num_equipe'], "score1" => $tableImpair[$indexRow]['position_score'] , "position2" => $tablePair[$indexRow]['position_label'], "equipe2" => $tablePair[$indexRow]['num_equipe'], "score2" => $tablePair[$indexRow]['position_score']];
		
		$indexRow = $indexRow +1;
	}	
	//print_r($listeMatchs);
	$tableauRow = "";


	$indexPlayed = 0;
	$nbMatchs = count($listeMatchs);
	$rawMatchsContent = "";


	foreach ($listeMatchs as $row){
		$position1 = $row['position1'];
		$position2 = $row['position2'];
		$idMatch = $row['position2'];
		$score1 = $row['score1'];
		$score2 = $row['score2'];
		$equipe1 = $row['equipe1'];
		$equipe2 = $row['equipe2'];
		$indexSelect = -1;
		$selectOptions1 = "<option value=\"\"></option>";
		$selectOptions2 = "<option value=\"\"></option>";
		
		$ptsMatch = $infosTournoi['pts_phasesfinales'];

		if($label == "Finale" || $label == "Challenge Finale"){
			$ptsMatch = $infosTournoi['pts_finales'];
		}
		
		if($label == "Petite finale" || $label == "Challenge Petite finale"){
			$ptsMatch = $infosTournoi['pts_petitefinales'];
		}

		if($score1 == $ptsMatch || $score2 == $ptsMatch){
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

		


		while ($indexSelect < $ptsMatch){
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
		
		$tableauRow .= "<tr style=\"scroll-margin-top: 300px;\" id=\"matchid-$idMatch\" class=\"anchor\">
			<td style=\"width:100%\">
				<form method=\"POST\" id=\"formMatch-$idMatch\" action=\"index.php?idtournoi=$idTournoi&idphase=$idPhaseFinale&page=matchsphasesfinales#matchid-$idMatch\">
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\">$numPlaque</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe1</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side1\" onchange=\"activateLinkPF('validMatch-$idMatch', 'side2', ".$ptsMatch .", '$idMatch')\" name=\"score1\" class=\"uk-select\"  >
						$selectOptions1
					</select>
				</div>
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\"><a id=\"validMatch-$idMatch\" style=\"color: gray\" uk-icon=\"check\" class=\"disabled\"></a></div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side2\" onchange=\"activateLinkPF('validMatch-$idMatch', 'side1', ".$ptsMatch .", '$idMatch')\" name=\"score2\" class=\"uk-select\"  >
						$selectOptions2
					</select>
				</div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe2</div>
				<div class=\"pointStatut $matchPlayed\" style=\"display:inline-block;width: 10px;height:10px;border-radius: 50%;background-color:". $matchPlayed ."\"></div>

			
				<input type=\"hidden\" name=\"idTournoi\"  value=\"$idTournoi\"></input>
				<input type=\"hidden\" name=\"numPhaseFinale\"  value=\"$numPhaseFinale\"></input>
				<input type=\"hidden\" name=\"position1\"  value=\"$position1\"></input>
				<input type=\"hidden\" name=\"position2\"  value=\"$position2\"></input>
				<input type=\"hidden\" name=\"idPhaseFinale\"  value=\"$idPhaseFinale\"></input>
				<input type=\"hidden\" name=\"action\"  value=\"miseajourMatchPhaseFinale\"></input>
				</form>
			</td>
		</tr>";
		$rawMatchsContent .= "<tr><td class=\"numplaque\"> $numPlaque</td><td>$equipe1</td><td>$score1</td><td>$score2</td><td>$equipe2</td></tr>";

		$numPlaque++;
	}

	$rawMatchsHeader = "<div style='display:none' name='$label'><h1>$label - en $ptsMatch pts</h1><table><tr><th>Plaque</th><th width=150>Equipe 1</th><th>Score 1</th><th>Score 2</th><th width=150>Equipe 2</th></tr>";	
	$tableauHead="<div class=\"uk-width-1-1 uk-width-1-2@l uk-width-1-2@xl\">
		<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-auto\"><h4>". $label ." en ". $ptsMatch ." Points</h4></div><div otpname=\"bigPoint $label\" style=\"margin-top: 8px;margin-left: 20px;display:inline-block;border-radius: 50%; height: 15px;background-color:$allPlayed ;\"></div>
					<div class=\"uk-width-expand uk-text-right panel-icons\"></div>
					
				</div>
			</div>
			<div class=\"uk-card-body\">
				<div>
					<table niveau=\"$label\" class=\"uk-table uk-table-striped\" style=\"width: 100%\">
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
					
	$tableauFooter="
					</table>
				</div>
			</div>
		</div>
	</div>";
	$rawMatchsFooter = "</table></div>";
	

	$tableau = $tableauHead.$tableauRow.$tableauFooter.$rawMatchsHeader.$rawMatchsContent.$rawMatchsFooter;
	

	return $tableau;


}

function constructTableMatchsPFWeb($idTournoi, $label, $listeEquipes , $numPlaque, $numPhaseFinale)
{
	
	//$label = mb_convert_encoding($label, 'UTF-8', 'ISO-8859-1');
	$infosTournoi = infosTournoi($idTournoi);
	$idPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
	$idPhaseFinale = $idPhaseFinale['id_phasefinale'];
	$nbEquipes = count($listeEquipes);
	$nbRencontres = $nbEquipes / 2;

	$tablePair = [];
	$tableImpair = [];
	$indexRow = 0;
	$indexEquipe = 1;
	
	foreach($listeEquipes as $row){
		if ($indexEquipe&1){
			$tableImpair[] = $row;
		}else{
			$tablePair[] = $row;
		}
		$indexEquipe++;
	}
	$listeMatchs = [];
	while( $indexRow < $nbRencontres){
		$listeMatchs[] = ["position1" => $tableImpair[$indexRow]['position_label'], "equipe1" => $tableImpair[$indexRow]['num_equipe'], "score1" => $tableImpair[$indexRow]['position_score'] , "position2" => $tablePair[$indexRow]['position_label'], "equipe2" => $tablePair[$indexRow]['num_equipe'], "score2" => $tablePair[$indexRow]['position_score']];
		
		$indexRow = $indexRow +1;
	}	
	$rawMatchsContent = "";
	foreach ($listeMatchs as $row){
		$position1 = $row['position1'];
		$position2 = $row['position2'];
		$idMatch = $row['position2'];
		$score1 = $row['score1'];
		$score2 = $row['score2'];
		$equipe1 = $row['equipe1'];
		$equipe2 = $row['equipe2'];
		
		$rawMatchsContent .= "<tr><td>$equipe1</td><td>$score1</td><td>$score2</td><td>$equipe2</td></tr>";

		$numPlaque++;
	}

	$rawMatchsHeader = "<br /><br /><br /><h3>$label</h3><table><tr><th>Equipe 1</th><th>Score 1</th><th>Score 2</th><th>Equipe 2</th></tr>";
	$rawMatchsFooter = "</table>";

	$tableau = $rawMatchsHeader.$rawMatchsContent.$rawMatchsFooter;
	
	return $tableau;
}

function listeMatchsPoulePF($numPhaseFinale)
{
	global $db;

	
	return $listeMatchs;
}

function constructTableMatchsPoule($idTournoi, $label, $listeEquipes, $numPlaque, $numPhaseFinale, $tour){
	
	global $db;
	$infosTournoi = infosTournoi($idTournoi);
	$infosPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
	$idPhaseFinale = $infosPhaseFinale['id_phasefinale'];
	$ptsMatch = $infosTournoi['pts_phasesfinales'];
	$resultats = $db->query('SELECT * FROM matchs_phasesfinales WHERE num_phasefinale == '. $numPhaseFinale .' AND tour_poule == '. $tour .'');
	while ($row = $resultats->fetchArray(1)) {
		$listeMatchs[] = $row;
	}

	$indexPlayed = 0;
	$nbMatchs = count($listeMatchs);
	$tableauRow = "";
	foreach ($listeMatchs as $row){
		$idMatch = $row['id_matchphasesfinales'];
		$score1 = $row['score1'];
		$score2 = $row['score2'];
		$equipe1 = $row['equipe1'];
		$equipe2 = $row['equipe2'];


		if($score1 == $ptsMatch || $score2 == $ptsMatch){
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
	
		$indexSelect = -1;
		$selectOptions1 = "<option value=\"\"></option>";
		$selectOptions2 = "<option value=\"\"></option>";
		
		while ($indexSelect < $ptsMatch){
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
		
		$tableauRow .= "<tr style=\"scroll-margin-top: 300px;\" id=\"matchid-$idMatch\" class=\"anchor\">
			<td style=\"width:100%\">
				<form method=\"POST\" id=\"formMatch-$idMatch\" action=\"index.php?idtournoi=$idTournoi&idphase=$idPhaseFinale&page=matchsphasesfinales#matchid-$idMatch\">
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\">$numPlaque</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe1</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side1\" onchange=\"activateLinkPoulePF('validMatch-$idMatch', 'side2', ".$ptsMatch .", '$idMatch')\" name=\"score1\" class=\"uk-select\"  >
						$selectOptions1
					</select>
				</div>
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\"><a id=\"validMatch-$idMatch\" style=\"color: gray\" uk-icon=\"check\" class=\"disabled\"></a></div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side2\" onchange=\"activateLinkPoulePF('validMatch-$idMatch', 'side1', ".$ptsMatch .", '$idMatch')\" name=\"score2\" class=\"uk-select\"  >
						$selectOptions2
					</select>
				</div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe2</div>
				<div class=\"pointStatut $matchPlayed\" style=\"display:inline-block;width: 10px;height:10px;border-radius: 50%;background-color:". $matchPlayed ."\"></div>

			
				<input type=\"hidden\" name=\"idTournoi\"  value=\"$idTournoi\"></input>
				<input type=\"hidden\" name=\"numPhaseFinale\"  value=\"$numPhaseFinale\"></input>
				<input type=\"hidden\" name=\"idPhaseFinale\"  value=\"$idPhaseFinale\"></input>
				<input type=\"hidden\" name=\"idMatch\"  value=\"$idMatch\"></input>
				<input type=\"hidden\" name=\"action\"  value=\"miseajourMatchPoulePF\"></input>
				</form>
			</td>
		</tr>";
		$numPlaque++;

	}
	
	$tableauHead="<div class=\"uk-width-1-1 uk-width-1-2@l uk-width-1-2@xl\">
		<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-auto\"><h4>". $label ." en ". $ptsMatch ." Points</h4></div><div otpname=\"bigPoint $label\" style=\"margin-top: 8px;margin-left: 20px;display:inline-block;border-radius: 50%; height: 15px;background-color:$allPlayed ;\"></div>
					<div class=\"uk-width-expand uk-text-right panel-icons\"></div>
					
				</div>
			</div>
			<div class=\"uk-card-body\">
				<div>
					<table niveau=\"$label\" class=\"uk-table uk-table-striped\" style=\"width: 100%\">
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
					
	$tableauFooter="
					</table>
				</div>
			</div>
		</div>
	</div>";
	

	$tableau = $tableauHead.$tableauRow.$tableauFooter;
	
	
	return $tableau;

}


function statsEquipe($numEquipe)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_qualifs WHERE ( equipe1 == '. $numEquipe.' OR equipe2 == '. $numEquipe.')');
	
	while ($rowResults = $resultats->fetchArray(1)) {
		$listeMatchsEquipe[] = $rowResults;
	}
	
	$ptsPour = 0;
	$ptsContre = 0;
	$nbVictoires = 0;
	
	//echo $row['score1']."-".$row['score2'];
	if(!empty($listeMatchsEquipe)){
		foreach ($listeMatchsEquipe as $row){
			if ($numEquipe == $row['equipe1']){
				if(is_numeric($row['score1'])){
					$ptsPour = $ptsPour + $row['score1'];
					$ptsContre = $ptsContre + $row['score2'];
				
					if ($row['score1'] > $row['score2']){
						$nbVictoires = $nbVictoires + 1;
					}
				}
			}else{
				if(is_numeric($row['score2'])){
					$ptsPour = $ptsPour + $row['score2'];
					$ptsContre = $ptsContre + $row['score1'];
					if ($row['score1'] < $row['score2']){
						$nbVictoires = $nbVictoires + 1;
					}
				}
			}
		}
	}
	
		$ptsDiff = $ptsPour - $ptsContre;
		$db->exec("UPDATE equipes SET nb_victoires = \"$nbVictoires\", pts_pour = \"$ptsPour\", pts_contre = \"$ptsContre\", pts_diff = \"$ptsDiff\" WHERE num_equipe == '$numEquipe'");
	
	
}

function statsEquipePoulePF($numEquipe)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_phasesfinales WHERE ( equipe1 == '. $numEquipe.' OR equipe2 == '. $numEquipe.')');
	
	while ($rowResults = $resultats->fetchArray(1)) {
		$listeMatchsEquipe[] = $rowResults;
	}
	
	$ptsPour = 0;
	$ptsContre = 0;
	$nbVictoires = 0;
	
	//echo $row['score1']."-".$row['score2'];
	if(!empty($listeMatchsEquipe)){
		foreach ($listeMatchsEquipe as $row){
			if ($numEquipe == $row['equipe1']){
				if(is_numeric($row['score1'])){
					$ptsPour = $ptsPour + $row['score1'];
					$ptsContre = $ptsContre + $row['score2'];
				
					if ($row['score1'] > $row['score2']){
						$nbVictoires = $nbVictoires + 1;
					}
				}
			}else{
				if(is_numeric($row['score2'])){
					$ptsPour = $ptsPour + $row['score2'];
					$ptsContre = $ptsContre + $row['score1'];
					if ($row['score1'] < $row['score2']){
						$nbVictoires = $nbVictoires + 1;
					}
				}
			}
		}
	}
	
		$ptsDiff = $ptsPour - $ptsContre;
		$db->exec("UPDATE equipes_poule_pf SET nb_victoires = \"$nbVictoires\", pts_pour = \"$ptsPour\", pts_contre = \"$ptsContre\", pts_diff = \"$ptsDiff\" WHERE num_equipe == '$numEquipe'");
	
	
}

function genererArbrePhaseFinale($numPhaseFinale,$nombreEquipes){
	
	global $db;
	$indexEquipe = 1;

	$niveau="";
	switch ($nombreEquipes) {
		case 4:
			$niveau = "Demi-finales";
			break;
		case 8:
			$niveau = "Quarts de finale";
			break;
		case 16:
			$niveau = "8èmes de finale";
			break;
		case 32:
			$niveau = "16èmes de finale";
			break;
		case 64:
			$niveau = "32èmes de finale";
			break;
		case 128:
			$niveau = "64èmes de finale";
			break;
	}

	while ($indexEquipe <= $nombreEquipes){

		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'A". $indexEquipe ."', '". $niveau ."')");
		
		$indexEquipe = $indexEquipe + 1;
	}

	$indexEquipe = 1;
	$nbEquipesB = $nombreEquipes / 2;

	$niveau="";
	switch ($nombreEquipes) {
		case 4:
			$niveau = "Finale";
			break;
		case 8:
			$niveau = "Demi-finales";
			break;
		case 16:
			$niveau = "Quarts de finale";
			break;
		case 32:
			$niveau = "8èmes de finale";
			break;
		case 64:
			$niveau = "16èmes de finale";
			break;
		case 128:
			$niveau = "32èmes de finale";
			break;
	}


	while ($indexEquipe <= $nbEquipesB){

		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'B". $indexEquipe ."', '". $niveau ."')");

		if($nombreEquipes > 8){
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHA". $indexEquipe ."', 'Challenge ". $niveau ."')");
		}
		
		$indexEquipe++;
	}

	
	if($nombreEquipes > 2){
		$indexEquipe = 1;
		$nbEquipesC = $nombreEquipes / 4;

		$niveau="";
		switch ($nombreEquipes) {
			
			case 8:
				$niveau = "Finale";
				break;
			case 16:
				$niveau = "Demi-finales";
				break;
			case 32:
				$niveau = "Quarts de finale";
				break;
			case 64:
				$niveau = "8èmes de finale";
				break;
			case 128:
				$niveau = "16èmes de finale";
				break;
		}


		while ($indexEquipe <= $nbEquipesC){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'C". $indexEquipe ."', '". $niveau ."')");
			
			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHB". $indexEquipe ."', 'Challenge ". $niveau ."')");
			}
			
			$indexEquipe++;
		}
	

	}

	if($nombreEquipes > 4){
		$indexEquipe = 1;
		$nbEquipesD = $nombreEquipes / 8;
		
		$niveau="";
		switch ($nombreEquipes) {
			
			case 16:
				$niveau = "Finale";
				break;
			case 32:
				$niveau = "Demi-finales";
				break;
			case 64:
				$niveau = "Quarts de finale";
				break;
			case 128:
				$niveau = "8èmes de finale";
				break;
		}


		while ($indexEquipe <= $nbEquipesD){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'D". $indexEquipe ."', '". $niveau ."')");
			
			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHC". $indexEquipe ."', 'Challenge " . $niveau ."')");
			}

			$indexEquipe++;
		}

	}

	if($nombreEquipes > 8){
		$indexEquipe = 1;
		$nbEquipesE = $nombreEquipes / 16;

		$niveau="";
		switch ($nombreEquipes) {
			
			case 32:
				$niveau = "Finale";
				break;
			case 64:
				$niveau = "Demi-finales";
				break;
			case 128:
				$niveau = "Quarts de finale";
				break;
		}


		while ($indexEquipe <= $nbEquipesE){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'E". $indexEquipe ."', '". $niveau ."')");

			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHD". $indexEquipe ."', 'Challenge ". $niveau ."')");
			}

			$indexEquipe++;
		}

	}

	if($nombreEquipes > 16){
		$indexEquipe = 1;
		$nbEquipesF = $nombreEquipes / 32;
		
		$niveau="";
		switch ($nombreEquipes) {
			
			case 64:
				$niveau = "Finale";
				break;
			case 128:
				$niveau = "Demi-finales";
				break;
		}

		while ($indexEquipe <= $nbEquipesF){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'F". $indexEquipe ."', '". $niveau ."')");
			
			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHE". $indexEquipe ."', 'Challenge ". $niveau ."')");
			}

			$indexEquipe++;
		}

	}

	if($nombreEquipes > 32){
		$indexEquipe = 1;
		$nbEquipesG = $nombreEquipes / 64;
		
		$niveau="";
		switch ($nombreEquipes) {
			
			
			case 128:
				$niveau = "Finale";
				break;
		}

		while ($indexEquipe <= $nbEquipesG){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'G". $indexEquipe ."', '". $niveau ."')");
			
			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHF". $indexEquipe ."', 'Challenge ". $niveau ."')");
			}

			$indexEquipe++;
		}

	}
	
	if($nombreEquipes > 64){
		$indexEquipe = 1;
		$nbEquipesH = $nombreEquipes / 128;

		$niveau="";

		while ($indexEquipe <= $nbEquipesH){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'H". $indexEquipe ."', '". $niveau ."')");
			
			if($nombreEquipes > 8){
				$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHG". $indexEquipe ."', 'Challenge ". $niveau ."')");
			}

			$indexEquipe++;
		}

	}

	// Creation des petites finales
	if($nombreEquipes > 2){
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'PF1', 'Petite finale')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'PF2', 'Petite finale')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'PFV1', '')");
	}
	if($nombreEquipes > 8){
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHPF1', 'Challenge Petite finale')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHPF2', 'Challenge Petite finale')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHPFV1', '')");
	}

	//Création des matchs de classements pour 8 et 16 equipes
	if($nombreEquipes == 8 || $nombreEquipes == 16){
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLA1', 'Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLA2', 'Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLA3', 'Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLA4', 'Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLB1', 'Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLB2', 'Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLC1', '')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLZ1', 'Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLZ2', 'Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CLY1', '')");
	}
	if($nombreEquipes == 16){
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLA1', 'Challenge Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLA2', 'Challenge Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLA3', 'Challenge Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLA4', 'Challenge Classement 1er Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLB1', 'Challenge Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLB2', 'Challenge Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLC1', '')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLZ1', 'Challenge Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLZ2', 'Challenge Classement 2ème Tour')");
		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label, position_niveau) VALUES ('". $numPhaseFinale ."', 'CHCLY1', '')");
	}

}

function setNewPosition($numPhaseFinale,$position1, $position2, $positionVainqueur, $positionPerdant){
	global $db;
	$resultats1 = $db->query('SELECT * FROM positions_phasesfinales WHERE num_phasefinale == '. $numPhaseFinale .' AND position_label == "'. $position1 .'"');
	$resultats2 = $db->query('SELECT * FROM positions_phasesfinales WHERE num_phasefinale == '. $numPhaseFinale .' AND position_label == "'. $position2 .'"');
	$score1 = "";
	$score2 = "";
	
	while ($row1 = $resultats1->fetchArray(1)) {
		$score1 = $row1['position_score'];
		$numEquipe1 = $row1['num_equipe'];
	}
	
	while ($row2 = $resultats2->fetchArray(1)) {
		$score2 = $row2['position_score'];
		$numEquipe2 = $row2['num_equipe'];
	}
	
	if($score1>$score2){
		$perduA = $score2;
		$vainqueur = $numEquipe1;
		$perdant = $numEquipe2;
	}else{
		$perduA = $score1;
		$vainqueur = $numEquipe2;
		$perdant = $numEquipe1;
	}
	


// DEBUGG                     
//echo $score1."-";
//echo $score2." ";

	if(is_numeric($score1) && is_numeric($score2)){
		$db->exec("UPDATE positions_phasesfinales SET num_equipe = '$vainqueur', score_precedent ='$perduA' WHERE num_phasefinale == ". $numPhaseFinale ." AND position_label == \"". $positionVainqueur ."\"");
		$db->exec("UPDATE positions_phasesfinales SET num_equipe = '$perdant' WHERE num_phasefinale == ". $numPhaseFinale ." AND position_label == \"". $positionPerdant ."\"");
	}else{
		$db->exec("UPDATE positions_phasesfinales SET num_equipe = '' WHERE num_phasefinale == ". $numPhaseFinale ." AND position_label == \"". $positionVainqueur ."\"");
		$db->exec("UPDATE positions_phasesfinales SET num_equipe = '' WHERE num_phasefinale == ". $numPhaseFinale ." AND position_label == \"". $positionPerdant ."\"");
	}
}

function calculPhaseFinale($numPhaseFinale, $nbEquipes){
	
	if($nbEquipes == 4){
		
		setNewPosition($numPhaseFinale,"A1","A2","B1","PF1");
		setNewPosition($numPhaseFinale,"A3","A4","B2","PF2");

		setNewPosition($numPhaseFinale,"B1","B2","C1","");
		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");

	}

	if($nbEquipes == 8){
		
		setNewPosition($numPhaseFinale,"A1","A2","B1","CLA1");
		setNewPosition($numPhaseFinale,"A3","A4","B2","CLA2");
		setNewPosition($numPhaseFinale,"A5","A6","B3","CLA3");
		setNewPosition($numPhaseFinale,"A7","A8","B4","CLA4");
		
		setNewPosition($numPhaseFinale,"B1","B2","C1","PF1");
		setNewPosition($numPhaseFinale,"B3","B4","C2","PF2");
		
		setNewPosition($numPhaseFinale,"C1","C2","D1","");

		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");
				
		setNewPosition($numPhaseFinale,"CLA1","CLA2","CLB1","CLZ1");
		setNewPosition($numPhaseFinale,"CLA3","CLA4","CLB2","CLZ2");

		setNewPosition($numPhaseFinale,"CLB1","CLB2","CLC1","");
		setNewPosition($numPhaseFinale,"CLZ1","CLZ2","CLY1","");

	}


	if($nbEquipes == 16){
		//Calcul B1 CHA1
		setNewPosition($numPhaseFinale,"A1","A2","B1","CHA1");
		//Calcul B2 CHA2
		setNewPosition($numPhaseFinale,"A3","A4","B2","CHA2");
		//Calcul B3 CHA3
		setNewPosition($numPhaseFinale,"A5","A6","B3","CHA3");
		//Calcul B4 CHA4
		setNewPosition($numPhaseFinale,"A7","A8","B4","CHA4");
		//Calcul B5 CHA1
		setNewPosition($numPhaseFinale,"A9","A10","B5","CHA5");
		//Calcul B6 CHA2
		setNewPosition($numPhaseFinale,"A11","A12","B6","CHA6");
		//Calcul B7 CHA3
		setNewPosition($numPhaseFinale,"A13","A14","B7","CHA7");
		//Calcul B8 CHA4
		setNewPosition($numPhaseFinale,"A15","A16","B8","CHA8");
		
		//Calcul D1 PF1 Finales
		setNewPosition($numPhaseFinale,"C1","C2","D1","PF1");
		setNewPosition($numPhaseFinale,"C3","C4","D2","PF2");

		//Calcul E1 - Vainqueurs
		setNewPosition($numPhaseFinale,"D1","D2","E1","");
		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");
				
			
		//Calcul C1 CLA1
		setNewPosition($numPhaseFinale,"B1","B2","C1","CLA1");
		//Calcul C2 CLA2
		setNewPosition($numPhaseFinale,"B3","B4","C2","CLA2");
		//Calcul C3 CLA2
		setNewPosition($numPhaseFinale,"B5","B6","C3","CLA3");
		//Calcul C4 CLA2
		setNewPosition($numPhaseFinale,"B7","B8","C4","CLA4");

		setNewPosition($numPhaseFinale,"CLA1","CLA2","CLB1","CLZ1");
		setNewPosition($numPhaseFinale,"CLA3","CLA4","CLB2","CLZ2");

		setNewPosition($numPhaseFinale,"CLB1","CLB2","CLC1","");
		setNewPosition($numPhaseFinale,"CLZ1","CLZ2","CLY1","");

		//Calcul CHB1 CHCLA1
		setNewPosition($numPhaseFinale,"CHA1","CHA2","CHB1","CHCLA1");
		//Calcul CHB2 CHCLA2
		setNewPosition($numPhaseFinale,"CHA3","CHA4","CHB2","CHCLA2");
		//Calcul CHB3 CHCLA3
		setNewPosition($numPhaseFinale,"CHA5","CHA6","CHB3","CHCLA3");
		//Calcul CHB4 CHCLA4
		setNewPosition($numPhaseFinale,"CHA7","CHA8","CHB4","CHCLA4");

		//Calcul CHC1 CHPF1
		setNewPosition($numPhaseFinale,"CHB1","CHB2","CHC1","CHPF1");
		setNewPosition($numPhaseFinale,"CHB3","CHB4","CHC2","CHPF2");

		setNewPosition($numPhaseFinale,"CHC1","CHC2","CHD1","");
		setNewPosition($numPhaseFinale,"CHPF1","CHPF2","CHPFV1","");

		
		setNewPosition($numPhaseFinale,"CHCLA1","CHCLA2","CHCLB1","CHCLZ1");
		setNewPosition($numPhaseFinale,"CHCLA3","CHCLA4","CHCLB2","CHCLZ2");

		setNewPosition($numPhaseFinale,"CHCLB1","CHCLB2","CHCLC1","");
		setNewPosition($numPhaseFinale,"CHCLZ1","CHCLZ2","CHCLY1","");

	}
	
	if($nbEquipes == 32){
		setNewPosition($numPhaseFinale,"A1","A2","B1","CHA1");
		setNewPosition($numPhaseFinale,"A3","A4","B2","CHA2");
		setNewPosition($numPhaseFinale,"A5","A6","B3","CHA3");
		setNewPosition($numPhaseFinale,"A7","A8","B4","CHA4");
		setNewPosition($numPhaseFinale,"A9","A10","B5","CHA5");
		setNewPosition($numPhaseFinale,"A11","A12","B6","CHA6");
		setNewPosition($numPhaseFinale,"A13","A14","B7","CHA7");
		setNewPosition($numPhaseFinale,"A15","A16","B8","CHA8");
		setNewPosition($numPhaseFinale,"A17","A18","B9","CHA9");
		setNewPosition($numPhaseFinale,"A19","A20","B10","CHA10");
		setNewPosition($numPhaseFinale,"A21","A22","B11","CHA11");
		setNewPosition($numPhaseFinale,"A23","A24","B12","CHA12");
		setNewPosition($numPhaseFinale,"A25","A26","B13","CHA13");
		setNewPosition($numPhaseFinale,"A27","A28","B14","CHA14");
		setNewPosition($numPhaseFinale,"A29","A30","B15","CHA15");
		setNewPosition($numPhaseFinale,"A31","A32","B16","CHA16");

		setNewPosition($numPhaseFinale,"B1","B2","C1","");
		setNewPosition($numPhaseFinale,"B3","B4","C2","");
		setNewPosition($numPhaseFinale,"B5","B6","C3","");
		setNewPosition($numPhaseFinale,"B7","B8","C4","");
		setNewPosition($numPhaseFinale,"B9","B10","C5","");
		setNewPosition($numPhaseFinale,"B11","B12","C6","");
		setNewPosition($numPhaseFinale,"B13","B14","C7","");
		setNewPosition($numPhaseFinale,"B15","B16","C8","");

		setNewPosition($numPhaseFinale,"C1","C2","D1","");
		setNewPosition($numPhaseFinale,"C3","C4","D2","");
		setNewPosition($numPhaseFinale,"C5","C6","D3","");
		setNewPosition($numPhaseFinale,"C7","C8","D4","");
				
		setNewPosition($numPhaseFinale,"D1","D2","E1","PF1");
		setNewPosition($numPhaseFinale,"D3","D4","E2","PF2");

		
		setNewPosition($numPhaseFinale,"E1","E2","F1","");
		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");

		setNewPosition($numPhaseFinale,"CHA1","CHA2","CHB1","");
		setNewPosition($numPhaseFinale,"CHA3","CHA4","CHB2","");
		setNewPosition($numPhaseFinale,"CHA5","CHA6","CHB3","");
		setNewPosition($numPhaseFinale,"CHA7","CHA8","CHB4","");
		setNewPosition($numPhaseFinale,"CHA9","CHA10","CHB5","");
		setNewPosition($numPhaseFinale,"CHA11","CHA12","CHB6","");
		setNewPosition($numPhaseFinale,"CHA13","CHA14","CHB7","");
		setNewPosition($numPhaseFinale,"CHA15","CHA16","CHB8","");

		setNewPosition($numPhaseFinale,"CHB1","CHB2","CHC1","");
		setNewPosition($numPhaseFinale,"CHB3","CHB4","CHC2","");
		setNewPosition($numPhaseFinale,"CHB5","CHB6","CHC3","");
		setNewPosition($numPhaseFinale,"CHB7","CHB8","CHC4","");

		setNewPosition($numPhaseFinale,"CHC1","CHC2","CHD1","CHPF1");
		setNewPosition($numPhaseFinale,"CHC3","CHC4","CHD2","CHPF2");
		
		setNewPosition($numPhaseFinale,"CHD1","CHD2","CHE1","");


		setNewPosition($numPhaseFinale,"CHPF1","CHPF2","CHPFV1","");

	}

	if($nbEquipes == 64){
		setNewPosition($numPhaseFinale,"A1","A2","B1","CHA1");
		setNewPosition($numPhaseFinale,"A3","A4","B2","CHA2");
		setNewPosition($numPhaseFinale,"A5","A6","B3","CHA3");
		setNewPosition($numPhaseFinale,"A7","A8","B4","CHA4");
		setNewPosition($numPhaseFinale,"A9","A10","B5","CHA5");
		setNewPosition($numPhaseFinale,"A11","A12","B6","CHA6");
		setNewPosition($numPhaseFinale,"A13","A14","B7","CHA7");
		setNewPosition($numPhaseFinale,"A15","A16","B8","CHA8");
		setNewPosition($numPhaseFinale,"A17","A18","B9","CHA9");
		setNewPosition($numPhaseFinale,"A19","A20","B10","CHA10");
		setNewPosition($numPhaseFinale,"A21","A22","B11","CHA11");
		setNewPosition($numPhaseFinale,"A23","A24","B12","CHA12");
		setNewPosition($numPhaseFinale,"A25","A26","B13","CHA13");
		setNewPosition($numPhaseFinale,"A27","A28","B14","CHA14");
		setNewPosition($numPhaseFinale,"A29","A30","B15","CHA15");
		setNewPosition($numPhaseFinale,"A31","A32","B16","CHA16");
		setNewPosition($numPhaseFinale,"A33","A34","B17","CHA17");
		setNewPosition($numPhaseFinale,"A35","A36","B18","CHA18");
		setNewPosition($numPhaseFinale,"A37","A38","B19","CHA19");
		setNewPosition($numPhaseFinale,"A39","A40","B20","CHA20");
		setNewPosition($numPhaseFinale,"A41","A42","B21","CHA21");
		setNewPosition($numPhaseFinale,"A43","A44","B22","CHA22");
		setNewPosition($numPhaseFinale,"A45","A46","B23","CHA23");
		setNewPosition($numPhaseFinale,"A47","A48","B24","CHA24");
		setNewPosition($numPhaseFinale,"A49","A50","B25","CHA25");
		setNewPosition($numPhaseFinale,"A51","A52","B26","CHA26");
		setNewPosition($numPhaseFinale,"A53","A54","B27","CHA27");
		setNewPosition($numPhaseFinale,"A55","A56","B28","CHA28");
		setNewPosition($numPhaseFinale,"A57","A58","B29","CHA29");
		setNewPosition($numPhaseFinale,"A59","A60","B30","CHA30");
		setNewPosition($numPhaseFinale,"A61","A61","B31","CHA31");
		setNewPosition($numPhaseFinale,"A63","A64","B32","CHA32");

		setNewPosition($numPhaseFinale,"B1","B2","C1","");
		setNewPosition($numPhaseFinale,"B3","B4","C2","");
		setNewPosition($numPhaseFinale,"B5","B6","C3","");
		setNewPosition($numPhaseFinale,"B7","B8","C4","");
		setNewPosition($numPhaseFinale,"B9","B10","C5","");
		setNewPosition($numPhaseFinale,"B11","B12","C6","");
		setNewPosition($numPhaseFinale,"B13","B14","C7","");
		setNewPosition($numPhaseFinale,"B15","B16","C8","");
		setNewPosition($numPhaseFinale,"B17","B18","C9","");
		setNewPosition($numPhaseFinale,"B19","B20","C10","");
		setNewPosition($numPhaseFinale,"B21","B22","C11","");
		setNewPosition($numPhaseFinale,"B23","B24","C12","");
		setNewPosition($numPhaseFinale,"B25","B26","C13","");
		setNewPosition($numPhaseFinale,"B27","B28","C14","");
		setNewPosition($numPhaseFinale,"B29","B30","C15","");
		setNewPosition($numPhaseFinale,"B31","B32","C16","");

		setNewPosition($numPhaseFinale,"C1","C2","D1","");
		setNewPosition($numPhaseFinale,"C3","C4","D2","");
		setNewPosition($numPhaseFinale,"C5","C6","D3","");
		setNewPosition($numPhaseFinale,"C7","C8","D4","");
		setNewPosition($numPhaseFinale,"C9","C10","D5","");
		setNewPosition($numPhaseFinale,"C11","C12","D6","");
		setNewPosition($numPhaseFinale,"C13","C14","D7","");
		setNewPosition($numPhaseFinale,"C15","C16","D8","");
				
		setNewPosition($numPhaseFinale,"D1","D2","E1","");
		setNewPosition($numPhaseFinale,"D3","D4","E2","");
		setNewPosition($numPhaseFinale,"D5","D6","E3","");
		setNewPosition($numPhaseFinale,"D7","D8","E4","");
		
		setNewPosition($numPhaseFinale,"E1","E2","F1","PF1");
		setNewPosition($numPhaseFinale,"E3","E4","F2","PF2");

		
		setNewPosition($numPhaseFinale,"F1","F2","G1","");
		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");

		setNewPosition($numPhaseFinale,"CHA1","CHA2","CHB1","");
		setNewPosition($numPhaseFinale,"CHA3","CHA4","CHB2","");
		setNewPosition($numPhaseFinale,"CHA5","CHA6","CHB3","");
		setNewPosition($numPhaseFinale,"CHA7","CHA8","CHB4","");
		setNewPosition($numPhaseFinale,"CHA9","CHA10","CHB5","");
		setNewPosition($numPhaseFinale,"CHA11","CHA12","CHB6","");
		setNewPosition($numPhaseFinale,"CHA13","CHA14","CHB7","");
		setNewPosition($numPhaseFinale,"CHA15","CHA16","CHB8","");
		setNewPosition($numPhaseFinale,"CHA17","CHA18","CHB9","");
		setNewPosition($numPhaseFinale,"CHA19","CHA20","CHB10","");
		setNewPosition($numPhaseFinale,"CHA21","CHA22","CHB11","");
		setNewPosition($numPhaseFinale,"CHA23","CHA24","CHB12","");
		setNewPosition($numPhaseFinale,"CHA25","CHA26","CHB13","");
		setNewPosition($numPhaseFinale,"CHA27","CHA28","CHB14","");
		setNewPosition($numPhaseFinale,"CHA29","CHA30","CHB15","");
		setNewPosition($numPhaseFinale,"CHA31","CHA32","CHB16","");

		setNewPosition($numPhaseFinale,"CHB1","CHB2","CHC1","");
		setNewPosition($numPhaseFinale,"CHB3","CHB4","CHC2","");
		setNewPosition($numPhaseFinale,"CHB5","CHB6","CHC3","");
		setNewPosition($numPhaseFinale,"CHB7","CHB8","CHC4","");
		setNewPosition($numPhaseFinale,"CHB9","CHB10","CHC5","");
		setNewPosition($numPhaseFinale,"CHB11","CHB12","CHC6","");
		setNewPosition($numPhaseFinale,"CHB13","CHB14","CHC7","");
		setNewPosition($numPhaseFinale,"CHB15","CHB16","CHC8","");

		setNewPosition($numPhaseFinale,"CHC1","CHC2","CHD1","");
		setNewPosition($numPhaseFinale,"CHC3","CHC4","CHD2","");
		setNewPosition($numPhaseFinale,"CHC5","CHC6","CHD3","");
		setNewPosition($numPhaseFinale,"CHC7","CHC8","CHD4","");

		setNewPosition($numPhaseFinale,"CHD1","CHD2","CHE1","CHPF1");
		setNewPosition($numPhaseFinale,"CHD3","CHD4","CHE2","CHPF2");
		
		setNewPosition($numPhaseFinale,"CHE1","CHE2","CHF1","");

		setNewPosition($numPhaseFinale,"CHPF1","CHPF2","CHPFV1","");

	}

	if($nbEquipes == 128){
		setNewPosition($numPhaseFinale,"A1","A2","B1","CHA1");
		setNewPosition($numPhaseFinale,"A3","A4","B2","CHA2");
		setNewPosition($numPhaseFinale,"A5","A6","B3","CHA3");
		setNewPosition($numPhaseFinale,"A7","A8","B4","CHA4");
		setNewPosition($numPhaseFinale,"A9","A10","B5","CHA5");
		setNewPosition($numPhaseFinale,"A11","A12","B6","CHA6");
		setNewPosition($numPhaseFinale,"A13","A14","B7","CHA7");
		setNewPosition($numPhaseFinale,"A15","A16","B8","CHA8");
		setNewPosition($numPhaseFinale,"A17","A18","B9","CHA9");
		setNewPosition($numPhaseFinale,"A19","A20","B10","CHA10");
		setNewPosition($numPhaseFinale,"A21","A22","B11","CHA11");
		setNewPosition($numPhaseFinale,"A23","A24","B12","CHA12");
		setNewPosition($numPhaseFinale,"A25","A26","B13","CHA13");
		setNewPosition($numPhaseFinale,"A27","A28","B14","CHA14");
		setNewPosition($numPhaseFinale,"A29","A30","B15","CHA15");
		setNewPosition($numPhaseFinale,"A31","A32","B16","CHA16");
		setNewPosition($numPhaseFinale,"A33","A34","B17","CHA17");
		setNewPosition($numPhaseFinale,"A35","A36","B18","CHA18");
		setNewPosition($numPhaseFinale,"A37","A38","B19","CHA19");
		setNewPosition($numPhaseFinale,"A39","A40","B20","CHA20");
		setNewPosition($numPhaseFinale,"A41","A42","B21","CHA21");
		setNewPosition($numPhaseFinale,"A43","A44","B22","CHA22");
		setNewPosition($numPhaseFinale,"A45","A46","B23","CHA23");
		setNewPosition($numPhaseFinale,"A47","A48","B24","CHA24");
		setNewPosition($numPhaseFinale,"A49","A50","B25","CHA25");
		setNewPosition($numPhaseFinale,"A51","A52","B26","CHA26");
		setNewPosition($numPhaseFinale,"A53","A54","B27","CHA27");
		setNewPosition($numPhaseFinale,"A55","A56","B28","CHA28");
		setNewPosition($numPhaseFinale,"A57","A58","B29","CHA29");
		setNewPosition($numPhaseFinale,"A59","A60","B30","CHA30");
		setNewPosition($numPhaseFinale,"A61","A61","B31","CHA31");
		setNewPosition($numPhaseFinale,"A63","A64","B32","CHA32");
		setNewPosition($numPhaseFinale,"A65","A66","B33","CHA33");
		setNewPosition($numPhaseFinale,"A67","A68","B34","CHA34");
		setNewPosition($numPhaseFinale,"A69","A70","B35","CHA35");
		setNewPosition($numPhaseFinale,"A71","A72","B36","CHA36");
		setNewPosition($numPhaseFinale,"A73","A74","B37","CHA37");
		setNewPosition($numPhaseFinale,"A75","A76","B38","CHA38");
		setNewPosition($numPhaseFinale,"A77","A78","B39","CHA39");
		setNewPosition($numPhaseFinale,"A79","A80","B40","CHA40");
		setNewPosition($numPhaseFinale,"A81","A82","B41","CHA41");
		setNewPosition($numPhaseFinale,"A83","A84","B42","CHA42");
		setNewPosition($numPhaseFinale,"A85","A86","B43","CHA43");
		setNewPosition($numPhaseFinale,"A87","A88","B44","CHA44");
		setNewPosition($numPhaseFinale,"A89","A90","B45","CHA45");
		setNewPosition($numPhaseFinale,"A91","A92","B46","CHA46");
		setNewPosition($numPhaseFinale,"A93","A94","B47","CHA47");
		setNewPosition($numPhaseFinale,"A95","A96","B48","CHA48");
		setNewPosition($numPhaseFinale,"A97","A98","B49","CHA49");
		setNewPosition($numPhaseFinale,"A99","A100","B50","CHA50");
		setNewPosition($numPhaseFinale,"A101","A102","B51","CHA51");
		setNewPosition($numPhaseFinale,"A103","A104","B52","CHA52");
		setNewPosition($numPhaseFinale,"A105","A106","B53","CHA53");
		setNewPosition($numPhaseFinale,"A107","A108","B54","CHA54");
		setNewPosition($numPhaseFinale,"A109","A110","B55","CHA55");
		setNewPosition($numPhaseFinale,"A111","A112","B56","CHA56");
		setNewPosition($numPhaseFinale,"A113","A114","B57","CHA57");
		setNewPosition($numPhaseFinale,"A115","A116","B58","CHA58");
		setNewPosition($numPhaseFinale,"A117","A118","B59","CHA59");
		setNewPosition($numPhaseFinale,"A119","A120","B60","CHA60");
		setNewPosition($numPhaseFinale,"A121","A122","B61","CHA61");
		setNewPosition($numPhaseFinale,"A123","A124","B62","CHA62");
		setNewPosition($numPhaseFinale,"A125","A126","B63","CHA63");
		setNewPosition($numPhaseFinale,"A127","A128","B64","CHA64");


		setNewPosition($numPhaseFinale,"B1","B2","C1","");
		setNewPosition($numPhaseFinale,"B3","B4","C2","");
		setNewPosition($numPhaseFinale,"B5","B6","C3","");
		setNewPosition($numPhaseFinale,"B7","B8","C4","");
		setNewPosition($numPhaseFinale,"B9","B10","C5","");
		setNewPosition($numPhaseFinale,"B11","B12","C6","");
		setNewPosition($numPhaseFinale,"B13","B14","C7","");
		setNewPosition($numPhaseFinale,"B15","B16","C8","");
		setNewPosition($numPhaseFinale,"B17","B18","C9","");
		setNewPosition($numPhaseFinale,"B19","B20","C10","");
		setNewPosition($numPhaseFinale,"B21","B22","C11","");
		setNewPosition($numPhaseFinale,"B23","B24","C12","");
		setNewPosition($numPhaseFinale,"B25","B26","C13","");
		setNewPosition($numPhaseFinale,"B27","B28","C14","");
		setNewPosition($numPhaseFinale,"B29","B30","C15","");
		setNewPosition($numPhaseFinale,"B31","B32","C16","");
		setNewPosition($numPhaseFinale,"B33","B34","C17","");
		setNewPosition($numPhaseFinale,"B35","B36","C18","");
		setNewPosition($numPhaseFinale,"B37","B38","C19","");
		setNewPosition($numPhaseFinale,"B39","B40","C20","");
		setNewPosition($numPhaseFinale,"B41","B42","C21","");
		setNewPosition($numPhaseFinale,"B43","B44","C22","");
		setNewPosition($numPhaseFinale,"B45","B46","C23","");
		setNewPosition($numPhaseFinale,"B47","B48","C24","");
		setNewPosition($numPhaseFinale,"B49","B50","C25","");
		setNewPosition($numPhaseFinale,"B51","B52","C26","");
		setNewPosition($numPhaseFinale,"B53","B54","C27","");
		setNewPosition($numPhaseFinale,"B55","B56","C28","");
		setNewPosition($numPhaseFinale,"B57","B58","C29","");
		setNewPosition($numPhaseFinale,"B59","B60","C30","");
		setNewPosition($numPhaseFinale,"B61","B62","C31","");
		setNewPosition($numPhaseFinale,"B63","B64","C32","");

		setNewPosition($numPhaseFinale,"C1","C2","D1","");
		setNewPosition($numPhaseFinale,"C3","C4","D2","");
		setNewPosition($numPhaseFinale,"C5","C6","D3","");
		setNewPosition($numPhaseFinale,"C7","C8","D4","");
		setNewPosition($numPhaseFinale,"C9","C10","D5","");
		setNewPosition($numPhaseFinale,"C11","C12","D6","");
		setNewPosition($numPhaseFinale,"C13","C14","D7","");
		setNewPosition($numPhaseFinale,"C15","C16","D8","");
		setNewPosition($numPhaseFinale,"C17","C18","D9","");
		setNewPosition($numPhaseFinale,"C19","C20","D10","");
		setNewPosition($numPhaseFinale,"C21","C22","D11","");
		setNewPosition($numPhaseFinale,"C23","C24","D12","");
		setNewPosition($numPhaseFinale,"C25","C26","D13","");
		setNewPosition($numPhaseFinale,"C27","C28","D14","");
		setNewPosition($numPhaseFinale,"C29","C30","D15","");
		setNewPosition($numPhaseFinale,"C31","C32","D16","");
				
		setNewPosition($numPhaseFinale,"D1","D2","E1","");
		setNewPosition($numPhaseFinale,"D3","D4","E2","");
		setNewPosition($numPhaseFinale,"D5","D6","E3","");
		setNewPosition($numPhaseFinale,"D7","D8","E4","");
		setNewPosition($numPhaseFinale,"D9","D10","E5","");
		setNewPosition($numPhaseFinale,"D11","D12","E6","");
		setNewPosition($numPhaseFinale,"D13","D14","E7","");
		setNewPosition($numPhaseFinale,"D15","D16","E8","");

		setNewPosition($numPhaseFinale,"E1","E2","F1","");
		setNewPosition($numPhaseFinale,"E3","E4","F2","");
		setNewPosition($numPhaseFinale,"E5","E6","F3","");
		setNewPosition($numPhaseFinale,"E7","E8","F4","");
		
		setNewPosition($numPhaseFinale,"F1","F2","G1","PF1");
		setNewPosition($numPhaseFinale,"F3","F4","G2","PF2");

		
		setNewPosition($numPhaseFinale,"G1","G2","H1","");
		setNewPosition($numPhaseFinale,"PF1","PF2","PFV1","");

		setNewPosition($numPhaseFinale,"CHA1","CHA2","CHB1","");
		setNewPosition($numPhaseFinale,"CHA3","CHA4","CHB2","");
		setNewPosition($numPhaseFinale,"CHA5","CHA6","CHB3","");
		setNewPosition($numPhaseFinale,"CHA7","CHA8","CHB4","");
		setNewPosition($numPhaseFinale,"CHA9","CHA10","CHB5","");
		setNewPosition($numPhaseFinale,"CHA11","CHA12","CHB6","");
		setNewPosition($numPhaseFinale,"CHA13","CHA14","CHB7","");
		setNewPosition($numPhaseFinale,"CHA15","CHA16","CHB8","");
		setNewPosition($numPhaseFinale,"CHA17","CHA18","CHB9","");
		setNewPosition($numPhaseFinale,"CHA19","CHA20","CHB10","");
		setNewPosition($numPhaseFinale,"CHA21","CHA22","CHB11","");
		setNewPosition($numPhaseFinale,"CHA23","CHA24","CHB12","");
		setNewPosition($numPhaseFinale,"CHA25","CHA26","CHB13","");
		setNewPosition($numPhaseFinale,"CHA27","CHA28","CHB14","");
		setNewPosition($numPhaseFinale,"CHA29","CHA30","CHB15","");
		setNewPosition($numPhaseFinale,"CHA31","CHA32","CHB16","");
		setNewPosition($numPhaseFinale,"CHA33","CHA34","CHB17","");
		setNewPosition($numPhaseFinale,"CHA35","CHA36","CHB18","");
		setNewPosition($numPhaseFinale,"CHA37","CHA38","CHB19","");
		setNewPosition($numPhaseFinale,"CHA39","CHA40","CHB20","");
		setNewPosition($numPhaseFinale,"CHA41","CHA42","CHB21","");
		setNewPosition($numPhaseFinale,"CHA43","CHA44","CHB22","");
		setNewPosition($numPhaseFinale,"CHA45","CHA46","CHB23","");
		setNewPosition($numPhaseFinale,"CHA47","CHA48","CHB24","");
		setNewPosition($numPhaseFinale,"CHA49","CHA50","CHB25","");
		setNewPosition($numPhaseFinale,"CHA51","CHA52","CHB26","");
		setNewPosition($numPhaseFinale,"CHA53","CHA54","CHB27","");
		setNewPosition($numPhaseFinale,"CHA55","CHA56","CHB28","");
		setNewPosition($numPhaseFinale,"CHA57","CHA58","CHB29","");
		setNewPosition($numPhaseFinale,"CHA59","CHA60","CHB30","");
		setNewPosition($numPhaseFinale,"CHA61","CHA62","CHB31","");
		setNewPosition($numPhaseFinale,"CHA63","CHA64","CHB32","");

		setNewPosition($numPhaseFinale,"CHB1","CHB2","CHC1","");
		setNewPosition($numPhaseFinale,"CHB3","CHB4","CHC2","");
		setNewPosition($numPhaseFinale,"CHB5","CHB6","CHC3","");
		setNewPosition($numPhaseFinale,"CHB7","CHB8","CHC4","");
		setNewPosition($numPhaseFinale,"CHB9","CHB10","CHC5","");
		setNewPosition($numPhaseFinale,"CHB11","CHB12","CHC6","");
		setNewPosition($numPhaseFinale,"CHB13","CHB14","CHC7","");
		setNewPosition($numPhaseFinale,"CHB15","CHB16","CHC8","");
		setNewPosition($numPhaseFinale,"CHB17","CHB18","CHC9","");
		setNewPosition($numPhaseFinale,"CHB19","CHB20","CHC10","");
		setNewPosition($numPhaseFinale,"CHB21","CHB22","CHC11","");
		setNewPosition($numPhaseFinale,"CHB23","CHB24","CHC12","");
		setNewPosition($numPhaseFinale,"CHB25","CHB26","CHC13","");
		setNewPosition($numPhaseFinale,"CHB27","CHB28","CHC14","");
		setNewPosition($numPhaseFinale,"CHB29","CHB30","CHC15","");
		setNewPosition($numPhaseFinale,"CHB31","CHB32","CHC16","");

		setNewPosition($numPhaseFinale,"CHC1","CHC2","CHD1","");
		setNewPosition($numPhaseFinale,"CHC3","CHC4","CHD2","");
		setNewPosition($numPhaseFinale,"CHC5","CHC6","CHD3","");
		setNewPosition($numPhaseFinale,"CHC7","CHC8","CHD4","");
		setNewPosition($numPhaseFinale,"CHC9","CHC10","CHD5","");
		setNewPosition($numPhaseFinale,"CHC11","CHC12","CHD6","");
		setNewPosition($numPhaseFinale,"CHC13","CHC14","CHD7","");
		setNewPosition($numPhaseFinale,"CHC15","CHC16","CHD8","");

		setNewPosition($numPhaseFinale,"CHD1","CHD2","CHE1","");
		setNewPosition($numPhaseFinale,"CHD3","CHD4","CHE2","");
		setNewPosition($numPhaseFinale,"CHD5","CHD6","CHE3","");
		setNewPosition($numPhaseFinale,"CHD7","CHD8","CHE4","");
		

		setNewPosition($numPhaseFinale,"CHE1","CHE2","CHF1","CHPF1");
		setNewPosition($numPhaseFinale,"CHE3","CHE4","CHF2","CHPF2");
		
		setNewPosition($numPhaseFinale,"CHF1","CHF2","CHG1","");

		setNewPosition($numPhaseFinale,"CHPF1","CHPF2","CHPFV1","");

	}




}

function calculClassementPF($idTournoi,$numPhaseFinale, $nbEquipes){
	global $db;
	$infosTournoi = infosTournoi($idTournoi);
	$ptsFinales = $infosTournoi['pts_finales'];
	$ptsPetitesFinales = $infosTournoi['pts_petitefinales'];
	$ptsPhasesFinales = $infosTournoi['pts_phasesfinales'];
	$typePhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
	$typePhaseFinale = $typePhaseFinale['type_phasefinale'];



// CLASSEMENT ARBRE //////////////////////////////////////////////
	if($typePhaseFinale == 'arbre'){		
	
		switch ($nbEquipes) {
			case 4:
				$lastLevel = "C";
				break;
			case 8:
				$lastLevel = "D";
				break;
			case 16:
				$lastLevel = "E";
				$lastLevelCH = "CHD";
				break;
			case 32:
				$lastLevel = "F";
				$lastLevelCH = "CHE";
				break;
			case 64:
				$lastLevel = "G";
				$lastLevelCH = "CHF";
				break;
			case 128:
				$lastLevel = "H";
				$lastLevelCH = "CHG";
				break;
		}

		$place1 = '';
				$place2 = '';
				$place3 = '';
				$place4 = '';
				$place5 = '';
				$place6 = '';
				$place7 = '';
				$place8 = '';
				$place14 = '';
				$place16 = '';
		// Vainqueur
		$resultatsVainqueur = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "'. $lastLevel .'1"');
		while ($rowVainqueur = $resultatsVainqueur->fetchArray(1)) {
			$place1= $rowVainqueur['num_equipe'];
		}
		
		// 2ème Place (finaliste perdant)
		$previousLevel = chr(ord($lastLevel) - 1);
		$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2")');
		while ($row = $resultats->fetchArray(1)) {
			if($row['num_equipe'] != $place1) {
				$place2 = $row['num_equipe'];
			}
		}

		// 3ème Place
		$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "PFV1"');
		while ($row = $resultats->fetchArray(1)) {
			$place3= $row['num_equipe'];
		}
		// 4ème Place
		$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "PF1" OR position_label = "PF2")');
		while ($row = $resultats->fetchArray(1)) {
			if($row['num_equipe'] != $place3) {
				$place4 = $row['num_equipe'];
			}
		}

		
		if($place1 != ''){
			$db->exec("UPDATE classements SET class_numequipe = '$place1' WHERE class_place == '1' AND class_numphase == '". $numPhaseFinale ."'");
		}
		if($place2 != ''){
			$db->exec("UPDATE classements SET class_numequipe = '$place2' WHERE class_place == '2' AND class_numphase == '". $numPhaseFinale ."'");
		}
		if($place3 != ''){
			$db->exec("UPDATE classements SET class_numequipe = '$place3' WHERE class_place == '3' AND class_numphase == '". $numPhaseFinale ."'");
		}
		if($place4 != ''){
			$db->exec("UPDATE classements SET class_numequipe = '$place4' WHERE class_place == '4' AND class_numphase == '". $numPhaseFinale ."'");
		}
		
		// Matchs de classement

		if($nbEquipes == 8 || $nbEquipes == 16){
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "CLC1"');
			while ($row = $resultats->fetchArray(1)) {
					$place5 = $row['num_equipe'];
			}
		
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "CLB1" OR position_label = "CLB2")');
			while ($row = $resultats->fetchArray(1)) {
				if($row['num_equipe'] != $place5) {	
					$place6 = $row['num_equipe'];
				}
			}

			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "CLY1"');
			while ($row = $resultats->fetchArray(1)) {
					$place7 = $row['num_equipe'];
			}
		
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "CLZ1" OR position_label = "CLZ2")');
			while ($row = $resultats->fetchArray(1)) {
				if($row['num_equipe'] != $place7) {	
					$place8 = $row['num_equipe'];
				}
			}

			
			if($place5 != ''){
				$db->exec("UPDATE classements SET class_numequipe = '$place5' WHERE class_place == '5' AND class_numphase == '". $numPhaseFinale ."'");
			}
			if($place6 != ''){
				$db->exec("UPDATE classements SET class_numequipe = '$place6' WHERE class_place == '6' AND class_numphase == '". $numPhaseFinale ."'");
			}
			if($place7 != ''){
				$db->exec("UPDATE classements SET class_numequipe = '$place7' WHERE class_place == '7' AND class_numphase == '". $numPhaseFinale ."'");
			}
			if($place8 != ''){
				$db->exec("UPDATE classements SET class_numequipe = '$place8' WHERE class_place == '8' AND class_numphase == '". $numPhaseFinale ."'");
			}

		
		}

		if($nbEquipes > 16){

			// Perdants Quarts de finales places 5 à 8
			$previousLevel = chr(ord($lastLevel) - 3);

			$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8")';

			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
			$i = 5;
			while ($row = $resultats->fetchArray(1)) {
				
				$a = "place".$i;	
				$$a = $row['num_equipe'];
				if($$a != ''){
					$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
					//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
				}
				$i++;
			}


			// Perdants 8ème de finales places 9 à 16
			$previousLevel = chr(ord($lastLevel) - 4);

			$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16")';

			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
			$i = 9;
			while ($row = $resultats->fetchArray(1)) {
				
				$a = "place".$i;	
				$$a = $row['num_equipe'];
				if($$a != ''){
					$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
					//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
				}
				$i++;
			}

		}

		if($nbEquipes > 32){
			// Perdants 16ème de finales places 17 à 32
			$previousLevel = chr(ord($lastLevel) - 5);

			$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16" OR position_label = "'. $previousLevel .'17" OR position_label = "'. $previousLevel .'18" OR position_label = "'. $previousLevel .'19" OR position_label = "'. $previousLevel .'20" OR position_label = "'. $previousLevel .'21" OR position_label = "'. $previousLevel .'22" OR position_label = "'. $previousLevel .'23" OR position_label = "'. $previousLevel .'24" OR position_label = "'. $previousLevel .'25" OR position_label = "'. $previousLevel .'26" OR position_label = "'. $previousLevel .'27" OR position_label = "'. $previousLevel .'28" OR position_label = "'. $previousLevel .'29" OR position_label = "'. $previousLevel .'30" OR position_label = "'. $previousLevel .'31" OR position_label = "'. $previousLevel .'32")';

			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
			$i = 17;
			while ($row = $resultats->fetchArray(1)) {
				
				$a = "place".$i;	
				$$a = $row['num_equipe'];
				if($$a != ''){
					$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
					//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
				}
				$i++;
			}

		}

		if($nbEquipes > 64){
			// Perdants 32ème de finales places 33 à 64
			$previousLevel = chr(ord($lastLevel) - 6);

			$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16" OR position_label = "'. $previousLevel .'17" OR position_label = "'. $previousLevel .'18" OR position_label = "'. $previousLevel .'19" OR position_label = "'. $previousLevel .'20" OR position_label = "'. $previousLevel .'21" OR position_label = "'. $previousLevel .'22" OR position_label = "'. $previousLevel .'23" OR position_label = "'. $previousLevel .'24" OR position_label = "'. $previousLevel .'25" OR position_label = "'. $previousLevel .'26" OR position_label = "'. $previousLevel .'27" OR position_label = "'. $previousLevel .'28" OR position_label = "'. $previousLevel .'29" OR position_label = "'. $previousLevel .'30" OR position_label = "'. $previousLevel .'31" OR position_label = "'. $previousLevel .'32" OR position_label = "'. $previousLevel .'33" OR position_label = "'. $previousLevel .'34" OR position_label = "'. $previousLevel .'35" OR position_label = "'. $previousLevel .'36" OR position_label = "'. $previousLevel .'37" OR position_label = "'. $previousLevel .'38" OR position_label = "'. $previousLevel .'39" OR position_label = "'. $previousLevel .'40" OR position_label = "'. $previousLevel .'41" OR position_label = "'. $previousLevel .'42" OR position_label = "'. $previousLevel .'43" OR position_label = "'. $previousLevel .'44" OR position_label = "'. $previousLevel .'45" OR position_label = "'. $previousLevel .'46" OR position_label = "'. $previousLevel .'47" OR position_label = "'. $previousLevel .'48" OR position_label = "'. $previousLevel .'49" OR position_label = "'. $previousLevel .'50" OR position_label = "'. $previousLevel .'51" OR position_label = "'. $previousLevel .'52" OR position_label = "'. $previousLevel .'53" OR position_label = "'. $previousLevel .'54" OR position_label = "'. $previousLevel .'55" OR position_label = "'. $previousLevel .'56" OR position_label = "'. $previousLevel .'57" OR position_label = "'. $previousLevel .'58" OR position_label = "'. $previousLevel .'59" OR position_label = "'. $previousLevel .'60" OR position_label = "'. $previousLevel .'61" OR position_label = "'. $previousLevel .'62" OR position_label = "'. $previousLevel .'63" OR position_label = "'. $previousLevel .'64")';

			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
			$i = 33;
			while ($row = $resultats->fetchArray(1)) {
				
				$a = "place".$i;	
				$$a = $row['num_equipe'];
				if($$a != ''){
					$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
					//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
				}
				$i++;
			}

		}



		// Challenge

		if($nbEquipes > 8){
			$lastLevel = chr(ord($lastLevel) - 1);
			$previousLevel = "CH".$lastLevel;

			// Vainqueur
			$resultatsVainqueur = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "'. $previousLevel .'1"');
			while ($rowVainqueur = $resultatsVainqueur->fetchArray(1)) {
				switch ($nbEquipes){
					case 16:
						$place9 = $rowVainqueur['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $rowVainqueur['num_equipe'] ."' WHERE class_place == '9' AND class_numphase == '". $numPhaseFinale ."'");
						break;	
					case 32:
						$place17 = $rowVainqueur['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $rowVainqueur['num_equipe'] ."' WHERE class_place == '17' AND class_numphase == '". $numPhaseFinale ."'");
						break;	
					case 64:
						$place33 = $rowVainqueur['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $rowVainqueur['num_equipe'] ."' WHERE class_place == '33' AND class_numphase == '". $numPhaseFinale ."'");
						break;	
					case 128:
						$place65 = $rowVainqueur['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $rowVainqueur['num_equipe'] ."' WHERE class_place == '65' AND class_numphase == '". $numPhaseFinale ."'");
						break;	
				
				}
			}
		
			// 2ème Place (finaliste perdant)
			$previousLevel = chr(ord($lastLevel) - 1);
			$previousLevel = "CH".$previousLevel;
			
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2")');
			while ($row = $resultats->fetchArray(1)) {
				
				switch ($nbEquipes){
					case 16:
						if($row['num_equipe'] != $place9) {	
							$place10 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '10' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;	
					case 32:
						if($row['num_equipe'] != $place17) {	
							$place18 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '18' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;
					case 64:
						if($row['num_equipe'] != $place33) {	
							$place34 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '34' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;
					case 128:
						if($row['num_equipe'] != $place65) {	
							$place66 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '66' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;		
				}
			}
		

			// 3ème Place
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "CHPFV1"');
			while ($row = $resultats->fetchArray(1)) {
				switch ($nbEquipes){
					case 16:
						$place11= $row['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '11' AND class_numphase == '". $numPhaseFinale ."'");
						break;
					case 32:
						$place19= $row['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '19' AND class_numphase == '". $numPhaseFinale ."'");
						break;
					case 64:
						$place35= $row['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '35' AND class_numphase == '". $numPhaseFinale ."'");
						break;
					case 128:
						$place67= $row['num_equipe'];
						$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '67' AND class_numphase == '". $numPhaseFinale ."'");
						break;
				}
			}


			// 4ème Place
			$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "CHPF1" OR position_label = "CHPF2")');
			while ($row = $resultats->fetchArray(1)) {
				
				switch ($nbEquipes){
					case 16:
						if($row['num_equipe'] != $place11) {
							$place12 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '12' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;
					case 32:
						if($row['num_equipe'] != $place19) {
							$place20 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '20' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;
					case 64:
						if($row['num_equipe'] != $place35) {
							$place36 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '36' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;
					case 128:
						if($row['num_equipe'] != $place67) {
							$place68 = $row['num_equipe'];
							$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '68' AND class_numphase == '". $numPhaseFinale ."'");
						}
						break;		
				}
			}

			// Matchs de classement

			if($nbEquipes == 16){
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "CHCLC1"');
				while ($row = $resultats->fetchArray(1)) {
						$place13 = $row['num_equipe'];
				}
			
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "CHCLB1" OR position_label = "CHCLB2")');
				while ($row = $resultats->fetchArray(1)) {
					if($row['num_equipe'] != $place13) {	
						$place14 = $row['num_equipe'];
					}
				}

				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND position_label = "CHCLY1"');
				while ($row = $resultats->fetchArray(1)) {
						$place15 = $row['num_equipe'];
				}
			
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND (position_label = "CHCLZ1" OR position_label = "CHCLZ2")');
				while ($row = $resultats->fetchArray(1)) {
					if($row['num_equipe'] != $place15) {	
						$place16 = $row['num_equipe'];
					}
				}

				
				if($place13 != ''){
					$db->exec("UPDATE classements SET class_numequipe = '$place13' WHERE class_place == '13' AND class_numphase == '". $numPhaseFinale ."'");
				}
				if($place14 != ''){
					$db->exec("UPDATE classements SET class_numequipe = '$place14' WHERE class_place == '14' AND class_numphase == '". $numPhaseFinale ."'");
				}
				if($place15 != ''){
					$db->exec("UPDATE classements SET class_numequipe = '$place15' WHERE class_place == '15' AND class_numphase == '". $numPhaseFinale ."'");
				}
				if($place16 != ''){
					$db->exec("UPDATE classements SET class_numequipe = '$place16' WHERE class_place == '16' AND class_numphase == '". $numPhaseFinale ."'");
				}

			
			}

			if($nbEquipes > 16){

				// Perdants Quarts de finales 
				$previousLevel = chr(ord($lastLevel) - 3);

				$previousLevel = "CH".$previousLevel;
				
		
				$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8")';
		
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
				
				switch($nbEquipes){
					case 32:
						$i = 21;
						break;
					case 64:
						$i = 37;
						break;
					case 128:
						$i = 69;
						break;
				}
				
				while ($row = $resultats->fetchArray(1)) {
					
					$a = "place".$i;	
					$$a = $row['num_equipe'];
					if($$a != ''){
						$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
						//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
					}
					$i++;
				}
		
		
				// Perdants 8ème de finales 
				$previousLevel = chr(ord($lastLevel) - 4);
				$previousLevel = "CH".$previousLevel;
				$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16")';
		
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC, score_precedent ASC');
				
				switch($nbEquipes){
					case 32:
						$i = 25;
						break;
					case 64:
						$i = 41;
						break;
					case 128:
						$i = 73;
						break;
				}

				while ($row = $resultats->fetchArray(1)) {
					
					$a = "place".$i;	
					$$a = $row['num_equipe'];
					if($$a != ''){
						$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
						//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
					}
					$i++;
				}
		
			}

			if($nbEquipes > 32){

				// Perdants 16ème de finales 
				$previousLevel = chr(ord($lastLevel) - 5);
				$previousLevel = "CH".$previousLevel;
				$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16")';
		
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
				
				switch($nbEquipes){
					case 64:
						$i = 49;
						break;
					case 128:
						$i = 81;
						break;
				}

				while ($row = $resultats->fetchArray(1)) {
					
					$a = "place".$i;	
					$$a = $row['num_equipe'];
					if($$a != ''){
						$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
						//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
					}
					$i++;
				}
		
			}


			if($nbEquipes > 64){

				// Perdants 32ème de finales 
				$previousLevel = chr(ord($lastLevel) - 6);
				$previousLevel = "CH".$previousLevel;

				$condition = '(position_label = "'. $previousLevel .'1" OR position_label = "'. $previousLevel .'2" OR position_label = "'. $previousLevel .'3" OR position_label = "'. $previousLevel .'4" OR position_label = "'. $previousLevel .'5" OR position_label = "'. $previousLevel .'6" OR position_label = "'. $previousLevel .'7" OR position_label = "'. $previousLevel .'8" OR position_label = "'. $previousLevel .'9" OR position_label = "'. $previousLevel .'10" OR position_label = "'. $previousLevel .'11" OR position_label = "'. $previousLevel .'12" OR position_label = "'. $previousLevel .'13" OR position_label = "'. $previousLevel .'14" OR position_label = "'. $previousLevel .'15" OR position_label = "'. $previousLevel .'16" OR position_label = "'. $previousLevel .'17" OR position_label = "'. $previousLevel .'18" OR position_label = "'. $previousLevel .'19" OR position_label = "'. $previousLevel .'20" OR position_label = "'. $previousLevel .'21" OR position_label = "'. $previousLevel .'22" OR position_label = "'. $previousLevel .'23" OR position_label = "'. $previousLevel .'24" OR position_label = "'. $previousLevel .'25" OR position_label = "'. $previousLevel .'26" OR position_label = "'. $previousLevel .'27" OR position_label = "'. $previousLevel .'28" OR position_label = "'. $previousLevel .'29" OR position_label = "'. $previousLevel .'30" OR position_label = "'. $previousLevel .'31" OR position_label = "'. $previousLevel .'32" OR position_label = "'. $previousLevel .'33" OR position_label = "'. $previousLevel .'34" OR position_label = "'. $previousLevel .'35" OR position_label = "'. $previousLevel .'36" OR position_label = "'. $previousLevel .'37" OR position_label = "'. $previousLevel .'38" OR position_label = "'. $previousLevel .'39" OR position_label = "'. $previousLevel .'40" OR position_label = "'. $previousLevel .'41" OR position_label = "'. $previousLevel .'42" OR position_label = "'. $previousLevel .'43" OR position_label = "'. $previousLevel .'44" OR position_label = "'. $previousLevel .'45" OR position_label = "'. $previousLevel .'46" OR position_label = "'. $previousLevel .'47" OR position_label = "'. $previousLevel .'48" OR position_label = "'. $previousLevel .'49" OR position_label = "'. $previousLevel .'50" OR position_label = "'. $previousLevel .'51" OR position_label = "'. $previousLevel .'52" OR position_label = "'. $previousLevel .'53" OR position_label = "'. $previousLevel .'54" OR position_label = "'. $previousLevel .'55" OR position_label = "'. $previousLevel .'56" OR position_label = "'. $previousLevel .'57" OR position_label = "'. $previousLevel .'58" OR position_label = "'. $previousLevel .'59" OR position_label = "'. $previousLevel .'60" OR position_label = "'. $previousLevel .'61" OR position_label = "'. $previousLevel .'62" OR position_label = "'. $previousLevel .'63" OR position_label = "'. $previousLevel .'64")';
				$resultats = $db->query('SELECT num_equipe FROM positions_phasesfinales WHERE num_phasefinale = '. $numPhaseFinale .' AND '. $condition .' AND position_score != '. $ptsPhasesFinales. ' ORDER BY position_score DESC, score_precedent ASC');
				
				switch($nbEquipes){
					case 128:
						$i = 97;
						break;
				}

				while ($row = $resultats->fetchArray(1)) {
					
					$a = "place".$i;	
					$$a = $row['num_equipe'];
					if($$a != ''){
						$db->exec("UPDATE classements SET class_numequipe = '". $$a ."' WHERE class_place == '". $i ."' AND class_numphase == '". $numPhaseFinale ."'");
						//$classement .= "<tr><td>". $i ."</td><td>" .$$a ."</td></tr>";
					}
					$i++;
				}
		
			}

		}
	}
///FIN CLASSEMENT ARBRE ////////////////////////////////////////////////////////

// CLASSEMENT POULE ///////////////////////////////////////////////////////////
	if($typePhaseFinale == 'poule'){
		
			$classementPoulePF = classementPoulePF($idTournoi);
			$placePoulePF = 1;
			foreach($classementPoulePF as $row){
				$db->exec("UPDATE classements SET class_numequipe = '". $row['num_equipe'] ."' WHERE class_place == '". $placePoulePF ."' AND class_numphase == '". $numPhaseFinale ."'");
				$placePoulePF++;
			}
	}

}

function getEquipeName($numEquipe){
	global $db;
	$resultats = $db->query('SELECT nom_equipe FROM equipes WHERE num_equipe = '. $numEquipe .'');
	while ($row = $resultats->fetchArray(1)) {
		$nomEquipe = $row['nom_equipe'];
	}
	return $nomEquipe;
}

function tiragePhaseQualif($nbEquipes, $numPhase)
{
	if ($nbEquipes&1){
	$nbEquipes = $nbEquipes + 1;
		$isPair = false;
	}else{
		$isPair = true;
	}

	$tableauEquipes = range(1,$nbEquipes);

	//melange du tableau
	$melTableauEquipes = $tableauEquipes;
	shuffle($melTableauEquipes);


	//Division en deux parties le tableau mélangé
	$premierTableauEquipes = array_slice($melTableauEquipes, 0, ($nbEquipes / 2)); 
	$secondTableauEquipes = array_slice($melTableauEquipes,($nbEquipes / 2), $nbEquipes - 1); 

	//Constituer la proposition de matchs

	$nbMatch = $nbEquipes / 2;
	$numMatch = 1;
	$indexTable = 0;
	unset($matchs);
	while($numMatch < $nbMatch + 1){
			
		$equipe1 = $premierTableauEquipes[$indexTable];
		$equipe2 = $secondTableauEquipes[$indexTable];
		if($equipe1 == $nbEquipes && $isPair == false){
			$equipe1 = 'EXEMPT';
		}
		if($equipe2 == $nbEquipes && $isPair == false){
			$equipe2 = 'EXEMPT';
		}
		
		$matchs[$numMatch] = array('num_phase'=>$numPhase, 'equipe1'=>$equipe1, 'equipe2'=> $equipe2);
		$numMatch = $numMatch + 1;
		$indexTable = $indexTable + 1;
	}
	
	return $matchs;
}

function tiragePoulePF($nbEquipes, $numPhaseFinale, $numPhase)
{
	global $db;
	//récupération des équipes qualifiées
	$resultats = $db->query('SELECT num_equipe FROM equipes_poule_pf WHERE num_phasefinale = '. $numPhaseFinale .'');
	$tableauEquipes = array();
	while ($row = $resultats->fetchArray(1)) {
		$tableauEquipes[] = $row['num_equipe'];
	}

	$nbEquipes = count($tableauEquipes);
	if ($nbEquipes&1){
	$nbEquipes = $nbEquipes + 1;
		$isPair = false;
	}else{
		$isPair = true;
	}

	//melange du tableau
	$melTableauEquipes = $tableauEquipes;
	shuffle($melTableauEquipes);

	if($isPair == false){
		$melTableauEquipes[] = 'EXEMPT';
	}


	//Division en deux parties le tableau mélangé
	$premierTableauEquipes = array_slice($melTableauEquipes, 0, ($nbEquipes / 2)); 
	$secondTableauEquipes = array_slice($melTableauEquipes,($nbEquipes / 2), $nbEquipes - 1); 

	//Constituer la proposition de matchs

	$nbMatch = $nbEquipes / 2;
	$numMatch = 1;
	$indexTable = 0;
	unset($matchs);
	while($numMatch < $nbMatch + 1){
			
		$equipe1 = $premierTableauEquipes[$indexTable];
		$equipe2 = $secondTableauEquipes[$indexTable];
		
		$matchs[$numMatch] = array('num_phase'=>$numPhase, 'equipe1'=>$equipe1, 'equipe2'=> $equipe2);
		$numMatch = $numMatch + 1;
		$indexTable = $indexTable + 1;
	}
	
	return $matchs;
}

//////////////////// DEBUT FONCTIONS TIRAGES PHASE FINALE /////////////////////////////////

function tiragePhaseFinale($idTournoi, $nbEquipes, $numPhase)
{
    global $db;
    $recupEquipes = classementQualifs($idTournoi);
    $tableauEquipes = array();
    $countEquipe = 0;
    $infosTournoi = infosTournoi($idTournoi);
	$infosPhaseFinale = infosPhaseFinale($numPhase);
    
    // Récupérer exactement le nombre d'équipes nécessaires selon leur classement
    foreach($recupEquipes as $row){
        if($row['dispo_phasesfinales'] == '1' && $countEquipe < $nbEquipes){
            $numEquipe = $row['num_equipe'];
            $tableauEquipes[] = $numEquipe;
            $db->exec("UPDATE equipes SET dispo_phasesfinales = '0' WHERE num_equipe == '$numEquipe'");
            $countEquipe++;
        }
    }

    // Compléter avec des équipes "vides" si nécessaire (exempts)
    while(count($tableauEquipes) < $nbEquipes){
        $tableauEquipes[] = '';
    }

    genererArbrePhaseFinale($numPhase, $nbEquipes);
    
    if($infosTournoi['type_phasesfinales'] == "tetedeserie"){
        // Système de bracket optimal avec seeding professionnel
        // Garantit que les meilleures équipes ne se rencontrent qu'aux stades les plus avancés
        $matchs = genererBracketAvecSeedingOptimal($tableauEquipes, $nbEquipes, $numPhase);
    } else {
        // Tirage aléatoire
        $matchs = genererBracketAleatoire($tableauEquipes, $nbEquipes, $numPhase);
    }
    
    return $matchs;
}

function tiragePhaseFinalePoule($idTournoi, $nbEquipes, $numPhaseFinale)
{
    global $db;
	$idPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
	$idPhaseFinale = $idPhaseFinale['id_phasefinale'];
    $recupEquipes = classementQualifs($idTournoi);
    $tableauEquipes = array();
    $countEquipe = 0;
    $infosTournoi = infosTournoi($idTournoi);
	$infosPhaseFinale = infosPhaseFinale($numPhaseFinale);
    
    // Récupérer exactement le nombre d'équipes nécessaires selon leur classement
    foreach($recupEquipes as $row){
        if($row['dispo_phasesfinales'] == '1' && $countEquipe < $nbEquipes){
            $numEquipe = $row['num_equipe'];
            $tableauEquipes[] = $numEquipe;
            $db->exec("UPDATE equipes SET dispo_phasesfinales = '0' WHERE num_equipe == '$numEquipe'");
            $countEquipe++;
        }
    }

    // Compléter avec des équipes "vides" si nécessaire (exempts)
    while(count($tableauEquipes) < $nbEquipes){
        $tableauEquipes[] = '';
    }

	$previousInfosPhaseFinale = infosPhaseFinaleNum($numPhaseFinale -1);
	$previousNbEquipes = $previousInfosPhaseFinale['nb_equipes'];

	switch ($previousNbEquipes){
		case 4:
			$nbTourMax = 2;
			break;
		case 8:
			$nbTourMax = 3;
			break;
		case 16:
			$nbTourMax = 4;
			break;
		case 32:
			$nbTourMax = 5;
			break;
		case 64:
			$nbTourMax = 6;
			break;
		case 128:	
			$nbTourMax = 7;
			break;
	}

	switch ($nbEquipes){
		case 1:
			$nbTour = 1;
			break;
		case 2:
			$nbTour = 1;
			break;
		case 3:
			$nbTour = 3;
			break;
		case 4:
			$nbTour = 3;
			break;
		case 5:
			$nbTour = 5;
			break;
		case 6:
			$nbTour = 5;
			break;
		case 7:
			$nbTour = 7;
			break;
		case 8:	
			$nbTour = 7;
			break;
		case 9:
			$nbTour = 9;
			break;
		case 10:
			$nbTour = 9;
			break;
		case 11:
			$nbTour = 11;
			break;
		case 12:
			$nbTour = 11;
			break;
		case 13:
			$nbTour = 13;
			break;
		case 14:
			$nbTour = 13;
			break;
		case 15:
			$nbTour = 15;
			break;
		case 16:	
			$nbTour = 15;
			break;
	}

	if($nbTour > $nbTourMax){
		$nbTour = $nbTourMax;
	}

	//////// creation equipes_poule_pf ///////////
	// Vérifier si la table existe déjà
	// La table n'existe pas, on l'importe
	// Exécuter le script SQL pour créer la table
	$sql = "
	PRAGMA foreign_keys = off;
	BEGIN TRANSACTION;
	-- Tableau : equipes_poule_pf
	CREATE TABLE IF NOT EXISTS equipes_poule_pf (
		id_equipe_poule_pf INTEGER PRIMARY KEY AUTOINCREMENT, 
		num_equipe NUMERIC, 
		num_phasefinale NUMERIC REFERENCES phases_finales (num_phasefinale) ON DELETE CASCADE, 
		nb_victoires NUMERIC,
		pts_pour NUMERIC,
		pts_contre NUMERIC,
		pts_diff NUMERIC
	);
	COMMIT TRANSACTION;
	PRAGMA foreign_keys = on;
	";
	
	$db->exec($sql);

	//genererPoulePhaseFinale($numPhase, $nbEquipes, $nbTour, $nbTour);
	foreach($tableauEquipes as $equipe){
		$db->exec("INSERT INTO equipes_poule_pf (num_equipe, num_phasefinale, nb_victoire, pts_pour, pts_contre, pts_diff) VALUES ('$equipe', '$numPhaseFinale', '0', '0', '0', '0')");
	}
	
	// Générer le premier tour de la poule
	$numPhase = 1;
	TOUR:
	
	$resultats = $db->query('SELECT combinaison FROM combi_phasesfinales WHERE id_tournoi == '.$idTournoi.'');
	while ($row = $resultats->fetchArray(1)) {
		$listeCombinaisons[] = $row['combinaison'];
	}
	
	$generation = 1;
	TIRAGE:
	unset($matchs);	
	if ($generation > 100000){
		echo "<span style=\"color: red; vertical-align: text-bottom\" class=\"uk-icon\" uk-icon=\"icon: close\"></span> Aucune combinaison trouvée ou possibles. Veuillez réessayer (plusieurs tentatives peuvent être effectuées avant de trouver une bonne combinaison).<br /><br /><a href=\"index.php?idtournoi=". $idTournoi ."&page=qualifs\"><button class=\"uk-button uk-button-primary\">Retour</button></a>";
		die();
	}
	$tirage = tiragePoulePF($nbEquipes, $numPhaseFinale, $numPhase);
	foreach ($tirage as $row){
			$equipe1 = $row['equipe1'];
			$equipe2 = $row['equipe2'];
			$combi1 = "". $equipe1 ."-". $equipe2 ."";
			$combi2 = "". $equipe2 ."-". $equipe1 ."";
			
			
			if ($numPhase != 1){
				if(in_array($combi1, $listeCombinaisons) || in_array($combi2, $listeCombinaisons)){
					$generation = $generation + 1;
					goto TIRAGE;
				}
			}
			
			$matchs[] = array("equipe1" => $equipe1, "equipe2" => $equipe2, "combi1" => $combi1, "combi2" => $combi2);
	}
	

	foreach ($matchs as $row){
		$db->exec("INSERT INTO matchs_phasesfinales (id_tournoi, id_phasefinale, num_phasefinale, equipe1, equipe2, tour_poule) VALUES ('". $idTournoi ."','". $idPhaseFinale ."','". $numPhaseFinale ."','". $row['equipe1'] ."','". $row['equipe2'] ."', '". $numPhase ."')");
		$db->exec("INSERT INTO combi_phasesfinales (id_tournoi, id_phasefinale, num_phase, combinaison) VALUES ('". $idTournoi ."','". $idPhaseFinale ."','". $numPhase ."','". $row['combi1'] ."')");
		$db->exec("INSERT INTO combi_phasesfinales (id_tournoi, id_phasefinale, num_phase, combinaison) VALUES ('". $idTournoi ."','". $idPhaseFinale ."','". $numPhase ."','". $row['combi2'] ."')");
	}

	$numPhase = $numPhase + 1;
	if ($numPhase <= $nbTour){
		goto TOUR;
	}
    
}




/**
 * Génère un bracket avec seeding optimal RÉEL
 * Garantit que les meilleures équipes ne se rencontrent qu'aux stades les plus avancés
 * Utilise l'algorithme standard des tournois professionnels
 */
function genererBracketAvecSeedingOptimal($tableauEquipes, $nbEquipes, $numPhase)
{
    $matchs = array();
    
    // Générer l'ordre de placement optimal
    $seedingOrder = genererOrdreSeedingOptimal($nbEquipes);
    
    // Réorganiser les équipes selon le seeding optimal
    $equipesSeeded = array();
    for($i = 0; $i < $nbEquipes; $i++){
        $seedPosition = $seedingOrder[$i] - 1; // -1 car les indices commencent à 0
        $equipesSeeded[] = isset($tableauEquipes[$seedPosition]) ? $tableauEquipes[$seedPosition] : '';
    }
    
    // Créer les matchs avec le seeding optimal
    $nbMatch = $nbEquipes / 2;
    for($i = 0; $i < $nbMatch; $i++){
        $equipe1 = $equipesSeeded[$i];
        $equipe2 = $equipesSeeded[$nbEquipes - 1 - $i];
        
        $matchs[$i + 1] = array(
            'num_phase' => $numPhase, 
            'equipe1' => $equipe1, 
            'equipe2' => $equipe2
        );
    }
    
    return $matchs;
}

/**
 * Génère un bracket aléatoire
 * Utilise $tableauEquipes pour le mélange aléatoire
 */
function genererBracketAleatoire($tableauEquipes, $nbEquipes, $numPhase)
{
    $matchs = array();
    
    // Mélanger le tableau qui contient déjà les équipes
    $equipesAleatoires = $tableauEquipes;
    shuffle($equipesAleatoires);
    
    // Diviser en deux groupes
    $moitie = $nbEquipes / 2;
    $groupe1 = array_slice($equipesAleatoires, 0, $moitie);
    $groupe2 = array_slice($equipesAleatoires, $moitie);
    
    // Créer les matchs
    for($i = 0; $i < $moitie; $i++){
        $equipe1 = isset($groupe1[$i]) ? $groupe1[$i] : '';
        $equipe2 = isset($groupe2[$i]) ? $groupe2[$i] : '';
        
        $matchs[$i + 1] = array(
            'num_phase' => $numPhase, 
            'equipe1' => $equipe1, 
            'equipe2' => $equipe2
        );
    }
    
    return $matchs;
}



/**
 * Génère l'ordre de seeding optimal pour un nombre donné d'équipes
 * Fonctionne pour toutes les puissances de 2 : 4, 8, 16, 32, 64, 128, etc.
 * Suit la logique des tournois professionnels
 */
function genererOrdreSeedingOptimal($nbEquipes)
{
    // Vérifier que c'est une puissance de 2
    if(($nbEquipes & ($nbEquipes - 1)) !== 0) {
        // Si ce n'est pas une puissance de 2, utiliser l'approche simple
        return range(1, $nbEquipes);
    }
    
    // Générer le seeding optimal récursivement
    return genererSeedingRecursif($nbEquipes);
}

/**
 * Génère récursivement l'ordre de seeding pour n'importe quelle puissance de 2
 * Algorithme universel qui fonctionne pour 4, 8, 16, 32, 64, 128, 256, etc.
 */
function genererSeedingRecursif($n)
{
    if($n <= 2) {
        return range(1, $n);
    }
    
    // Générer récursivement la moitié
    $half = $n / 2;
    $halfSeeds = genererSeedingRecursif($half);
    
    $seeds = array();
    
    // Pour chaque seed de la moitié, ajouter son opposé
    foreach($halfSeeds as $seed) {
        $seeds[] = $seed;                    // Seed original
        $seeds[] = $n + 1 - $seed;          // Son opposé (n+1-seed)
    }
    
    return $seeds;
}

////////////////////////// FIN TIRAGE PHSE FINALE ////////////////////////

function supprPhaseQualif($idPhase,$idTournoi)
{
	global $db;
	$db->exec("DELETE FROM phases_qualif WHERE id_phasequalif == $idPhase");
	header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
}

function supprPhaseQualifTirage($idPhase,$idTournoi)
{
	global $db;
	$db->exec("DELETE FROM phases_qualif WHERE id_phasequalif == $idPhase");
	//header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
}

function dispoReset($idPhaseFinale)
{
	global $db;
	$listeMatchsPhaseFinale = $db->exec("SELECT * FROM matchs_phasesfinales WHERE id_phasefinale == $idPhaseFinale");
	foreach($listeMatchsPhaseFinale as $row){
		$db->exec("UPDATE equipes SET dispo_phasesfinales = \"1\" WHERE num_equipe == '". $row['equipe1'] ."'");
		$db->exec("UPDATE equipes SET dispo_phasesfinales = \"1\" WHERE num_equipe == '". $row['equipe2'] ."'");
	}
}


function supprPhaseFinale($idPhaseFinale)
{
	global $db;
	dispoReset($idPhaseFinale);
	$db->exec("DELETE FROM phases_finales WHERE id_phasefinale == $idPhaseFinale");
	header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");
}


function creerPhaseQualif($idTournoi,$numPhase,$nbEquipes)
{
	global $db;
	$db->exec("INSERT INTO phases_qualif (id_tournoi, num_phase) VALUES ('". $idTournoi ."', '". $numPhase ."')");
	
	$recupIdPhase = $db->query('SELECT * FROM phases_qualif WHERE id_tournoi == '.$idTournoi.' AND num_phase == '. $numPhase .'');
	while ($row = $recupIdPhase->fetchArray(1)) {
		$idPhase = $row['id_phasequalif'];
	}
	
	
	$resultats = $db->query('SELECT combinaison FROM combi_qualifs WHERE id_tournoi == '.$idTournoi.'');
	while ($row = $resultats->fetchArray(1)) {
		$listeCombinaisons[] = $row['combinaison'];
	}
	$generation = 1;
	TIRAGE:
	unset($matchs);	
	if ($generation > 100000){
		supprPhaseQualifTirage($idPhase,$idTournoi);
		echo "<span style=\"color: red; vertical-align: text-bottom\" class=\"uk-icon\" uk-icon=\"icon: close\"></span> Aucune combinaison trouvée ou possibles. Veuillez réessayer (plusieurs tentatives peuvent être effectuées avant de trouver une bonne combinaison).<br /><br /><a href=\"index.php?idtournoi=". $idTournoi ."&page=qualifs\"><button class=\"uk-button uk-button-primary\">Retour</button></a>";
		die();
	}
	$tirage = tiragePhaseQualif($nbEquipes, $numPhase);
	foreach ($tirage as $row){
			$equipe1 = $row['equipe1'];
			$equipe2 = $row['equipe2'];
			$combi1 = "". $equipe1 ."-". $equipe2 ."";
			$combi2 = "". $equipe2 ."-". $equipe1 ."";
			
			
			if ($numPhase != 1){
				if(in_array($combi1, $listeCombinaisons) || in_array($combi2, $listeCombinaisons)){
					$generation = $generation + 1;
					goto TIRAGE;
				}
			}
			
			$matchs[] = array("equipe1" => $equipe1, "equipe2" => $equipe2, "combi1" => $combi1, "combi2" => $combi2);
	}
	

	foreach ($matchs as $row){
		$db->exec("INSERT INTO matchs_qualifs (id_tournoi, id_phasequalif, num_phase, equipe1, equipe2) VALUES ('". $idTournoi ."','". $idPhase ."','". $numPhase ."','". $row['equipe1'] ."','". $row['equipe2'] ."')");
		$db->exec("INSERT INTO combi_qualifs (id_tournoi, id_phasequalif, num_phase, combinaison) VALUES ('". $idTournoi ."','". $idPhase ."','". $numPhase ."','". $row['combi1'] ."')");
		$db->exec("INSERT INTO combi_qualifs (id_tournoi, id_phasequalif, num_phase, combinaison) VALUES ('". $idTournoi ."','". $idPhase ."','". $numPhase ."','". $row['combi2'] ."')");
	}	
	
	//header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
}

function creerPhaseFinale($idTournoi,$numPhaseFinale,$nbEquipes, $labelPhaseFinale, $typePhaseFinale)
{
	global $db;
	$db->exec("INSERT INTO phases_finales (id_tournoi, num_phasefinale, nb_equipes, label_phasefinale, type_phasefinale) VALUES ('". $idTournoi ."', '". $numPhaseFinale ."', '". $nbEquipes ."', '". $labelPhaseFinale ."', '". $typePhaseFinale ."')");	

	//////// creation classement
        // La table n'existe pas, on l'importe
        // Exécuter le script SQL pour créer la table
        $sql = "
        PRAGMA foreign_keys = off;
        BEGIN TRANSACTION;
        -- Tableau : classements
        CREATE TABLE IF NOT EXISTS classements (
            id_classement INTEGER PRIMARY KEY AUTOINCREMENT, 
            class_numequipe NUMERIC, 
            class_numphase NUMERIC REFERENCES phases_finales (num_phasefinale) ON DELETE CASCADE, 
            class_place NUMERIC
        );
        COMMIT TRANSACTION;
        PRAGMA foreign_keys = on;
        ";
        
        $db->exec($sql);

	//////// ajout colonne tour_poule si absente
	// On vérifie si la colonne existe déjà
	$colExists = false;
	$res = $db->query("PRAGMA table_info(matchs_phasesfinales)");
	while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
		if ($row['name'] == 'tour_poule') {
			$colExists = true;
			break;
		}
	}
	if (!$colExists) {
		$sql = "
		PRAGMA foreign_keys = off;
		BEGIN TRANSACTION;
		ALTER TABLE matchs_phasesfinales ADD COLUMN tour_poule INTEGER;
		COMMIT TRANSACTION;
		PRAGMA foreign_keys = on;
		";
		$db->exec($sql);
	}



	// Ajout des places selon nombre d'équipe
	$indexPlace = 1;
	while ($indexPlace < $nbEquipes + 1){
		$db->exec("INSERT INTO classements (class_numphase, class_place) VALUES ('". $numPhaseFinale ."','". $indexPlace ."')");
		$indexPlace++;
	}

//////// fin création classement

	
	$recupIdPhase = $db->query('SELECT * FROM phases_finales WHERE id_tournoi == '.$idTournoi.' AND num_phasefinale == '. $numPhaseFinale .'');
	while ($row = $recupIdPhase->fetchArray(1)) {
		$idPhaseFinale = $row['id_phasefinale'];
	}
	
	unset($matchs);	
	if($typePhaseFinale == "arbre"){

		$tirage = tiragePhaseFinale($idTournoi, $nbEquipes, $numPhaseFinale);
		foreach ($tirage as $row){
				$equipe1 = $row['equipe1'];
				$equipe2 = $row['equipe2'];
				
				$matchs[] = array("equipe1" => $equipe1, "equipe2" => $equipe2);
		}
		
		$indexPosition = 1;
	
	
		foreach ($matchs as $row){

			$db->exec("INSERT INTO matchs_phasesfinales (id_tournoi, id_phasefinale, num_phasefinale, equipe1, equipe2) VALUES ('". $idTournoi ."','". $idPhaseFinale ."','". $numPhaseFinale ."','". $row['equipe1'] ."','". $row['equipe2'] ."')");
			$db->exec("UPDATE positions_phasesfinales SET num_equipe = '". $row['equipe1'] ."' WHERE num_phasefinale == '". $numPhaseFinale ."' AND position_label == 'A". $indexPosition ."'");
			$indexPosition++;
			$db->exec("UPDATE positions_phasesfinales SET num_equipe = '". $row['equipe2'] ."' WHERE num_phasefinale == '". $numPhaseFinale ."' AND position_label == 'A". $indexPosition ."'");
			$indexPosition++;
		}

	}
	if($typePhaseFinale == "poule"){
		$tirage = tiragePhaseFinalePoule($idTournoi, $nbEquipes, $numPhaseFinale);	
	}
	
	//header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");
}

function envoyerFichierVersFTP($local_file, $remote_file, $ftp_config) {
    // Vérifier que le fichier local existe
    if (!file_exists($local_file)) {
        return [
            'success' => false, 
            'message' => "Le fichier local n'existe pas"
        ];
    }
    
    // Connexion FTP
    $ftp_conn = @ftp_connect($ftp_config['server'], $ftp_config['port']);
    
    if (!$ftp_conn) {
        return [
            'success' => false, 
            'message' => "Impossible de se connecter au serveur FTP"
        ];
    }
    
    // Authentification
    $login = @ftp_login($ftp_conn, $ftp_config['username'], $ftp_config['password']);
    
    if (!$login) {
        ftp_close($ftp_conn);
        return [
            'success' => false, 
            'message' => "Identifiants FTP incorrects"
        ];
    }
    
    // Mode passif (important pour les pare-feu)
    ftp_pasv($ftp_conn, true);


	// Créer le répertoire distant s'il n'existe pas
	if (!empty($ftp_config['remotepath'])) {
		@ftp_mkdir($ftp_conn, $ftp_config['remote_path']);
		ftp_chdir($ftp_conn, $ftp_config['remote_path']);
	}

	// Construire le chemin distant complet
	if (!empty($ftp_config['remote_path'])) {
		$remote_file = $ftp_config['remote_path'] . '/' . $remote_file;
	}

    
    // Upload du fichier
    $upload = @ftp_put($ftp_conn, $remote_file, $local_file, FTP_BINARY);
    
    if (!$upload) {
        ftp_close($ftp_conn);
        return [
            'success' => false, 
            'message' => "Erreur lors de l'envoi du fichier"
        ];
    }
    
    // Vérifier que le fichier existe bien sur le serveur
    $taille_distante = ftp_size($ftp_conn, $remote_file);
    $taille_locale = filesize($local_file);
    
    ftp_close($ftp_conn);
    
    if ($taille_distante == $taille_locale) {
        return [
            'success' => true, 
            'message' => "Fichier envoyé avec succès (" . $taille_locale . " octets)"
        ];
    } else {
        return [
            'success' => false, 
            'message' => "Le fichier a été envoyé mais la taille ne correspond pas"
        ];
    }
}

function testFTPConnection($ftpServer, $ftpUsername, $ftpPassword, $ftpPort) {
    // Vérifier que les paramètres ne sont pas vides
    if (empty($ftpServer) || empty($ftpUsername) || empty($ftpPassword)) {
        return '<span style="color: red;">Erreur : Veuillez remplir tous les champs.</span>';
    }
    
    // Convertir le port en entier
    $ftpPort = (int)$ftpPort;
    if ($ftpPort <= 0 || $ftpPort > 65535) {
        return '<span style="color: red;">Erreur : Port FTP invalide.</span>';
    }
    
    // Tenter la connexion FTP
    $ftpConn = @ftp_connect($ftpServer, $ftpPort);
    
    if (!$ftpConn) {
        return '<span style="color: red;">Erreur : Impossible de se connecter au serveur FTP.</span>';
    }
    
    // Tenter l'authentification
    $ftpLogin = @ftp_login($ftpConn, $ftpUsername, $ftpPassword);
    
    if (!$ftpLogin) {
        ftp_close($ftpConn);
        return '<span style="color: red;">Erreur : Nom d\'utilisateur ou mot de passe incorrect.</span>';
    }
    
    // Connexion réussie
    ftp_close($ftpConn);
    return '<span style="color: green;">✓ Connexion FTP réussie !</span>';
}




?>