<?php
$idTournoi = $_GET['idtournoi'];
 
 
// Excel file name for download 
$fileName = "equipes-idtounoi-". $idTournoi .'-' . date('Y-m-d') . ".csv"; 
 
 //Connexion à la base de donnée
$db = new SQLite3('includes/conf/tournois.db'); 
 
  // Define column names 
$csvData[] = array('num_equipe', 'nom_equipe', 'joueur1', 'joueur2', 'joueur3'); 
  
// Fetch records from database and store in an array
 
$query = $db->query("SELECT * FROM equipes WHERE id_tournoi == '". $idTournoi ."'"); 
$numRows = $db->querySingle("SELECT COUNT(*) as count FROM equipes WHERE id_tournoi == '". $idTournoi ."'");
if($numRows > 0){ 
    while($row = $query->fetchArray(1)){ 
        $lineData = array($row['num_equipe'], $row['nom_equipe'], $row['joueur1'], $row['joueur2'], $row['joeur3']);  
        $csvData[] = $lineData; 
    } 
} 
 
$csv = fopen('php://output', 'w');
fputs($csv, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
$header = array_keys($csvData);
fputcsv($csv, $header, ';');
foreach ($query as $lines) {
fputcsv($csv, (array)$lines, ';', '"');
}

return fclose($csv);
 
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
// Export data to excel and download as xlsx file 
$csv = $excelData; 
$csv>downloadAs($fileName); 
 
header("Location: index.php?idtournoi=$idTournoi&page=equipes");
 
?>