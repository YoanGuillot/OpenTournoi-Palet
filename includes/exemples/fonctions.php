<?php

function date_encode($date){
	
	$date_brute = str_replace("/", "", $date);
	$annee = substr($date_brute, 4, 8);
	$jour = substr($date_brute, 0, 2);
	$mois = substr($date_brute, 2, 2);
	
	$date_encodee = "". $annee ."". $mois ."". $jour ."";	
	
	return $date_encodee;
}

function date_decode($date){
	
	$annee = substr($date, 0, 4);
	$jour = substr($date, 6, 2);
	$mois = substr($date, 4, 2);
	
	$date_decodee = "". $jour ."/". $mois ."/". $annee ."";	
	
	return $date_decodee;
}

?>