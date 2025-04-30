<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;



if(isset($_GET['idtournoi']) && isset($_GET['numphase']) && isset($_GET['ptsqualifs'])){

    $idTournoi = $_GET['idtournoi'];
    $numPhase = $_GET['numphase'];
    $ptsQualifs = $_GET['ptsqualifs'];
    $html2pdf = new Html2Pdf('P','A4','fr');

    //Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');

    
    function listeMatchsQualif($numPhase)
    {
        global $db;
        $resultats = $db->query('SELECT * FROM matchs_qualifs WHERE num_phase == '. $numPhase .'');
        while ($row = $resultats->fetchArray(1)) {
            $listeMatchs[] = $row;
        }
	
	    return $listeMatchs;
    }
    
    
    
    $listeMatchs = listeMatchsQualif($numPhase);

    $contentMain = "";
    $numPlaque = 1;
    if(!empty($listeMatchs)){
		foreach($listeMatchs as $row) {
			
			$contentMain .= "<tr>
					    <td class=\"numplaque\">". $numPlaque ."</td>
						<td>". $row['equipe1'] ."</td>
						<td>". $row['score1'] ."</td>
						<td>". $row['score2'] ."</td>
						<td>". $row['equipe2'] ."</td>
				    </tr>";
            $numPlaque ++;
		}
	}





    $contentHeader = "
                <style>
            h1{
                text-align:center;
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
                <div class=\"enteteImpression\"><h1>Qualifications - TOUR $numPhase  - Partie en $ptsQualifs pts</h1></div>
                <br>
                <table>
                    <tr>
                        <th>Plaque</th><th width=150>Equipe 1</th><th>Score 1</th><th>Score 2</th><th width=150>Equipe 2</th>
                    </tr>";

    $contentFooter = "</table>";

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('classement-qualifs.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
