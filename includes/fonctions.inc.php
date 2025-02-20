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
	return $infosTournoi;
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

function infosPhase($idTournoi)
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_qualif WHERE id_tournoi == '. $idTournoi .'');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhase[] = $row;
	}
	return $infosPhase;
	
}

function infosPhaseFinale($idTournoi)
{
	global $db;
	$resultats = $db->query('SELECT * FROM phases_finales WHERE id_tournoi == '. $idTournoi .'');
	while ($row = $resultats->fetchArray(1)) {
		$infosPhaseFinale[] = $row;
	}
	return $infosPhaseFinale;
	
}

function listeTournois()
{
	global $db;
	$resultats = $db->query('SELECT * FROM tournois ORDER BY id_tournoi DESC');
	while ($row = $resultats->fetchArray(1)) {
		$listeTournois[] = $row;
	}
	
	return $listeTournois;
}

function classementQualifs($idTournoi)
{
	global $db;
	$resultats = $db->query('SELECT * FROM equipes WHERE id_tournoi == '.$idTournoi.' ORDER BY nb_victoires DESC, pts_pour DESC, pts_diff DESC');
	while ($row = $resultats->fetchArray(1)) {
		$classementQualifs[] = $row;
	}
	
	return $classementQualifs;
}

function listeEquipes($idTournoi)
{
	global $db;
	$resultats = $db->query('SELECT * FROM equipes WHERE id_tournoi == '.$idTournoi.'');
	while ($row = $resultats->fetchArray(1)) {
		$listeEquipes[] = $row;
	}
	
	return $listeEquipes;
}

function listeMatchsQualif($idTournoi, $numPhase)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_qualifs WHERE id_tournoi == '.$idTournoi.' AND num_phase == '. $numPhase .'');
	while ($row = $resultats->fetchArray(1)) {
		$listeMatchs[] = $row;
	}
	
	return $listeMatchs;
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

function statsEquipe($idTournoi, $numEquipe)
{
	global $db;
	$resultats = $db->query('SELECT * FROM matchs_qualifs WHERE id_tournoi == '.$idTournoi.' AND ( equipe1 == '. $numEquipe.' OR equipe2 == '. $numEquipe.')');
	
	while ($rowResults = $resultats->fetchArray(1)) {
		$listeMatchsEquipe[] = $rowResults;
	}
	
	$ptsPour = 0;
	$ptsContre = 0;
	$nbVictoires = 0;
	
	// probleme ici si null
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
	// Fin probleme
		$ptsDiff = $ptsPour - $ptsContre;
		$db->exec("UPDATE equipes SET nb_victoires = \"$nbVictoires\", pts_pour = \"$ptsPour\", pts_contre = \"$ptsContre\", pts_diff = \"$ptsDiff\" WHERE id_tournoi == '$idTournoi' AND num_equipe == '$numEquipe'");
	
	
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
	if($infosTournoi['type_phasesfinales'] == "tetesdeserie"){
		
	}else{
		foreach($recupEquipes as $row){
			if($row['dispo_phasesfinales'] == 'oui' && $countEquipe < $nbEquipes){
				$numEquipe = $row['num_equipe'];
				$tableauEquipes[] = $numEquipe;
				$db->exec("UPDATE equipes SET dispo_phasesfinales = \"non\" WHERE id_tournoi == '$idTournoi' AND num_equipe == '$numEquipe'");
				$countEquipe = $countEquipe + 1;
			}
		}
	}
	
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

function supprPhaseFinale($idPhaseFinale)
{
	global $db;
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
	

	foreach ($matchs as $row){
		$db->exec("INSERT INTO matchs_phasesfinales (id_tournoi, id_phasefinale, num_phasefinale, equipe1, equipe2) VALUES ('". $idTournoi ."','". $idPhaseFinale ."','". $numPhaseFinale ."','". $row['equipe1'] ."','". $row['equipe2'] ."')");
	}	
	
	header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");
}





?>