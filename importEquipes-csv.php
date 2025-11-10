<?php
$idTournoi = $_GET['idtournoi'];

// Vérifier qu'un fichier a été uploadé
if (!isset($_FILES['fichier_csv']) || $_FILES['fichier_csv']['error'] !== UPLOAD_ERR_OK) {
    die("Erreur : Aucun fichier uploadé ou erreur lors de l'upload.");
}

$fichier = $_FILES['fichier_csv'];

// Vérifier l'extension du fichier
$extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
if ($extension !== 'csv') {
    die("Erreur : Le fichier doit être au format CSV.");
}

// Vérifier le type MIME
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $fichier['tmp_name']);
finfo_close($finfo);

$mimeTypesAutorises = ['text/csv', 'text/plain', 'application/csv', 'text/comma-separated-values'];
if (!in_array($mimeType, $mimeTypesAutorises)) {
    die("Erreur : Le type MIME du fichier n'est pas valide.");
}

// Ouvrir le fichier CSV
$handle = fopen($fichier['tmp_name'], 'r');
if ($handle === false) {
    die("Erreur : Impossible d'ouvrir le fichier CSV.");
}

// Lire la première ligne (en-têtes)
$entetes = fgetcsv($handle, 1000, ';');
if ($entetes === false) {
    fclose($handle);
    die("Erreur : Le fichier CSV est vide.");
}

// Vérifier la structure des colonnes
$colonnesAttendues = ['num_equipe', 'nom_equipe', 'joueur1', 'joueur2', 'joueur3'];
if ($entetes !== $colonnesAttendues) {
    fclose($handle);
    die("Erreur : La structure du fichier CSV n'est pas conforme. Colonnes attendues : " . 
        implode(', ', $colonnesAttendues));
}

// Lire toutes les données et les valider
$donnees = [];
$ligne = 2; // Ligne 1 = en-têtes
while (($data = fgetcsv($handle, 1000, ';')) !== false) {
    // Vérifier que la ligne a le bon nombre de colonnes
    if (count($data) !== count($colonnesAttendues)) {
        fclose($handle);
        die("Erreur : La ligne $ligne n'a pas le bon nombre de colonnes.");
    }
    
    // Vérifier que num_equipe n'est pas vide
    if (empty(trim($data[0]))) {
        fclose($handle);
        die("Erreur : Le numéro d'équipe est vide à la ligne $ligne.");
    }
    
    // Vérifier que nom_equipe n'est pas vide
    if (empty(trim($data[1]))) {
        fclose($handle);
        die("Erreur : Le nom d'équipe est vide à la ligne $ligne.");
    }
    
    $donnees[] = $data;
    $ligne++;
}

fclose($handle);

// Vérifier qu'il y a au moins une ligne de données
if (empty($donnees)) {
    die("Erreur : Le fichier CSV ne contient aucune donnée.");
}

// Connexion à la base de données
$db = new SQLite3('includes/conf/' . $idTournoi . '.db');

// Démarrer une transaction
$db->exec('BEGIN TRANSACTION');

try {
    // Supprimer toutes les données existantes
    $db->exec('DELETE FROM equipes');
    
    // Préparer la requête d'insertion
    $stmt = $db->prepare('INSERT INTO equipes (num_equipe, nom_equipe, joueur1, joueur2, joueur3) 
                          VALUES (:num_equipe, :nom_equipe, :joueur1, :joueur2, :joueur3)');
    
    // Insérer chaque ligne
    foreach ($donnees as $data) {
        $stmt->bindValue(':num_equipe', $data[0], SQLITE3_TEXT);
        $stmt->bindValue(':nom_equipe', $data[1], SQLITE3_TEXT);
        $stmt->bindValue(':joueur1', $data[2], SQLITE3_TEXT);
        $stmt->bindValue(':joueur2', $data[3], SQLITE3_TEXT);
        $stmt->bindValue(':joueur3', $data[4], SQLITE3_TEXT);
        $stmt->execute();
    }
    
    // Valider la transaction
    $db->exec('COMMIT');
    
    echo "Import réussi : " . count($donnees) . " équipe(s) importée(s).";
    
} catch (Exception $e) {
    // Annuler la transaction en cas d'erreur
    $db->exec('ROLLBACK');
    die("Erreur lors de l'import : " . $e->getMessage());
}

$db->close();

header("Location: index.php?idtournoi=$idTournoi&page=equipes&import=success");
?>