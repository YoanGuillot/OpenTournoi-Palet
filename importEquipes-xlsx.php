<?php
$idTournoi = $_GET['idtournoi'];
 
// Include XLSX generator library 
require_once 'includes/lib/PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "equipes-idtounoi-". $idTournoi .'-' . date('Y-m-d') . ".xlsx"; 
 
// Define column names 
$excelData[] = array('num_equipe', 'nom_equipe', 'joueur1', 'joueur2', 'joueur3'); 
 
//Connexion à la base de donnée
$db = new SQLite3('includes/conf/'.$idTournoi. '.db'); 
 
// Fetch records from database and store in an array
 
$query = $db->query('SELECT * FROM equipes'); 
$numRows = $db->querySingle('SELECT COUNT(*) as count FROM equipes');

//if($numRows > 0){ 
    while($row = $query->fetchArray(1)){ 
        $lineData = array($row['num_equipe'], $row['nom_equipe'], $row['joueur1'], $row['joueur2'], $row['joueur3']);  
        $excelData[] = $lineData; 
    } 
//} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
header("Location: index.php?idtournoi=$idTournoi&page=equipes");
 
?>
