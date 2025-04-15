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

function classementQualifs()
{
	global $db;
	$resultats = $db->query('SELECT * FROM equipes ORDER BY nb_victoires DESC, pts_pour DESC, pts_diff DESC, bonus_qualifs DESC');
	while ($row = $resultats->fetchArray(1)) {
		$classementQualifs[] = $row;
	}
	if(!empty($classementQualifs)){
		return $classementQualifs;
	}
}

function listeEquipes()
{
	echo "ouch";
	die();
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
		
		if($label == "Finale"){
			$ptsMatch = $infosTournoi['pts_finales'];
		}else{
			$ptsMatch = $infosTournoi['pts_phasesfinales'];
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
			<td style=\"with:100%\">
				<form method=\"POST\" id=\"formMatch-$idMatch\" action=\"index.php?idtournoi=$idTournoi&idphase=$idPhaseFinale&page=matchsphasesfinales#matchid-$idMatch\">
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\">$numPlaque</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe1</div>
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side1\" onchange=\"activateLink('validMatch-$idMatch', 'side2', ".$ptsMatch .", '$idMatch')\" name=\"score1\" class=\"uk-select\"  >
						$selectOptions1
					</select>
				</div>
				<div style=\"display:inline-block;width: 10%\" class=\"uk-text-center\"><a id=\"validMatch-$idMatch\" style=\"color: gray\" href=\"javascript:document.getElementById('formMatch-$idMatch').submit();\" uk-icon=\"check\" class=\"disabled\"></a></div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center\">
					<select id=\"match-$idMatch-side2\" onchange=\"activateLink('validMatch-$idMatch', 'side1', ".$ptsMatch .", '$idMatch')\" name=\"score2\" class=\"uk-select\"  >
						$selectOptions2
					</select>
				</div>
				
				<div style=\"display:inline-block;width: 18%\" class=\"uk-text-center uk-text-bolder\">$equipe2</div>
				<div style=\"display:inline-block;width: 10px;height:10px;border-radius: 50%;background-color:". $matchPlayed ."\"></div>

			
				<input type=\"hidden\" name=\"idTournoi\"  value=\"$idTournoi\"></input>
				<input type=\"hidden\" name=\"numPhaseFinale\"  value=\"$numPhaseFinale\"></input>
				<input type=\"hidden\" name=\"position1\"  value=\"$position1\"></input>
				<input type=\"hidden\" name=\"position2\"  value=\"$position2\"></input>
				<input type=\"hidden\" name=\"idPhaseFinale\"  value=\"$idPhaseFinale\"></input>
				<input type=\"hidden\" name=\"action\"  value=\"miseajourMatchPhaseFinale\"></input>
				</form>
			</td>
		</tr>";

		$numPlaque++;
	}

	
	$tableauHead="<div class=\"uk-width-1-1 uk-width-1-2@l uk-width-1-2@xl\">
		<div class=\"uk-card uk-card-default uk-card-small uk-card-hover\">
			<div class=\"uk-card-header\">
				<div class=\"uk-grid uk-grid-small\">
					<div class=\"uk-width-auto\"><h4>". $label ." en ". $ptsMatch ." Points</h4></div><div style=\"margin-top: 8px;margin-left: 20px;display:inline-block;border-radius: 50%; height: 15px;background-color:$allPlayed ;\"></div>
					<div class=\"uk-width-expand uk-text-right panel-icons\"></div>
				</div>
			</div>
			<div class=\"uk-card-body\">
				<div>
					<table class=\"uk-table uk-table-striped\" style=\"width: 100%\">
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
		$vainqueur = $numEquipe1;
		$perdant = $numEquipe2;
	}else{
		$vainqueur = $numEquipe2;
		$perdant = $numEquipe1;
	}


// DEBUGG                     
//echo $score1."-";
//echo $score2." ";

	if(is_numeric($score1) && is_numeric($score2)){
		$db->exec("UPDATE positions_phasesfinales SET num_equipe = '$vainqueur' WHERE num_phasefinale == ". $numPhaseFinale ." AND position_label == \"". $positionVainqueur ."\"");
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

function tiragePhasefinale($idTournoi, $nbEquipes, $numPhase)
{
	
	global $db;
	$recupEquipes = classementQualifs($idTournoi);
	$tableauEquipes = array();
	$countEquipe = 0;
	$infosTournoi = infosTournoi($idTournoi);
	if($infosTournoi['type_phasesfinales'] == "tetesdeserie"){
	
	}else{
		foreach($recupEquipes as $row){
			if($row['dispo_phasesfinales'] == '1' && $countEquipe < $nbEquipes){
				$numEquipe = $row['num_equipe'];
				$tableauEquipes[] = $numEquipe;
				$db->exec("UPDATE equipes SET dispo_phasesfinales = '0' WHERE num_equipe == '$numEquipe'");
				$countEquipe = $countEquipe + 1;
			}
		}
	}

	genererArbrePhaseFinale($numPhase,$nbEquipes);
	
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
		
		$matchs[$numMatch] = array('num_phase'=>$numPhase, 'equipe1'=>$equipe1, 'equipe2'=> $equipe2);
		$numMatch = $numMatch + 1;
		$indexTable = $indexTable + 1;
	}
	return $matchs;
}


function supprPhaseQualif($idPhase)
{
	global $db;
	$db->exec("DELETE FROM phases_qualif WHERE id_phasequalif == $idPhase");
	header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
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
	if ($generation > 1000){
		supprPhaseQualif($idPhase);
		echo "Aucune combinaison trouvée.<br /><br /><a href=\"index.php?idtournoi=". $idTournoi ."&page=qualifs\"><button class=\"uk-button uk-button-primary\">Retour</button></a>";
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
	
	$recupIdPhase = $db->query('SELECT * FROM phases_finales WHERE id_tournoi == '.$idTournoi.' AND num_phasefinale == '. $numPhaseFinale .'');
	while ($row = $recupIdPhase->fetchArray(1)) {
		$idPhaseFinale = $row['id_phasefinale'];
	}
	
	unset($matchs);	

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
	
	//header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");
}





?>