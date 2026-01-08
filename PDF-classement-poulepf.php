<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

function getEquipeName($numEquipe){
    global $db;
    $resultats = $db->query('SELECT nom_equipe FROM equipes WHERE num_equipe = '. $numEquipe .'');
    while ($row = $resultats->fetchArray(1)) {
        $nomEquipe = $row['nom_equipe'];
    }
    return $nomEquipe;
}
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

function infosPhaseFinale($numPhaseFinale)
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
		$classementQualifs[] = $row;
	}
	if(!empty($classementQualifs)){
		return $classementQualifs;
	}
}

if(isset($_GET['idtournoi'])){

    $idTournoi = $_GET['idtournoi'];
    $html2pdf = new Html2Pdf('P','A4','fr');

    //Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');

    $classementQualifs = classementQualifs($idTournoi);
    $contentMain = "";
    $placeEquipe = 1;
    if(!empty($classementQualifs)){
		foreach($classementQualifs as $row) {
            $nomEquipe = getEquipeName($row['num_equipe']);			
			$contentMain .= "<tr>
					    <td class=\"numplaque\">$placeEquipe</td>
					    <td>". $row['num_equipe'] ."</td>
						<td>". $nomEquipe ."</td>
						<td>". $row['nb_victoires'] ."</td>
						<td>". $row['pts_pour'] ."</td>
						<td>". $row['pts_contre'] ."</td>
						<td>". $row['pts_diff'] ."</td>
				    </tr>";
            $placeEquipe ++;
		}
	}


    $numPhaseFinale = $_GET['numphasefinale'];
    $infosPhaseFinale = infosPhaseFinale($numPhaseFinale);

    $contentHeader = "
                <style>
                    h1{
                        text-align:center;
                    }  
                    table{
                        width: 90%;
                        border: 1px solid #000000;
                        margin: auto;
                        border-collapse: collapse;
                        text-align:center;
                    }
                    td, th{
                        padding: 10px;
                        border: 1px solid #000000;
                    }
                    th{
                        width: 40px;
                        background-color: #dddddd;
                    }
                    .enteteImpression{
                        display:block;
                        border: 1px solid #000000;
                        background-color: #dddddd;
                        font-weight: bold;
                        font-size: 30px;
                        text-align:center;
                        text-transform: uppercase;
                        width: 93%;
                        margin: auto;
                    }

                    .numplaque{
                        font-weight: bold;
                        background-color: #eeeeee;
                    }
                </style>
                <div class=\"enteteImpression\"><h1>CLASSEMENT ". $infosPhaseFinale['label_phasefinale'] ."</h1></div>
                <br>
                <table>
                    <tr>
                        <th>Place</th><th>Numéro</th><th width=160>Nom de l'équipe</th><th>Victoires</th><th>Pts P</th><th>Pts C</th><th>Diff</th>
                    </tr>";

    $contentFooter = "</table>";

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('classement-poule-pf.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
