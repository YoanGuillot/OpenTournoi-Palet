<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

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

if(isset($_GET['idtournoi'])){

    $idTournoi = $_GET['idtournoi'];
    $html2pdf = new Html2Pdf('P','A4','fr');

    //Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');

    $listeEquipes = listeEquipes();
    $contentMain = "";
    if(!empty($listeEquipes)){
		foreach($listeEquipes as $row) {
			
			$contentMain .= "<tr>
					    <td>". $row['num_equipe'] ."</td>
						<td>". $row['nom_equipe'] ."</td>
						<td>". $row['joueur1'] ."</td>
						<td>". $row['joueur2'] ."</td>
				    </tr>";
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
                    }
                    td, th{
                        padding: 10px;
                        border: 1px solid #000000;
                    }
                    th{
                        width: 150px;
                    }
                </style>
                <h1>LISTE DES EQUIPES</h1>
                <br>
                <table>
                    <tr>
                        <th width=60>Numéro</th><th>Nom de l'équipe</th><th width=200>Joueur 1</th><th>Joueur 2</th>
                    </tr>";

    $contentFooter = "</table>";

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('Equipes.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
