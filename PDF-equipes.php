<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

//Chargement des fonctions
include 'includes/fonctions.inc.php';

if(isset($_GET['idtournoi'])){

    $idTournoi = $_GET['idtournoi'];
    $html2pdf = new Html2Pdf('P','A4','fr');

    //Connexion à la base de donnée
	$db = new SQLite3('includes/conf/' .$idTournoi. '.db');

    $listeEquipes = listeEquipes();

print_r($listeEquipes);
    if(!empty($listeEquipes)){
		foreach($listeEquipes as $row) {
			
			$contentMain .= "<tr>
					    <td style=\"display:inline-block;width: 10%\" >". $row['num_equipe'] ."</td>
						<td style=\"display:inline-block;width: 17%\" >". $row['nom_equipe'] ."</td>
						<td style=\"display:inline-block;width: 15%\" >". $row['joueur1'] ."</td>
						<td style=\"display:inline-block;width: 15%\" >". $row['joueur2'] ."</td>
						<td style=\"display:inline-block;width: 15%\" >". $row['joueur3'] ."</td>
				    </tr>";
		}
	}





    $contentHeader = '<h1>LISTE DES EQUIPES</h1>
                <br>
                <table>
                    <tr>
                        <th>Numéro</th><th>Nom de l\'équipe</th>
                    </tr>';

    $contentFooter = '</table>';

    $content = $contentHeader.$contentMain.$contentFooter;



    $html2pdf->writeHTML($content);
    $html2pdf->output('Equipes.pdf', 'D');
}else{
    echo "ID tournoi non défini ! ";
}
 ?>
