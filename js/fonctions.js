function supprEquipe(idTournoi, idEquipe){
	$("#supprEquipeBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&idequipe='+idEquipe+'&action=supprequipe');
}

function supprTournoi(idTournoi){
	$("#supprTournoiBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprtournoi');
}

function supprPhaseQualif(idTournoi, numPhase){
	$("#supprPhaseQualifBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprphasequalif&phasequalif='+numPhase);
}

function activateLink(idLink, side, ptsV, idMatch){
	
	$("#"+idLink).removeClass('disabled');
	$("#"+idLink).css('color', 'green');
	
	if (event.target.value != ptsV && event.target.value != ''){
		$("#match-"+idMatch+"-"+side).val(ptsV);
		$("#formMatch-"+idMatch).submit();
	}


}

function print16() {
    var principale16 = "";
    var challenge16 = "";
    
    // Sélectionner les éléments
    var elemsPrincipale = document.querySelectorAll("div[name='16èmes de finale']");
    var elemsChallenge = document.querySelectorAll("div[name='Challenge 16èmes de finale']");
    
    // Récupérer le contenu HTML de chaque élément trouvé
    if (elemsPrincipale.length > 0) {
        principale16 = elemsPrincipale[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChallenge.length > 0) {
        challenge16 = elemsChallenge[0].innerHTML; // Prendre le premier élément
    }
    
    var printTab16 = principale16.concat("<br>", challenge16);
  
	document.getElementById('printDiv').innerHTML = "<form id='form-16' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='16'>16</input><input type='textarea' name='rawhtml' value='" + printTab16 + "'></form>";
	document.forms["form-16"].submit();
}

function print8() {
    var principale8 = "";
    var challenge8 = "";
    
    // Sélectionner les éléments
    var elemsPrincipale = document.querySelectorAll("div[name='8èmes de finale']");
    var elemsChallenge = document.querySelectorAll("div[name='Challenge 8èmes de finale']");
    
    // Récupérer le contenu HTML de chaque élément trouvé
    if (elemsPrincipale.length > 0) {
        principale8 = elemsPrincipale[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChallenge.length > 0) {
        challenge8 = elemsChallenge[0].innerHTML; // Prendre le premier élément
    }
    
    var printTab8 = principale8.concat("<br>", challenge8);
  
	document.getElementById('printDiv').innerHTML = "<form id='form-8' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='8'>8</input><input type='textarea' name='rawhtml' value='" + printTab8 + "'></form>";
	document.forms["form-8"].submit();
}