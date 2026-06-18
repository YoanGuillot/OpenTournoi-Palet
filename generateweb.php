<?php
//Interdit l'accès directe
define( '_LPDT', 1 );
date_default_timezone_set("Europe/Paris");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(0);

//récupération de l'id du tournoi
$idTournoi = $_GET['idtournoi'];

// Connexion à la base de données
$db = new SQLite3('includes/conf/' . $idTournoi . '.db');

//Chargement des fonctions
include 'includes/fonctions.inc.php';

//Récupération des infos du tournoi
$infosTournoi = infosTournoi($idTournoi);

//Récupération du nom du tournoi
$nomTournoi = $infosTournoi['nom_tournoi'];

//Récupération de la liste des équipes
$listeEquipes = listeEquipes();
$tableauEquipes = '';
foreach ($listeEquipes as $equipe) {
    $joueurs = htmlspecialchars($equipe['joueur1']);
    if (!empty($equipe['joueur2'])) {
        $joueurs .= '&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;' . htmlspecialchars($equipe['joueur2']);
    }
    if (!empty($equipe['joueur3'])) {
        $joueurs .= '&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;' . htmlspecialchars($equipe['joueur3']);
    }

    $tableauEquipes .= '<tr>
        <td bgcolor="#eeeeee"><strong>' . htmlspecialchars($equipe['num_equipe']) . '</strong></td>
        <td>' . htmlspecialchars($equipe['nom_equipe']) . '</td>
        <td>' . $joueurs . '</td>
    </tr>';
}

//Récupération des infos des phases qualificatives
$infosPhase = infosPhase();
$tablesPhasesQualifsHTML = '';
//Récupération du nombre de phases qualificatives
if ($infosPhase == ''){
		$nbPhase = 0;
		$tablesPhasesQualifsHTML = "Aucune phase de qualification";
}else{
		$colonnePhase = array_column($infosPhase, 'num_phase');
		rsort($colonnePhase, SORT_NUMERIC);
		$nbPhase = $colonnePhase[0];
}

//nbPhase = nombre de phases qualificatives

//Récupération des matchs de chaque phase qualificative
$matchsPhasesQualifs = array();
for ($i = 1; $i <= $nbPhase; $i++) {
    $matchsPhasesQualifs[$i] = listeMatchsQualif($i);
}

//Générer en HTML des tableaux séparés de résultats pour chaque phase qualificative
$tablesPhasesQualifs = array();
for ($i = 1; $i <= $nbPhase; $i++) {
    $tableHTML = '<table>
        <thead>
            <tr>
                <th style="text-align:center;">N° Plaque</th>
                <th style="text-align:center;">Équipe 1</th>
                <th style="text-align:center;">Score 1</th>
                <th style="text-align:center;">Score 2</th>
                <th style="text-align:center;">Équipe 2</th>
            </tr>
        </thead>
        <tbody>';
    $numPlaque = 1;
    foreach ($matchsPhasesQualifs[$i] as $match) {
        $tableHTML .= '<tr>
            <td style="text-align:center;">' . $numPlaque . '</td>
            <td style="text-align:center;">' . $match['equipe1'] . '</td>
            <td style="text-align:center;">' . $match['score1'] . '</td>
            <td style="text-align:center;">' . $match['score2'] . '</td>
            <td style="text-align:center;">' . $match['equipe2'] . '</td>
        </tr>';
        $numPlaque = $numPlaque + 1;
    }
    
    $tableHTML .= '</tbody></table>';
    $tablesPhasesQualifs[$i] = $tableHTML;
}

//insérer dans une variable chaque tableau de résultats des phases qualificatives

for ($i = 1; $i <= $nbPhase; $i++) {
    $tablesPhasesQualifsHTML .= '<br /><br /><br /><h3>Phase de Qualification ' . $i . '</h3>';
    $tablesPhasesQualifsHTML .= $tablesPhasesQualifs[$i];
}


//Récupération du classement des phases qualificatives
$classementQualifs = classementQualifs($idTournoi);
//Générer en HTML le tableau du classement des phases qualificatives
$tableauClassementQualifs = '';
$placeEquipe = 1;
if(!empty($classementQualifs)){
    foreach($classementQualifs as $row) {
        $tableauClassementQualifs .= '<tr>
                <td bgcolor="#eeeeee"><strong>' . $placeEquipe . '</strong></td>
                <td>' . $row['num_equipe'] . '</td>
                <td>' . htmlspecialchars($row['nom_equipe']) . '</td>
                <td>' . $row['nb_victoires'] . '</td>
                <td>' . $row['pts_pour'] . '</td>
                <td>' . $row['pts_contre'] . '</td>
                <td>' . $row['pts_diff'] . '</td>
            </tr>';
        $placeEquipe = $placeEquipe + 1;
    }	
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Récupération des infos des phases finales
$infosPhasesFinales = infosPhasesFinales($idTournoi);
$tablesPhasesFinalesHTML = '';

//Récupération du nombre de phases finales
if ($infosPhasesFinales == ''){
		$numPhaseFinale = 0;
		$tablesPhasesFinalesHTML = "Aucune phase finale";
}else{
		$colonnePhaseFinale = array_column($infosPhasesFinales, 'num_phasefinale');
		rsort($colonnePhaseFinale, SORT_NUMERIC);
		$numPhaseFinale = $colonnePhaseFinale[0];

    //nbPhaseFinale = nombre de phases finales
   
    //Pour chaque phase finale, faire ceci en partant de 1 jusqu'au nombre de phases finales
    $tablesPhasesFinales = array();
    for ($i = 1; $i <= $numPhaseFinale + 1 ; $i++) {
    

        $numPhaseFinale = $i;
        $infosPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
        $nbEquipes = $infosPhaseFinale['nb_equipes'];
        $idPhaseFinale = $infosPhaseFinale['id_phasefinale'];
        $labelPhaseFinale = $infosPhaseFinale['label_phasefinale'];
        $typePhaseFinale = $infosPhaseFinale['type_phasefinale'];

        if(!empty($labelPhaseFinale)){
            $tablesPhasesFinalesHTML .= "<br/><br/><hr /><br/><div><h2>$labelPhaseFinale</h2></div><br/><hr />"; 
        } 

        $numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
		
        // en cas de poule impaire, on ajoute une équipe fictive pour équilibrer le calcul des plaques
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

        if($typePhaseFinale == "arbre"){
    

            ///////////////////////////////////////////////////////////////////////////////////////////////////
            //Pour 4 equipes
            if($nbEquipes == 4){

                $aLabel = "Demi-finales";
                $bLabel = "Finale";
                $pfLabel = "Petite finale";


                $listeMatchsDemis = listeEquipesPhaseFinale($numPhaseFinale,"Demi-finales","A");
                $listeMatchsF = listeEquipesPhaseFinale($numPhaseFinale,"Finale","B");
                $listeMatchsPF = listeEquipesPhaseFinale($numPhaseFinale,"Petite finale","PF");

                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque, $numPhaseFinale);

                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;
                $tablesPhasesFinalesHTML .= $tableauPF;



            }
            //Pour 8 equipes
            if($nbEquipes == 8){

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
                

                $tableauQuarts = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $cLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
                $tableauCLDemis = constructTableMatchsPFWeb($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque + 2, $numPhaseFinale);
                $tableauCLF = constructTableMatchsPFWeb($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque + 2, $numPhaseFinale);

                $tablesPhasesFinalesHTML .= $tableauQuarts;
                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;
                
                $tablesPhasesFinalesHTML .= $tableauPF;
                $tablesPhasesFinalesHTML .= $tableauCLDemis;
                $tablesPhasesFinalesHTML .= $tableauCLF;
            }	


            // Pour 16 Equipes
            if($nbEquipes == 16){
                
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


                $tableau8 = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
                $tableauQuarts = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $cLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $dLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
                
                $tableauCHQuarts = constructTableMatchsPFWeb($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 4, $numPhaseFinale);
                $tableauCHDemis = constructTableMatchsPFWeb($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 4, $numPhaseFinale);
                $tableauCHF = constructTableMatchsPFWeb($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 4, $numPhaseFinale);
                $tableauCHPF = constructTableMatchsPFWeb($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 5, $numPhaseFinale);
                
                $tableauCLDemis = constructTableMatchsPFWeb($idTournoi, $clLabel, $listeMatchsCLDemis, $numPlaque + 2, $numPhaseFinale);
                $tableauCLF = constructTableMatchsPFWeb($idTournoi, $cl2Label, $listeMatchsCLF, $numPlaque + 2, $numPhaseFinale);
                
                $tableauCLCHDemis = constructTableMatchsPFWeb($idTournoi, $CHclLabel, $listeMatchsCHCLDemis, $numPlaque + 6, $numPhaseFinale);
                $tableauCLCHF = constructTableMatchsPFWeb($idTournoi, $CHcl2Label, $listeMatchsCHCLF, $numPlaque + 6, $numPhaseFinale);

                
                $tablesPhasesFinalesHTML .= $tableau8;
                $tablesPhasesFinalesHTML .= $tableauQuarts;
                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;    
                $tablesPhasesFinalesHTML .= $tableauPF;
                $tablesPhasesFinalesHTML .= $tableauCLDemis;
                $tablesPhasesFinalesHTML .= $tableauCLF;
                $tablesPhasesFinalesHTML .= $tableauCHQuarts;
                $tablesPhasesFinalesHTML .= $tableauCHDemis;
                $tablesPhasesFinalesHTML .= $tableauCHF;
                $tablesPhasesFinalesHTML .= $tableauCHPF;
                $tablesPhasesFinalesHTML .= $tableauCLCHDemis;
                $tablesPhasesFinalesHTML .= $tableauCLCHF;


                

            }

            //pour 32 / 64 / 128 Equipes
            if($nbEquipes == 32){

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




                $tableau16 = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
                $tableau8 = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
                $tableauQuarts = constructTableMatchsPFWeb($idTournoi, $cLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $dLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $eLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);

                $tableauCH8 = constructTableMatchsPFWeb($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 8, $numPhaseFinale);
                $tableauCHQuarts = constructTableMatchsPFWeb($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 8, $numPhaseFinale);
                $tableauCHDemis = constructTableMatchsPFWeb($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 8, $numPhaseFinale);
                $tableauCHF = constructTableMatchsPFWeb($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 8, $numPhaseFinale);
                $tableauCHPF = constructTableMatchsPFWeb($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 9, $numPhaseFinale);


                $tablesPhasesFinalesHTML .= $tableau16;
                $tablesPhasesFinalesHTML .= $tableau8;
                $tablesPhasesFinalesHTML .= $tableauQuarts;
                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;
                $tablesPhasesFinalesHTML .= $tableauPF;
                $tablesPhasesFinalesHTML .= $tableauCH8;
                $tablesPhasesFinalesHTML .= $tableauCHQuarts;
                $tablesPhasesFinalesHTML .= $tableauCHDemis;
                $tablesPhasesFinalesHTML .= $tableauCHF;
                $tablesPhasesFinalesHTML .= $tableauCHPF;
                
            }


            if($nbEquipes == 64){

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


                $tableau32 = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchs32, $numPlaque, $numPhaseFinale);
                $tableau16 = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
                $tableau8 = constructTableMatchsPFWeb($idTournoi, $cLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
                $tableauQuarts = constructTableMatchsPFWeb($idTournoi, $dLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $eLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $fLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);

                $tableauCH16 = constructTableMatchsPFWeb($idTournoi, $CH16Label, $listeMatchsCH16, $numPlaque + 16, $numPhaseFinale);
                $tableauCH8 = constructTableMatchsPFWeb($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 16, $numPhaseFinale);
                $tableauCHQuarts = constructTableMatchsPFWeb($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 16, $numPhaseFinale);
                $tableauCHDemis = constructTableMatchsPFWeb($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 16, $numPhaseFinale);
                $tableauCHF = constructTableMatchsPFWeb($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 16, $numPhaseFinale);
                $tableauCHPF = constructTableMatchsPFWeb($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 17, $numPhaseFinale);


                $tablesPhasesFinalesHTML .= $tableau32;
                $tablesPhasesFinalesHTML .= $tableau16;
                $tablesPhasesFinalesHTML .= $tableau8;
                $tablesPhasesFinalesHTML .= $tableauQuarts;
                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;
                $tablesPhasesFinalesHTML .= $tableauPF;
                $tablesPhasesFinalesHTML .= "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
                $tablesPhasesFinalesHTML .= "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /><br /><br /></div>";
                $tablesPhasesFinalesHTML .= "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
                $tablesPhasesFinalesHTML .= $tableauCH16;
                $tablesPhasesFinalesHTML .= $tableauCH8;
                $tablesPhasesFinalesHTML .= $tableauCHQuarts;
                $tablesPhasesFinalesHTML .= $tableauCHDemis;
                $tablesPhasesFinalesHTML .= $tableauCHF;
                $tablesPhasesFinalesHTML .= $tableauCHPF;
                $tablesPhasesFinalesHTML .= "<div class=\"uk-width-1-1 uk-width-1-1@l uk-width-1-1@xl\"><hr /></div>";
                
            }

            if($nbEquipes == 128){

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


                $tableau64 = constructTableMatchsPFWeb($idTournoi, $aLabel, $listeMatchs64, $numPlaque, $numPhaseFinale);
                $tableau32 = constructTableMatchsPFWeb($idTournoi, $bLabel, $listeMatchs32, $numPlaque, $numPhaseFinale);
                $tableau16 = constructTableMatchsPFWeb($idTournoi, $cLabel, $listeMatchs16, $numPlaque, $numPhaseFinale);
                $tableau8 = constructTableMatchsPFWeb($idTournoi, $dLabel, $listeMatchs8, $numPlaque, $numPhaseFinale);
                $tableauQuarts = constructTableMatchsPFWeb($idTournoi, $eLabel, $listeMatchsQuarts, $numPlaque, $numPhaseFinale);
                $tableauDemis = constructTableMatchsPFWeb($idTournoi, $fLabel, $listeMatchsDemis, $numPlaque, $numPhaseFinale);
                $tableauF = constructTableMatchsPFWeb($idTournoi, $gLabel, $listeMatchsF, $numPlaque, $numPhaseFinale);
                $tableauPF = constructTableMatchsPFWeb($idTournoi, $pfLabel, $listeMatchsPF, $numPlaque + 1, $numPhaseFinale);
                //OK

                $tableauCH32 = constructTableMatchsPFWeb($idTournoi, $CH32Label, $listeMatchsCH32, $numPlaque + 32, $numPhaseFinale);
                $tableauCH16 = constructTableMatchsPFWeb($idTournoi, $CH16Label, $listeMatchsCH16, $numPlaque + 32, $numPhaseFinale);
                $tableauCH8 = constructTableMatchsPFWeb($idTournoi, $CH8Label, $listeMatchsCH8, $numPlaque + 32, $numPhaseFinale);
                $tableauCHQuarts = constructTableMatchsPFWeb($idTournoi, $CH4Label, $listeMatchsCHQuarts, $numPlaque + 32, $numPhaseFinale);
                $tableauCHDemis = constructTableMatchsPFWeb($idTournoi, $CH2Label, $listeMatchsCHDemis, $numPlaque + 32, $numPhaseFinale);
                $tableauCHF = constructTableMatchsPFWeb($idTournoi, $CHfLabel, $listeMatchsCHF, $numPlaque + 32, $numPhaseFinale);
                $tableauCHPF = constructTableMatchsPFWeb($idTournoi, $CHpfLabel, $listeMatchsCHPF, $numPlaque + 33, $numPhaseFinale);


                $tablesPhasesFinalesHTML .= $tableau64;
                $tablesPhasesFinalesHTML .= $tableau32;
                $tablesPhasesFinalesHTML .= $tableau16;
                $tablesPhasesFinalesHTML .= $tableau8;
                $tablesPhasesFinalesHTML .= $tableauQuarts;
                $tablesPhasesFinalesHTML .= $tableauDemis;
                $tablesPhasesFinalesHTML .= $tableauF;
                $tablesPhasesFinalesHTML .= $tableauPF;
                $tablesPhasesFinalesHTML .= $tableauCH32;
                $tablesPhasesFinalesHTML .= $tableauCH16;
                $tablesPhasesFinalesHTML .= $tableauCH8;
                $tablesPhasesFinalesHTML .= $tableauCHQuarts;
                $tablesPhasesFinalesHTML .= $tableauCHDemis;
                $tablesPhasesFinalesHTML .= $tableauCHF;
                $tablesPhasesFinalesHTML .= $tableauCHPF;
                
            }    

        }
echo $numPlaque;
        if($typePhaseFinale == "poule"){
            //récupérer le nombre de tours de poules
            
			$nbTours = array();
			$matchsTour = array();
			$resultats = $db->query("SELECT DISTINCT tour_poule FROM matchs_phasesfinales WHERE id_tournoi = '". $idTournoi ."' AND id_phasefinale = '". $idPhaseFinale ."'");
			while ($row = $resultats->fetchArray(1)) {
                $nbTours[] = $row['tour_poule'];
            }
            $nbTours = count($nbTours);

            $listeTableauxTours = '';

            for ($t = 1; $t <= $nbTours; $t++) {

                //Récuperer les matchs de chaque tour
                $resultats = $db->query("SELECT * FROM matchs_phasesfinales WHERE id_tournoi = '". $idTournoi ."' AND id_phasefinale = '". $idPhaseFinale ."' AND tour_poule = '". $t ."'");
                while ($row = $resultats->fetchArray(1)) {
                    $matchsTour[$t][] = $row;
                }

                //Générer le tableau des matchs pour chaque tour
                $tableauTour = constructTableMatchsPouleWeb($idTournoi, "Tour $t", $matchsTour[$t], $numPlaque, $numPhaseFinale, $t);
                $tablesPhasesFinalesHTML .= $tableauTour;
                    
            
            }
                    
		
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Récupération du classement final
$classementFinal = classementFinal();
		
$place = 1;
$tableClassementFinal = "";
if(!empty($classementFinal)){
    foreach($classementFinal as $row) {
        if($row['class_numequipe'] != ''){
            $nomEquipe = getEquipeName($row['class_numequipe']);
        }else{
            $nomEquipe = "";
        }
        
        $tableClassementFinal .= "<tr>
                    <td bgcolor=\"#eeeeee\"><strong>$place</strong></td>
                    <td>". $row['class_numequipe'] ."</td>
                    <td>". $nomEquipe ."</td>
            </tr>";
        $place++;
    }	
}


$codeWeb = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenTournoi-Palet - ' . $nomTournoi .'</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2rem;
        }
        
        .tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }
        
        .tab-button {
            padding: 12px 20px;
            background: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .tab-button.active {
            color: #0066cc;
            border-bottom-color: #0066cc;
            font-weight: bold;
        }
        
        .tab-button:hover {
            background-color: #f9f9f9;
        }
        
        .tab-content {
            display: none;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .tab-content.active {
            display: block;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #0066cc;
            color: white;
            font-weight: bold;
        }
        
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
		<center><img id="logo" style="margin: auto; width: 250px; display:none" src="logo.png" /></center>
        <h1>🏆 OpenTournoi-Palet - '. $nomTournoi .'</h1>
        
        <div class="tabs">
            <button class="tab-button active" onclick="showTab(\'equipes\')">Équipes Inscrites</button>
            <button class="tab-button" onclick="showTab(\'qualifications\')">Phases de Qualifications</button>
            <button class="tab-button" onclick="showTab(\'classement-quali\')">Classement Qualifications</button>
            <button class="tab-button" onclick="showTab(\'finales\')">Phases Finales</button>
            <button class="tab-button" onclick="showTab(\'classement-general\')">Classement Général</button>
        </div>
        
        <!-- Équipes Inscrites -->
        <div id="equipes" class="tab-content active">
            <h2>Équipes Inscrites</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l\'Équipe</th>
                        <th>Joueurs</th>
                    </tr>
                </thead>
                <tbody>
                    '. $tableauEquipes .'
                </tbody>
            </table>
        </div>
        
        <!-- Phase de Qualifications -->
        <div id="qualifications" class="tab-content">
            <h2>Phase de Qualifications</h2>
            '. $tablesPhasesQualifsHTML .'
        </div>
        
        <!-- Classement Phase de Qualification -->
        <div id="classement-quali" class="tab-content">
            <h2>Classement - Phases de Qualifications</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rang</th>
                        <th>N° Équipe</th>
                        <th>Nom Équipe</th>
                        <th>Victoires</th>
                        <th>Pts Pour</th>
                        <th>Pts Contre</th>
                        <th>Diff</th>
                    </tr>
                </thead>
                <tbody>
                    '. $tableauClassementQualifs .'
                </tbody>
            </table>
        </div>
        
        <!-- Phase Finale -->
        <div id="finales" class="tab-content">
            <h2>Phases Finales</h2>
            '. $tablesPhasesFinalesHTML .'
        </div>
        
        <!-- Classement Général -->
        <div id="classement-general" class="tab-content">
            <h2>Classement Général</h2>
            <table>
                <thead>
                    <tr>
                        <th width="150">Rang</th>
                        <th width="150">N° Équipe</th>
                        <th>Nom Équipe</th>
                    </tr>
                </thead>
                <tbody>
                    '. $tableClassementFinal .'
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function showTab(tabName) {
            const contents = document.querySelectorAll(\'.tab-content\');
            const buttons = document.querySelectorAll(\'.tab-button\');
            
            contents.forEach(content => content.classList.remove(\'active\'));
            buttons.forEach(button => button.classList.remove(\'active\'));
            
            document.getElementById(tabName).classList.add(\'active\');
            event.target.classList.add(\'active\');
        }
		
        fetch(\'logo.png\', {method: \'HEAD\'})
            .then(response => {
                if (response.ok) {
                    // Le fichier existe, on affiche le logo
                    document.getElementById(\'logo\').style.display = \'block\'; // ou \'inline\' selon votre besoin
                } else {
                    // Le fichier n\'existe pas, on masque le logo
                    document.getElementById(\'logo\').style.display = \'none\';
                }
            })
            .catch(() => {
                // Erreur réseau ou autre, on masque le logo
                document.getElementById(\'logo\').style.display = \'none\';
            });


    </script>
</body>
</html>';

//Sauvegarde du fichier
$filePath = 'website/index.html';
file_put_contents($filePath, $codeWeb);
echo "Le site web a été généré avec succès : " . $filePath ."<br /><br />Pour accèder au dossier copiez-collez ce chemin dans votre explorateur de fichiers : <strong>" . realpath('website') . "</strong>
<br />Pour ajouter votre logo au site web, copiez-collez votre fichier image nommé <strong>logo.png</strong> dans le dossier : <strong>" . realpath('website') . "</strong><br />Le logo sera affiché en haut de la page (idem pour le FTP, uploadez votre logo.png à coté du fichier index.php .<br /></strong>";




if($infosTournoi['ftp_active'] == 1){

    // Envoie vers FTP
    echo "<br /><strong>Envoi vers le serveur FTP :</strong><br />";


    // 1. Récupérer les infos FTP depuis la BDD (correction pour SQLite3)
    $stmt = $db->prepare("SELECT ftp_host, ftp_port, ftp_user, ftp_pass, ftp_path FROM tournois WHERE id_tournoi = :id");
    $stmt->bindValue(':id', $idTournoi, SQLITE3_TEXT);
    $res = $stmt->execute();
    $ftp_data = $res ? $res->fetchArray(SQLITE3_ASSOC) : false;

    if (!$ftp_data) {
        die("Configuration FTP non trouvée en base de données");
    }

    // 2. Préparer la configuration
    $ftp_config = [
        'server' => $ftp_data['ftp_host'],
        'port' => $ftp_data['ftp_port'] ?? 21,
        'username' => $ftp_data['ftp_user'],
        'password' => $ftp_data['ftp_pass'],
        'remote_path' => $ftp_data['ftp_path'] ?? '/'
    ];

    // 3. Définir les chemins
    $local_file = __DIR__ . '/website/index.html';
    $remote_file = '/index.html';

    // 4. Envoyer le fichier
    $resultat = envoyerFichierVersFTP($local_file, $remote_file, $ftp_config);

    // 5. Afficher le résultat
    if ($resultat['success']) {
        echo "✓ " . $resultat['message'];
        // Vous pouvez logger en BDD ici si besoin
    } else {
        echo "✗ Erreur : " . $resultat['message'];
        // Logger l'erreur en BDD si besoin
    }

}else{
    echo "<br />Le FTP n'est pas activé pour ce tournoi.";
}
$db->close();

//echo '<br /><br /><a href="index.php?idtournoi=' . htmlspecialchars($idTournoi) . '" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #0066cc; color: white; text-decoration: none; border-radius: 5px;">← Retour au tournoi</a>';
?>