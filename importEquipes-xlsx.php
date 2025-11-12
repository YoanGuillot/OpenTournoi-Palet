<?php
$idTournoi = $_GET['idtournoi'];

// Vérifier les extensions nécessaires
if (!extension_loaded('zip')) {
    die("Erreur : L'extension ZIP n'est pas activée. Ajoutez 'extension=php_zip.dll' dans php.ini");
}

if (!function_exists('simplexml_load_string')) {
    die("Erreur : SimpleXML n'est pas disponible. Vérifiez votre version de PHP.");
}

// Fonction pour lire un fichier XLSX
function lireXLSX($filepath) {
    $zip = new ZipArchive;
    
    if ($zip->open($filepath) !== TRUE) {
        return ['error' => "Impossible d'ouvrir le fichier XLSX"];
    }
    
    // Lire les chaînes partagées (textes dans Excel)
    $xmlStrings = $zip->getFromName('xl/sharedStrings.xml');
    $strings = [];
    
    if ($xmlStrings !== false) {
        $xmlStrings = simplexml_load_string($xmlStrings);
        if ($xmlStrings !== false) {
            foreach ($xmlStrings->si as $si) {
                $strings[] = isset($si->t) ? (string)$si->t : '';
            }
        }
    }
    
    // Lire la première feuille
    $xmlSheet = $zip->getFromName('xl/worksheets/sheet1.xml');
    
    if ($xmlSheet === false) {
        $zip->close();
        return ['error' => "Impossible de lire les données de la feuille"];
    }
    
    $xmlSheet = simplexml_load_string($xmlSheet);
    
    if ($xmlSheet === false) {
        $zip->close();
        return ['error' => "Erreur lors du parsing XML de la feuille"];
    }
    
    // Extraire les données ligne par ligne
    $rows = [];
    foreach ($xmlSheet->sheetData->row as $row) {
        $rowData = [];
        foreach ($row->c as $cell) {
            $value = (string)$cell->v;
            
            // Si c'est une référence à une chaîne partagée
            if (isset($cell['t']) && (string)$cell['t'] == 's') {
                $value = isset($strings[(int)$value]) ? $strings[(int)$value] : '';
            }
            
            $rowData[] = $value;
        }
        $rows[] = $rowData;
    }
    
    $zip->close();
    return $rows;
}

// Vérifier l'upload
if (!isset($_FILES['fichier_xlsx']) || $_FILES['fichier_xlsx']['error'] !== UPLOAD_ERR_OK) {
    die("Erreur : Aucun fichier uploadé ou erreur lors de l'upload.");
}

$fichier = $_FILES['fichier_xlsx'];

// Vérifier l'extension
$extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
if ($extension !== 'xlsx') {
    die("Erreur : Le fichier doit être au format XLSX.");
}

// Lire le fichier
$rows = lireXLSX($fichier['tmp_name']);

// Vérifier les erreurs
if (isset($rows['error'])) {
    die("Erreur : " . $rows['error']);
}

if (empty($rows)) {
    die("Erreur : Le fichier XLSX est vide.");
}

// Vérifier les en-têtes
$colonnesAttendues = ['num_equipe', 'nom_equipe', 'joueur1', 'joueur2', 'joueur3'];
if ($rows[0] !== $colonnesAttendues) {
    die("Erreur : Structure du fichier invalide.<br>Colonnes attendues : " . 
        implode(', ', $colonnesAttendues) . "<br>Colonnes trouvées : " . 
        implode(', ', $rows[0]));
}

// Retirer les en-têtes
array_shift($rows);

// Valider les données
$donnees = [];
foreach ($rows as $index => $row) {
    $ligne = $index + 2;
    
    if (count($row) < 5) {
        die("Erreur : La ligne $ligne n'a pas le bon nombre de colonnes.");
    }
    
    if (empty(trim($row[0]))) {
        die("Erreur : Le numéro d'équipe est vide à la ligne $ligne.");
    }
    if (empty(trim($row[1]))) {
        die("Erreur : Le nom d'équipe est vide à la ligne $ligne.");
    }
    
    $donnees[] = $row;
}

if (empty($donnees)) {
    die("Erreur : Le fichier ne contient aucune donnée à importer.");
}

// Connexion à la base de données
$db = new SQLite3('includes/conf/' . $idTournoi . '.db');
$db->exec('BEGIN TRANSACTION');

try {
    // Supprimer toutes les données existantes
    $db->exec('DELETE FROM equipes');
    
    // Préparer l'insertion
    $stmt = $db->prepare('INSERT INTO equipes (num_equipe, nom_equipe, joueur1, joueur2, joueur3) 
                          VALUES (:num_equipe, :nom_equipe, :joueur1, :joueur2, :joueur3)');
    
    // Insérer chaque ligne
    foreach ($donnees as $data) {
        $stmt->bindValue(':num_equipe', trim($data[0]), SQLITE3_TEXT);
        $stmt->bindValue(':nom_equipe', trim($data[1]), SQLITE3_TEXT);
        $stmt->bindValue(':joueur1', trim($data[2] ?? ''), SQLITE3_TEXT);
        $stmt->bindValue(':joueur2', trim($data[3] ?? ''), SQLITE3_TEXT);
        $stmt->bindValue(':joueur3', trim($data[4] ?? ''), SQLITE3_TEXT);
        $stmt->execute();
    }
    
    // Valider la transaction
    $db->exec('COMMIT');
    $db->close();
    
    header("Location: index.php?idtournoi=$idTournoi&page=equipes&import=success&count=" . count($donnees));
    exit();
    
} catch (Exception $e) {
    $db->exec('ROLLBACK');
    $db->close();
    die("Erreur lors de l'insertion : " . $e->getMessage());
}
?>