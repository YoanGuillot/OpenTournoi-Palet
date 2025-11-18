<?php
defined('_LPDT') or die; 

if (isset($_GET['idtournoi'])){
	$infosTournoi = infosTournoi($idTournoi);
	$listeEquipes = listeEquipes();
	if(!empty($listeEquipes)){
		$nbEquipes = count($listeEquipes);
		foreach ($listeEquipes as $row){
			if($row['num_equipe'] != ''){
				statsEquipe($row['num_equipe']);
			}
		}	
	} else {
		$nbEquipes = 0;
	}

	$phasesMenu = "";
	$infosPhasesFinales = infosPhasesFinales();
	if(!empty($infosPhasesFinales)){
		foreach ($infosPhasesFinales as $row){
			$phasesMenu .= "<li style=\"margin-top: 10px; padding-left: 22px; padding-top: 10px; border-top : 1px solid #444444\">
								
									<span data-uk-icon=\"icon: thumbnails\" class=\"uk-margin-small-right\">
									</span>
									". $row['label_phasefinale'] ."
								
							</li>
							<li>
								<a class=\"uk-margin-left\" href=\"index.php?idtournoi=". $idTournoi ."&idphase=". $row['id_phasefinale'] ."&page=phase". $row['nb_equipes'] ."\">
									<span class=\"uk-margin-small-right\"><img src=\"img/bracket.png\" />
									</span>
									Tableau
								</a>
							</li>
							<li >
								<a class=\"uk-margin-left\" href=\"index.php?idtournoi=". $idTournoi ."&idphase=". $row['id_phasefinale'] ."&page=matchsphasesfinales\" >
									<span data-uk-icon=\"icon: table\" class=\"uk-margin-small-right\"></span>
									Matchs
								</a>
							</li>
							<li >
								<a class=\"uk-margin-left\" href=\"index.php?idtournoi=". $idTournoi ."&idphasefinale=". $row['id_phasefinale'] ."&page=classementphasesfinales\" >
									<span data-uk-icon=\"icon: list\" class=\"uk-margin-small-right\"></span>
									Classement
								</a>
							</li>";
		}
	}
}





?>
<a class="uk-tobottom" href="#bottom" uk-scroll><span class="uk-icon" uk-icon="icon: chevron-down; ratio: 1.5"></span></a>
		<!--HEADER-->
		<header id="top-head" class="uk-position-fixed">
			<div class="uk-container uk-container-expand uk-background-primary">
				<nav class="uk-navbar uk-light uk-padding-small" data-uk-navbar="mode:click; duration: 250">
					<div class="uk-navbar-left">
						<div class="uk-navbar-item uk-hidden@m">
							<a class="uk-logo" href="#"><img class="custom-logo" src="img/dashboard-logo-white.svg" alt=""></a>
						</div>
						<div>GESTION TOURNOI DE PALET</div>
					</div>
					<div class="uk-navbar-right">
<?php

	// Si aucun tournoi en cours
	if ($page != "accueil"){
?>
						<ul class="uk-navbar-nav">
							<li>Inscriptions : <span class="uk-label uk-label-success"><?php echo $infosTournoi['statut_inscriptions']; ?></span></li>
							<li>Phases qualificatives : <span class="uk-label uk-label-danger"><?php echo $infosTournoi['statut_qualifs']; ?></span></li>
							<li>Phases Finales : <span class="uk-label uk-label-danger"><?php echo $infosTournoi['statut_phasesfinales']; ?></span></li>
							<li>TOURNOI : <?php echo $infosTournoi['nom_tournoi']; ?> - ID: <?php echo $idTournoi; ?> </li>
						</ul>
<?php } ?>
					</div>
				</nav>
			</div>
		</header>
		<!--/HEADER-->
		<!-- LEFT BAR -->
		<aside id="left-col" class="uk-light uk-visible@m">
			
			
			<div class="left-logo uk-flex uk-flex-middle">
				<img class="custom-logo" src="img/dashboard-logo.svg" alt="">
			</div>
					
			<div class="left-content-box  content-box-dark">
				<img src="images/tournoi.png" alt="" class="profile-img">
			</div>
	
<?php
	// Si aucun tournoi en cours
	if ($page != "accueil"){
?>

	
			<div class="left-nav-wrap">
				<ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
					<li class="uk-nav-header">GESTION</li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=gestion"><span data-uk-icon="icon: home" class="uk-margin-small-right"></span>Dashboard</a></li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=parametres"><span data-uk-icon="icon: settings" class="uk-margin-small-right"></span>Paramètres</a></li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=equipes"><span data-uk-icon="icon: users" class="uk-margin-small-right"></span>Equipes</a></li>
					
					<li class="uk-nav-header">QUALIFICATIONS</li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=qualifs"><span data-uk-icon="icon: thumbnails" class="uk-margin-small-right"></span>Phases</a></li>					
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=classementqualifs"><span data-uk-icon="icon: list" class="uk-margin-small-right"></span>Classement</a></li>
					<li class="uk-nav-header">PHASES FINALES</li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=phasesfinales"><span data-uk-icon="icon: cog" class="uk-margin-small-right"></span>Gestion phases</a></li>
					<?php echo $phasesMenu; ?>
					<li class="uk-nav-header">MAINTENANCE</li>
					<li><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=maintenance"><span data-uk-icon="icon: unlock" class="uk-margin-small-right"></span>Dévérouillage</a></li>					
				</ul>
				<div class="left-content-box uk-margin-top">
					
						<h5>Inscriptions</h5>
						<div>
							<span class="uk-text-small">Inscriptions <small>(<?php echo $nbEquipes ."/". $infosTournoi['max_equipes']; ?>)</small></span>
							<progress class="uk-progress" value="<?php echo $nbEquipes; ?>" max="<?php echo $infosTournoi['max_equipes']; ?>"></progress>
						</div>
											
				</div>
				
			</div>
	
<?php 
	//Fin condition accueil
	}
	
?>
		</aside>
		<!-- /LEFT BAR -->
		<!-- CONTENT -->
		<div id="content" data-uk-height-viewport="expand: true" style="height:100%; display:block;">
			<div class="uk-container uk-container-expand">
<?php
	// include de la page concernée
	include "includes/$page.inc.php";

?>
				<footer class="uk-section uk-section-small uk-width-1-1 uk-text-center donotprint">
					<hr>
					<p class="uk-text-center">Tournoi de Palet par Yoan Guillot - <a href="https://www.lepaletdutrefle.fr">Le Palet du Trèfle</a> - version BETA 0.17
					</p>
				</footer>
				<a href="#" data-uk-totop data-uk-scroll></a>
				<div id="bottom"></div>
			</div>
		</div>
		
		<!-- /CONTENT -->
<script>
	var util = UIkit.util;
	window.addEventListener("scroll",function(){
  		var toTop = util.$("a.uk-totop");
		var toBottom = util.$("a.uk-tobottom");
  		if(window.pageYOffset > window.innerHeight){
    		util.addClass(toTop, "uk-active");
  		}else{
    		util.removeClass(toTop, "uk-active");
  		}
		if(window.pageYOffset > window.innerHeight){
    		util.removeClass(toBottom, "uk-active");
  		}else{
    		util.addClass(toBottom, "uk-active");
  		}

	},false);	
	

</script>
