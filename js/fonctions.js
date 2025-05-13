function supprEquipe(idTournoi, idEquipe){
	$("#supprEquipeBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&idequipe='+idEquipe+'&action=supprequipe');
}

function supprTournoi(idTournoi){
	$("#supprTournoiBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprtournoi');
}

function supprPhaseQualif(idTournoi, numPhase){
	$("#supprPhaseQualifBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprphasequalif&phasequalif='+numPhase);
}
function supprPhaseFinale(idTournoi, numPhaseFinale){
	$("#supprPhaseFinaleBouton").attr("href", 'index.php?idtournoi='+idTournoi+'&action=supprphasefinale&phasefinale='+numPhaseFinale);
}

function creerPhaseQualifBouton(){
	$('#creerPhaseQualif').css('display', 'block');
	$('#form-creerPhaseQualif').submit();
}

function activateLink(idLink, side, ptsV, idMatch){
	
	$("#"+idLink).removeClass('disabled');
	$("#"+idLink).css('color', 'green');
	
	if (event.target.value != ptsV && event.target.value != ''){
		$("#match-"+idMatch+"-"+side).val(ptsV);
		$("#formMatch-"+idMatch).submit();
	}
}

function activateLinkQualifs(idLink, side, ptsV, idMatch){
    $("#"+idLink).css('visibility', 'hidden');


    var tableid = $("#"+idLink).closest("table").attr("id");
    var tableNbTR = $("#"+tableid+" tr").length;
    
  

    var formid = $("#"+idLink).closest("form").attr("id");
    var url = $("#"+formid).attr("action");
    var idTournoi = $("#"+formid+" input[name='idTournoi']").val();
    var idMatchQualif = $("#"+formid+" input[name='idMatchQualif']").val();
    var action = $("#"+formid+" input[name='action']").val();

    if (event.target.value != ptsV && event.target.value != ''){
		$("#match-"+idMatch+"-"+side).val(ptsV);
		//$("#formMatch-"+idMatch).submit();
	
        
        var score1 = $("#match-"+idMatch+"-side1").val();
        var score2 = $("#match-"+idMatch+"-side2").val();
         
    
        $.ajax({
            type: "POST",
            url: url,
            data: {"idTournoi": idTournoi, "idMatchQualif": idMatchQualif, "score1": score1, "score2": score2, "action" : action},
            cache: false,
            success: function(){
                $("#"+idLink).addClass('disabled');
                $("#"+idLink).css('color', 'gray');                 
                $("#"+idLink).css('visibility', 'visible');                 
                $("#"+formid+" .pointStatut").css('background-color', 'green');
                $("#"+formid+" .pointStatut").removeClass("red");               
                $("#"+formid+" .pointStatut").addClass("green");               
            }
        });
    
    
    
    }
    var score1 = $("#match-"+idMatch+"-side1").val();
    var score2 = $("#match-"+idMatch+"-side2").val();
    //alert(score1+", "+score2);

    if((score1 == '' ) || (score2 == '')){
        $("#"+idLink).addClass('disabled');
        $("#"+idLink).css('color', 'gray');                 
        $("#"+idLink).css('visibility', 'hidden');
        $("#"+formid+" .pointStatut").css('background-color', 'red');
        $("#"+formid+" .pointStatut").removeClass("green");               
        $("#"+formid+" .pointStatut").addClass("red");
    }

    if((score1 == '' ) && (score2 == '')){
        $("#"+idLink).css('visibility', 'visible'); 
        $("#"+idLink).removeClass('disabled');
        $("#"+idLink).css('color', 'green');

        $.ajax({
            type: "POST",
            url: url,
            data: {"idTournoi": idTournoi, "idMatchQualif": idMatchQualif, "score1": score1, "score2": score2, "action" : action},
            cache: false,
            success: function(){
                $("#"+idLink).addClass('disabled');
                $("#"+idLink).css('color', 'gray');                 
                $("#"+idLink).css('visibility', 'visible');
                $("#"+formid+" .pointStatut").css('background-color', 'red');
                $("#"+formid+" .pointStatut").removeClass("green");               
                $("#"+formid+" .pointStatut").addClass("red");                 
            }
        });
    }

 

    setTimeout(function (){
  
        var tableNbGreen = $("#"+tableid+" .pointStatut.green").length;
        var nbMatch = tableNbTR -1;
        var numPhase = $("#"+tableid).attr("otpname");
        var idBigPoint = "bigPoint-"+numPhase;
        //alert(nbMatch+", "+tableNbGreen);
        if(nbMatch == tableNbGreen){
            $("#"+idBigPoint).css('background-color', 'green');
        }else{
            $("#"+idBigPoint).css('background-color', 'red');
        }
                    
    }, 500); 
        
}


function activateLinkPF(idLink, side, ptsV, idMatch){
    $("#"+idLink).css('visibility', 'hidden');


    var tableid = $("#"+idLink).closest("table").attr("niveau");
    var tableNbTR = $("table[niveau='"+tableid+"'] tr").length;
    
  

    var formid = $("#"+idLink).closest("form").attr("id");
    var url = $("#"+formid).attr("action");
    var idTournoi = $("#"+formid+" input[name='idTournoi']").val();
    var idPhaseFinale = $("#"+formid+" input[name='idPhaseFinale']").val();
    var numPhaseFinale = $("#"+formid+" input[name='numPhaseFinale']").val();
    var position1 = $("#"+formid+" input[name='position1']").val();
    var position2 = $("#"+formid+" input[name='position2']").val();
    var action = $("#"+formid+" input[name='action']").val();

   

     if (event.target.value != ptsV && event.target.value != ''){
	 	$("#match-"+idMatch+"-"+side).val(ptsV);
	 	//$("#formMatch-"+idMatch).submit();
	
        
         var score1 = $("#match-"+idMatch+"-side1").val();
         var score2 = $("#match-"+idMatch+"-side2").val();
        

        $.ajax({
            type: "POST",
            url: url,
            data: {"idTournoi": idTournoi, "numPhaseFinale": numPhaseFinale, "idPhaseFinale": idPhaseFinale, "position1": position1, "position2": position2, "score1": score1, "score2": score2, "action" : action},
            cache: false,
            success: function(){
                $("#"+idLink).addClass('disabled');
                $("#"+idLink).css('color', 'gray');                 
                $("#"+idLink).css('visibility', 'visible');                 
                $("#"+formid+" .pointStatut").css('background-color', 'green');
                $("#"+formid+" .pointStatut").removeClass("red");               
                $("#"+formid+" .pointStatut").addClass("green");               
            }
        });
        
     }
    var score1 = $("#match-"+idMatch+"-side1").val();
    var score2 = $("#match-"+idMatch+"-side2").val();
    //alert(score1+", "+score2);

    if((score1 == '' ) || (score2 == '')){
        $("#"+idLink).addClass('disabled');
        $("#"+idLink).css('color', 'gray');                 
        $("#"+idLink).css('visibility', 'hidden');
        $("#"+formid+" .pointStatut").css('background-color', 'red');
        $("#"+formid+" .pointStatut").removeClass("green");               
        $("#"+formid+" .pointStatut").addClass("red");
    }

    if((score1 == '' ) && (score2 == '')){
        $("#"+idLink).css('visibility', 'visible'); 
        $("#"+idLink).removeClass('disabled');
        $("#"+idLink).css('color', 'green');

        $.ajax({
            type: "post",
            url: url,
            data: {"idTournoi": idTournoi, "numPhaseFinale": numPhaseFinale, "idPhaseFinale": idPhaseFinale, "position1": position1, "position2": position2, "score1": score1, "score2": score2, "action" : action},
            cache: false,
            success: function(){
                $("#"+idLink).addClass('disabled');
                $("#"+idLink).css('color', 'gray');                 
                $("#"+idLink).css('visibility', 'visible');
                $("#"+formid+" .pointStatut").css('background-color', 'red');
                $("#"+formid+" .pointStatut").removeClass("green");               
                $("#"+formid+" .pointStatut").addClass("red");                 
            }
        });
    }

 

    setTimeout(function (){
  
        var tableNbGreen = $("table[niveau='"+tableid+"'] .pointStatut.green").length;
        var nbMatch = tableNbTR -1;
        var numPhase = $("#"+tableid).attr("otpname");

        //alert(nbMatch+", "+tableNbGreen);
        if(nbMatch == tableNbGreen){
            $("div[otpname='bigPoint "+tableid+"']").css('background-color', 'green');

        }else{
            $("div[otpname='bigPoint "+tableid+"']").css('background-color', 'red');
        }

        if((score1 == '' ) || (score2 == '')){
            if((score1 == '' ) && (score2 == '')){
                window.location.reload();
            }
        }else{
                window.location.reload();
        }
                    
    }, 500);


        
}


function print16(labelPhaseFinale) {
    var labelPhaseHtml = "<page><div class=\"enteteImpression\">"+labelPhaseFinale+"</div>";
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

    if (challenge16 == ""){
        var printTab16 = labelPhaseHtml+"<br>"+principale16+"</page>";
    }else{
        var printTab16 = labelPhaseHtml+"<br>"+principale16+"</page><page>"+challenge16+"</page>";
    }

    
    
  
	document.getElementById('printDiv').innerHTML = "<form id='form-16' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='16'>16</input><input type='textarea' name='rawhtml' value='" + printTab16 + "'></form>";
	document.forms["form-16"].submit();
}

function print8(labelPhaseFinale) {
    var labelPhaseHtml = "<page><div class=\"enteteImpression\">"+labelPhaseFinale+"</div>";
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
    
    if (challenge8 == ""){
        var printTab8 = labelPhaseHtml+"<br>"+principale8+"</page>";
    }else{
        var printTab8 = labelPhaseHtml+"<br>"+principale8+"</page><page><div class=\"enteteImpression\">Challenge "+labelPhaseFinale+"</div><br>"+challenge8+"</page>";
    }
  
	document.getElementById('printDiv').innerHTML = "<form id='form-8' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='8'>8</input><input type='textarea' name='rawhtml' value='" + printTab8 + "'></form>";
	document.forms["form-8"].submit();
}

function print4(labelPhaseFinale) {
    var labelPhaseHtml = "<div class=\"enteteImpression\">"+labelPhaseFinale+"</div>";
    var principale4 = "";
    var challenge4 = "";
    
    // Sélectionner les éléments
    var elemsPrincipale = document.querySelectorAll("div[name='Quarts de finale']");
    var elemsChallenge = document.querySelectorAll("div[name='Challenge Quarts de finale']");
    
    // Récupérer le contenu HTML de chaque élément trouvé
    if (elemsPrincipale.length > 0) {
        principale4 = elemsPrincipale[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChallenge.length > 0) {
        challenge4 = elemsChallenge[0].innerHTML; // Prendre le premier élément
    }
    
    var printTab4 = labelPhaseHtml+"<br>"+principale4+"<br><br>"+challenge4;
  
	document.getElementById('printDiv').innerHTML = "<form id='form-4' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='4'>4</input><input type='textarea' name='rawhtml' value='" + printTab4 + "'></form>";
	document.forms["form-4"].submit();
}

function print2(labelPhaseFinale) {
    var labelPhaseHtml = "<page><div class=\"enteteImpression\">"+labelPhaseFinale+"</div>";
    var principale2 = "";
    var challenge2 = "";
    var classement2 = "";
    var ChClassement2 = "";
    
    // Sélectionner les éléments
    var elemsPrincipale = document.querySelectorAll("div[name='Demi-finales']");
    var elemsChallenge = document.querySelectorAll("div[name='Challenge Demi-finales']");
    var elemsClassement2 = document.querySelectorAll("div[name='Classements 1er Tour']");
    var elemsChClassement2 = document.querySelectorAll("div[name='Challenge Classements 1er Tour']");
    
    // Récupérer le contenu HTML de chaque élément trouvé
    if (elemsPrincipale.length > 0) {
        principale2 = elemsPrincipale[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChallenge.length > 0) {
        challenge2 = elemsChallenge[0].innerHTML; // Prendre le premier élément
    }

    if (elemsClassement2.length > 0) {
        classement2 = elemsClassement2[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChClassement2.length > 0) {
        ChClassement2 = elemsChClassement2[0].innerHTML; // Prendre le premier élément
    }
    
    var printTab2 = labelPhaseHtml+"<br>"+principale2+"<br><br>"+classement2+"</page><page><div class=\"enteteImpression\">Challenge "+labelPhaseFinale+"</div><br>"+challenge2+"<br><br>"+ChClassement2+"</page>";
  
	document.getElementById('printDiv').innerHTML = "<form id='form-2' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='2'>2</input><input type='textarea' name='rawhtml' value='" + printTab2 + "'></form>";
	document.forms["form-2"].submit();
}

function print1(labelPhaseFinale) {
    var labelPhaseHtml = "<div class=\"enteteImpression\">"+labelPhaseFinale+"</div>";
    var principale1 = "";
    var challenge1 = "";
    var classement1 = "";
    var ChClassement1 = "";
    var pf1 = "";
    var ChPf1 = "";
    
    // Sélectionner les éléments
    var elemsPrincipale = document.querySelectorAll("div[name='Finale']");
    var elemsChallenge = document.querySelectorAll("div[name='Challenge Finale']");
    var elemsClassement1 = document.querySelectorAll("div[name='Classements 2ème Tour']");
    var elemsChClassement1 = document.querySelectorAll("div[name='Challenge Classements 2ème Tour']");
    var elemsPf1 = document.querySelectorAll("div[name='Petite finale']");
    var elemsChPf1 = document.querySelectorAll("div[name='Challenge Petite finale']");
    
    // Récupérer le contenu HTML de chaque élément trouvé
    if (elemsPrincipale.length > 0) {
        principale1 = elemsPrincipale[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChallenge.length > 0) {
        challenge1 = elemsChallenge[0].innerHTML; // Prendre le premier élément
    }

    if (elemsClassement1.length > 0) {
        classement1 = elemsClassement1[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsChClassement1.length > 0) {
        ChClassement1 = elemsChClassement1[0].innerHTML; // Prendre le premier élément
    }
    
    if (elemsPf1.length > 0) {
        pf1 = elemsPf1[0].innerHTML; // Prendre le premier élément
    }
    if (elemsChPf1.length > 0) {
        ChPf1 = elemsChPf1[0].innerHTML; // Prendre le premier élément
    }
    
    var printTab1 = labelPhaseHtml+"<br>"+principale1+"<br><br>"+pf1+"<br><br>"+challenge1+"<br><br>"+ChPf1+"<br><br>"+classement1+"<br><br>"+ChClassement1;
  
	document.getElementById('printDiv').innerHTML = "<form id='form-1' action='PDF-phase-finale.php' method='post' target='_blank'><input name='niveau' value='1'>1</input><input type='textarea' name='rawhtml' value='" + printTab1 + "'></form>";
	document.forms["form-1"].submit();
}

