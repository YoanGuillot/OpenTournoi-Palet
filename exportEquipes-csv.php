<?php
$idTournoi = $_GET['idtournoi'];
 
// Nom du fichier CSV à télécharger
$fileName = "equipes-idtournoi-" . $idTournoi . '-' . date('Y-m-d') . ".csv"; 

// Connexion à la base de données
$db = new SQLite3('includes/conf/' . $idTournoi . '.db'); 
 
// Récupérer les enregistrements de la base de données
$query = $db->query('SELECT * FROM equipes'); 
$numRows = $db->querySingle('SELECT COUNT(*) as count FROM equipes');

// Définir les en-têtes HTTP pour le téléchargement CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

// Créer un flux de sortie
$output = fopen('php://output', 'w');

// Écrire les en-têtes de colonnes
fputcsv($output, array('num_equipe', 'nom_equipe', 'joueur1', 'joueur2', 'joueur3'), ';');

// Écrire les données
if($numRows > 0){ 
    while($row = $query->fetchArray(SQLITE3_ASSOC)){ 
        fputcsv($output, array(
            $row['num_equipe'], 
            $row['nom_equipe'], 
            $row['joueur1'], 
            $row['joueur2'], 
            $row['joueur3']
        ), ';'); 
    } 
}

// Fermer le flux
fclose($output);

// Fermer la connexion à la base de données
$db->close();

exit();
?>