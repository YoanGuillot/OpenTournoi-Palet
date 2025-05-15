<?php
defined('_LPDT') or die; 
$idPhaseFinale = $_GET['idphase'];
$infosPhaseFinale = infosPhaseFinale($idPhaseFinale);
//print_r($infosPhaseFinale);
$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
$infoPositions = infosPositions($numPhaseFinale);
$labelPhaseFinale = $infosPhaseFinale['label_phasefinale'];


foreach ($infoPositions as $row) {
	$positions[$row['position_label']] = $row['num_equipe'];
	$ptsPositions[$row['position_label']] = $row['position_score'];
}

calculPhaseFinale($numPhaseFinale, 64);

?>

<div id="phase-container">
	<div class="arbre">
		<div class="uk-width-1-1">
			<div class="uk-card uk-card-default uk-card-hover">
				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4><?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
					<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A1']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B1']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A2']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C1']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A3']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B2']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A4']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D1']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A5']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B3']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A6']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C2']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A7']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B4']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A8']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td ></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D2"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E1']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E1']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										<?php echo $positions['A9']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['A9']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A10"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B5']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A10']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C3']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A11']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B6']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A12']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D2']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A13']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B7']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A14']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C4']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A15']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B8']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A16']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>              
							</td>
							<td>
							</td>
							<td>
							</td>
							<td class="bracket-i">  
							</td>
							<td>
							</td>
						</tr>

						<tr>
							<td> 
							</td>
							<td >  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td>
								<div class="bracket-position">1-2</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['F1']; ?>
								</div>  
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A17']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A17']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td>
							<div class="bracket-position">1</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A18"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B9']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B9']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A18']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A18']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B10"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C5']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A19']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A19']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B10']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A20']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A20']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D3']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A21']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A21']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A22"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B11']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A22']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A22']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C6']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A23']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A23']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A24"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B12']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A24']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A24']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td ></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D4"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
							<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E2']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E2']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas"></td>
							<td></td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A25']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['A25']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A26"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B13']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A26']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A26']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C7']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A27']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A27']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A28"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B14']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A28']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A28']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D4']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A29']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A29']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A30"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B15']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A30']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A30']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C8']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A31']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A31']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A32"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B16']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A32']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A32']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>


	<?php ///// Debut 32//////////////////////////////////// ?>

						<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A33']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A34"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B17']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B17']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A34']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A34']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B18"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C9']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C9']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A35']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A35']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A36"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B18']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B18']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A36']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A36']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D5']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A37']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A37']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A38"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B19']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B19']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A38']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A38']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C2']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A39']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A39']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A40"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B20']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B20']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A40']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A40']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td ></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D2"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E1']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E1']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										<?php echo $positions['A41']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['A41']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A42"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B21']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B21']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A42']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A42']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B22"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C3']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A43']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A43']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A44"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B22']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B22']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A44']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A44']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D2']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A45']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A45']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A46"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B23']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B23']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A46']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A46']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B24"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C4']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A47']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A47']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A48"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B24']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B24']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A48']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A48']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>              
							</td>
							<td>
							</td>
							<td>
							</td>
							<td class="bracket-i">  
							</td>
							<td>
							</td>
						</tr>

						<tr>
							<td> 
							</td>
							<td >  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td>
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['F1']; ?>
								</div>  
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A49']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A49']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td>
							<div class="bracket-position">1</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A50"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B25']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B25']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A50']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A50']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B26"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C5']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A51']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A51']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B26']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B26']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A52']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A52']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D3']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A53']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A53']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A53"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B27']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B27']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A54']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A54']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B28"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C14']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A55']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A55']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A55"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B28']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B28']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A56']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A56']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td ></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D8"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
							<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E4']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E4']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas"></td>
							<td></td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A57']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['A57']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A57"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B29']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B29']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A58']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A58']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B30"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C15']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A59']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A59']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A59"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B30']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B30']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A60']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A60']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D8']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A61']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A61']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A62"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B31']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B31']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A62']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A62']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B32"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C16']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A63']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A63']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A64"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B32']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B32']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A64']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A64']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>


					</table>
				</div>
				
				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4>PETITE FINALE <?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
					<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['PF1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['PF1']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">3-4</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-PF2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['PFV1']; ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['PF2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['PF2']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
								<div class="bracket-position">3</div>
							</td>
						</tr>
					</table>
				</div>

				
		</div>
	</div>
</div>




<?php
////////////////////////////////   CHALLENGE /////////////////////////////////////////
?>
<br/>
<br/>
<br/>
<br/>



<div id="phase-container">
	<div class="arbre">
		<div class="uk-width-1-1">
			<div class="uk-card uk-card-default uk-card-hover">
				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4>CHALLENGE <?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
				<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA1']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB1']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA2']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC1']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA3']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB2']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA4']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">17-20</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD1']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA5']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB3']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA6']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC2']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA7']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB4']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA8']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td ></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">17-18</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHD2"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHE1']; ?>
									</div>
								</div>
							</td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA9']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHA9']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td>
								<div class="bracket-position">17</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA10"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB5']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA10']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC3']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-haut">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA11']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB6']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA12']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td>
								<div class="bracket-position">17-20</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD2']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA13']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB7']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA14']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">17-24</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC4']; ?>
									</div>
								</div> 
							</td>
							<td class="bracket-bas">                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA15']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
							<td class="bracket-i">  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">17-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB8']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA16']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>  
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				
				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4>PETITE FINALE CHALLENGE <?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
					<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHPF1']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHPF1']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-haut">  
							</td>
							<td>  
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">19-20</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHPF2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHPFV1']; ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHPF2']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHPF2']; ?>
									</div>
								</div>  
							</td>
							<td class="bracket-bas">  
							</td>
							<td>
								<div class="bracket-position">19</div>
							</td>
						</tr>
					</table>
				</div>

				
				
		</div>
	</div>
</div>

