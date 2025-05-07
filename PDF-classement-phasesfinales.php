<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;


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

function getEquipeName($numEquipe){
	global $db;
	$resultats = $db->query('SELECT nom_equipe FROM equipes WHERE num_equipe = '. $numEquipe .'');
	while ($row = $resultats->fetchArray(1)) {
		$nomEquipe = $row['nom_equipe'];
	}
	return $nomEquipe;
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



if(isset($_GET['idtournoi'])){
    $idTournoi = $_GET['idtournoi'];
    $numPhaseFinale = $_GET['numphasefinale'];
    
    //Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');

   
    $infosPhaseFinale = infosPhaseFinaleNum($numPhaseFinale);
    $labelPF = $infosPhaseFinale['label_phasefinale'];

    $html2pdf = new Html2Pdf('P','A4','fr');

    $classementPF = classementPF($numPhaseFinale);
    $contentMain = "";
    
    if(!empty($classementPF)){
		foreach($classementPF as $row) {
            if($row['class_numequipe'] != ''){
				$nomEquipe = getEquipeName($row['class_numequipe']);
			}else{
				$nomEquipe = "";
			}
			$contentMain .= "<tr>
					    
					    <td class=\"numplaque\">". $row['class_place'] ."</td>
					    <td>". $row['class_numequipe'] ."</td>
						<td>". $nomEquipe ."</td>
				    </tr>";
		}
	}





    $contentHeader = "
         <style>
            h1{
                text-align:center;
                text-transform: uppercase;
                font-size: 24px;
            }  
            table{
                width: 90%;
                border: 1px solid #000000;
                margin: auto;
                border-collapse: collapse;
                text-align:center;
            }
            td, th{
                padding-top: 15px;
                padding-bottom: 15px;
                padding-left: 10px;
                padding-right: 10px;
                border: 1px solid #000000;
                font-size: 18px;
            }
            th{
                width: 50px;
                background-color: #dddddd;
                text-transform : uppercase;
                font-weight: bold;
                vertical-align: middle;
            }
            
            .enteteImpression{
                display:block;
                border: 1px solid #000000;
                background-color: #dddddd;
                font-weight: bold;
                font-size: 30px;
                text-align:center;
                text-transform: uppercase;
            }

            .numplaque{
                font-weight: bold;
                background-color: #eeeeee;
            }
                </style>
                <div class=\"enteteImpression\"><h1>CLASSEMENT $labelPF</h1></div>
                <br>
                <table>
                    <tr>
                        <th>Place</th><th>Numéro</th><th width=460>Nom de l'équipe</th>
                    </tr>";

    $contentFooter = "</table>";

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('classement phasefinale - '. $labelPF .'.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
