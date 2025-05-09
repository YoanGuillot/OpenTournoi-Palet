<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

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
			
			$contentMain .= "<tr>
					    <td class=\"numplaque\">$placeEquipe</td>
					    <td>". $row['num_equipe'] ."</td>
						<td>". $row['nom_equipe'] ."</td>
						<td>". $row['nb_victoires'] ."</td>
						<td>". $row['pts_pour'] ."</td>
						<td>". $row['pts_contre'] ."</td>
						<td>". $row['pts_diff'] ."</td>
				    </tr>";
            $placeEquipe ++;
		}
	}





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
                <div class=\"enteteImpression\"><h1>CLASSEMENT QUALIFICATIONS</h1></div>
                <br>
                <table>
                    <tr>
                        <th>Place</th><th>Numéro</th><th width=160>Nom de l'équipe</th><th>Victoires</th><th>Pts P</th><th>Pts C</th><th>Diff</th>
                    </tr>";

    $contentFooter = "</table>";

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('classement-qualifs.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
