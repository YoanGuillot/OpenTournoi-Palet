function supprEquipe(idTournoi, idEquipe){
	$("#supprEquipeBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&idequipe='+idEquipe+'&action=supprequipe');
}

function supprTournoi(idTournoi){
	$("#supprTournoiBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprtournoi');
}
function activateLink(idLink, side, ptsV, idMatch){
	$("#"+idLink).removeClass('disabled');
	$("#"+idLink).css('color', 'green');
	
	if (event.target.value != ptsV){
		$("#match-"+idMatch+"-"+side).val(ptsV);
		$("#formMatch-"+idMatch).submit();
	}


}
