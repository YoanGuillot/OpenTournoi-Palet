<?php
//Interdit l'accès directe
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
		$infosPhaseFinale[] = $row;
	}
	if(!empty($infosPhaseFinale)){
		return $infosPhaseFinale;
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
	$resultats = $db->query('SELECT * FROM equipes ORDER BY nb_victoires DESC, pts_pour DESC, pts_diff DESC');
	while ($row = $resultats->fetchArray(1)) {
		$classementQualifs[] = $row;
	}
	if(!empty($classementQualifs)){
		return $classementQualifs;
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

function listeMatchsPhaseFinale($idTournoi, $numPhase)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_phasesfinales WHERE id_tournoi == '.$idTournoi.' AND num_phasefinale == '. $numPhase .'');
	while ($row = $resultats->fetchArray(1)) {
		$listeMatchs[] = $row;
	}
	
	return $listeMatchs;
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
	
	
	if(!empty($listeMatchsEquipe)){
		foreach ($listeMatchsEquipe as $row){
			if ($numEquipe == $row['equipe1']){
				$ptsPour = $ptsPour + $row['score1'];
				$ptsContre = $ptsContre + $row['score2'];
				if ($row['score1'] > $row['score2']){
					$nbVictoires = $nbVictoires + 1;
				}
			}else{
				$ptsPour = $ptsPour + $row['score2'];
				$ptsContre = $ptsContre + $row['score1'];
				if ($row['score1'] < $row['score2']){
					$nbVictoires = $nbVictoires + 1;
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
	while ($indexEquipe <= $nombreEquipes){

		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'A". $indexEquipe ."')");
		
		$indexEquipe = $indexEquipe + 1;
	}

	$indexEquipe = 1;
	$nbEquipesB = $nombreEquipes / 2;

	while ($indexEquipe <= $nbEquipesB){

		$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'B". $indexEquipe ."')");
		
		$indexEquipe++;
	}

	//PROBLEME
	if($nombreEquipes > 2){
		$indexEquipe = 1;
		$nbEquipesC = $nombreEquipes / 4;

		while ($indexEquipe <= $nbEquipesC){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'C". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}

	if($nombreEquipes > 4){
		$indexEquipe = 1;
		$nbEquipesD = $nombreEquipes / 8;

		while ($indexEquipe <= $nbEquipesD){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'D". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}

	if($nombreEquipes > 8){
		$indexEquipe = 1;
		$nbEquipesE = $nombreEquipes / 16;

		while ($indexEquipe <= $nbEquipesE){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'E". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}

	if($nombreEquipes > 16){
		$indexEquipe = 1;
		$nbEquipesF = $nombreEquipes / 32;

		while ($indexEquipe <= $nbEquipesF){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'F". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}

	if($nombreEquipes > 32){
		$indexEquipe = 1;
		$nbEquipesG = $nombreEquipes / 64;

		while ($indexEquipe <= $nbEquipesG){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'G". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}
	
	if($nombreEquipes > 64){
		$indexEquipe = 1;
		$nbEquipesH = $nombreEquipes / 128;

		while ($indexEquipe <= $nbEquipesH){

			$db->exec("INSERT INTO positions_phasesfinales (num_phasefinale, position_label) VALUES ('". $numPhaseFinale ."', 'H". $indexEquipe ."')");
		
			$indexEquipe++;
		}

	}
}

function tiragePhaseQualif($nbEquipes, $numPhase)
{
	if ($nbEquipes&1){
	$nbEquipes = $nbEquipes + 1;
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
		if($equipe1 == $nbEquipes){
			$equipe1 = 'EXEMPT';
		}
		if($equipe2 == $nbEquipes){
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
	
	header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
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


	}	
	
	header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");
}





?>