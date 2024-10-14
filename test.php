<?php
//Connexion à la base de donnée
$idTournoi = 6;
$db = new SQLite3('includes/conf/tournois.db'); 
 
// Fetch records from database and store in an array
 
//$query = $db->query("SELECT * FROM equipes WHERE id_tournoi == '". $idTournoi ."'"); 
$numRows = $db->querySingle("SELECT COUNT(*) as count FROM equipes WHERE id_tournoi == '". $idTournoi ."'");

echo $numRows;
	if($numRows > 0){ 
		echo $numRows;
	}else{
		echo "no record";
	}
