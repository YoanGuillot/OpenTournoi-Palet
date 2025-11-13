<?php
//Interdit l'accès directe
define( '_LPDT', 1 );
date_default_timezone_set("Europe/Paris");

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
        $joueurs .= ', ' . htmlspecialchars($equipe['joueur2']);
    }
    if (!empty($equipe['joueur3'])) {
        $joueurs .= ', ' . htmlspecialchars($equipe['joueur3']);
    }

    $tableauEquipes .= '<tr>
        <td>' . htmlspecialchars($equipe['num_equipe']) . '</td>
        <td>' . htmlspecialchars($equipe['nom_equipe']) . '</td>
        <td>' . $joueurs . '</td>
    </tr>';
}

//Récupération des infos des phases qualificatives
$infosPhase = infosPhase();

//Récupération du nombre de phases qualificatives
if ($infosPhase == ''){
		$nbPhase = 0;
		$content = "Aucune phase de qualification";
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
                <th style="text-align:center;">Équipe 1</th>
                <th style="text-align:center;">Score 1</th>
                <th style="text-align:center;">Score 2</th>
                <th style="text-align:center;">Équipe 2</th>
            </tr>
        </thead>
        <tbody>';
    
    foreach ($matchsPhasesQualifs[$i] as $match) {
        $tableHTML .= '<tr>
            <td style="text-align:center;">' . $match['equipe1'] . '</td>
            <td style="text-align:center;">' . $match['score1'] . '</td>
            <td style="text-align:center;">' . $match['score2'] . '</td>
            <td style="text-align:center;">' . $match['equipe2'] . '</td>
        </tr>';
    }
    
    $tableHTML .= '</tbody></table>';
    $tablesPhasesQualifs[$i] = $tableHTML;
}

//insérer dans une variable chaque tableau de résultats des phases qualificatives
$tablesPhasesQualifsHTML = '';
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
                <td>' . $placeEquipe . '</td>
                <td>' . htmlspecialchars($row['nom_equipe']) . '</td>
                <td>' . $row['nb_victoires'] . '</td>
                <td>' . $row['pts_pour'] . '</td>
                <td>' . $row['pts_contre'] . '</td>
                <td>' . $row['pts_diff'] . '</td>
            </tr>';
        $placeEquipe = $placeEquipe + 1;
    }	
}

//Récupération des infos des phases finales
$infosPhasesFinales = infosPhasesFinales($idTournoi);

//Récupérer les infos des matchs de chaque phase finale
$matchsPhasesFinales = array();
if(!empty($infosPhasesFinales)){
    foreach ($infosPhasesFinales as $phaseFinale){
        $matchsPhasesFinales[$phaseFinale['id_phasefinale']] = listeMatchsPhasesFinales($phaseFinale['id_phasefinale']);
    }
}
//Générer en HTML des tableaux séparés de résultats pour chaque phase finale
$tablesPhasesFinales = array();
if(!empty($infosPhasesFinales)){
    foreach ($infosPhasesFinales as $phaseFinale){
        $tableHTML = '<table>
            <thead>
                <tr>
                    <th style="text-align:center;">Match</th>
                    <th style="text-align:center;">Équipe 1</th>
                    <th style="text-align:center;">Score</th>
                    <th style="text-align:center;">Équipe 2</th>
                    <th style="text-align:center;">Statut</th>
                </tr>
            </thead>
            <tbody>';
        
        foreach ($matchsPhasesFinales[$phaseFinale['id_phasefinale']] as $match) {
            $tableHTML .= '<tr>
                <td style="text-align:center;">' . $match['label_match'] . '</td>
                <td style="text-align:center;">' . $match['equipe1'] . '</td>
                <td style="text-align:center;">' . $match['score1'] . ' - ' . $match['score2'] . '</td>
                <td style="text-align:center;">' . $match['equipe2'] . '</td>
                <td style="text-align:center;">' . $match['statut_match'] . '</td>
            </tr>';
        }
        
        $tableHTML .= '</tbody></table>';
        $tablesPhasesFinales[$phaseFinale['id_phasefinale']] = $tableHTML;
    }
}

//Insérer dans une variable chaque tableau de résultats des phases finales
$tablesPhasesFinalesHTML = ''; 
if(!empty($infosPhasesFinales)){
    foreach ($infosPhasesFinales as $phaseFinale){
        $tablesPhasesFinalesHTML .= '<br /><br /><br /><h3>' . htmlspecialchars($phaseFinale['label_phasefinale']) . '</h3>';
        $tablesPhasesFinalesHTML .= $tablesPhasesFinales[$phaseFinale['id_phasefinale']];
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
                        <th>Équipe</th>
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
                        <th>Rang</th>
                        <th>Équipe</th>
                        <th>Points Totaux</th>
                        <th>Victoires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Team A</td>
                        <td>20</td>
                        <td>2</td>
                    </tr>
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
    </script>
</body>
</html>';

//Sauvegarde du fichier
$filePath = 'website/index.html';
file_put_contents($filePath, $codeWeb);
echo "Le site web a été généré avec succès : " . $filePath;
$db->close();
?>
<a href="index.php?idtournoi=<?php echo urlencode($idTournoi); ?>" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #0066cc; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">← Retour au tournoi</a>
