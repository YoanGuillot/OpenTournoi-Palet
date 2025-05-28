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

calculPhaseFinale($numPhaseFinale, 128);

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
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
								<div class="bracket-position">1-64</div>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
								<div class="bracket-position">1-32</div>
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
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
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
								<div class="bracket-position">1-64</div>
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
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
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
							<td></td>
							<td></td>
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
							<div class="bracket-position">1-16</div>
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
							<td></td>
							<td></td>	
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-64</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-32</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-64</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['F1']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['F1']; ?>
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
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-64</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-32</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">1-64</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
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
							<div class="bracket-position">1-16</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
								<div class="bracket-position">1-64</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
								<div class="bracket-position">1-32</div>
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
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
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
								<div class="bracket-position">1-64</div>
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
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>


	<?php ///// Debut 32//////////////////////////////////// ?>
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
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-F2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['G1']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['G1']; ?>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>
						</tr>

						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A33']; ?>
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
							<td class="bracket-i">
							</td>
							<td>
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
								<div class="bracket-position">1-64</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C10"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C10']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
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
							<td class="bracket-i"></td>
							<td></td>
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
							<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D6"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E3']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E3']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>				
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>

<? ///////////////======================///////////////////////////////// ?>						
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B22"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C11']; ?>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D6']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B24"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C12']; ?>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td class="bracket-i"></td><td></td><td class="bracket-i"></td><td></td></tr>

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
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['F2']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['F2']; ?>
								</div>  
							</td>
						<td class="bracket-bas"></td><td></td><td class="bracket-i"></td><td></td></tr>
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
							</td>
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B26"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C13']; ?>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D7']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-16</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
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
						<td></td><td></td><td class="bracket-i"></td><td></td></tr>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
					
					
					
	<?php	///////// DEBUT 65 ///////////////////////////////////////////////////?>
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
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="bracket-position">1-2</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-G2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['H1']; ?>
									</div>
								</div>  
							</td>
						</tr>	

						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A65']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A65']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td>
								<div class="bracket-position">1</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A66"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B33']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B33']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A66']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A66']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B34"><img src="img/edit.png" /></a>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A67']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A67']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A68"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B34']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B34']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A68']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A68']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A69']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A69']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A70"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B35']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B35']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A70']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A70']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B36"><img src="img/edit.png" /></a>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A71']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A71']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A72"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B36']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B36']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A72']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A72']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-16</div>
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
							<td></td>
							<td></td>	
							<td class="bracket-i"></td>
							<td></td>			
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										<?php echo $positions['A73']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['A73']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A74"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B37']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B37']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A74']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A74']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B38"><img src="img/edit.png" /></a>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A75']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A75']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A76"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B38']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B38']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A76']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A76']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A77']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A77']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A78"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B39']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B39']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A78']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A78']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B40"><img src="img/edit.png" /></a>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A79']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A79']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A80"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B40']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B40']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A80']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A80']; ?>
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
							<td></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>

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
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['F2']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['F2']; ?>
								</div>  
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A81']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A81']; ?>
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
							</td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A82"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B41']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B41']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A82']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A82']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B42"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A83']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A83']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A84"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B42']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B42']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A84']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A84']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A85']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A85']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A86"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B43']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B43']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A86']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A86']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B44"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A87']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A87']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A88"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B44']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B44']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A88']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A88']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-16</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>				
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A89']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['A89']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A90"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B45']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B45']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A90']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A90']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B46"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A91']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A91']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A92"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B46']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B46']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A92']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A92']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A93']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A93']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A94"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B47']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B47']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A94']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A94']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B48"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A95']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A95']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A96"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B48']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B48']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A96']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A96']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td><td></td></tr>
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
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-F2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['G2']; ?>
								</div> 
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['G2']; ?>
								</div>
							</td>
							<td class="bracket-bas"></td><td></td></tr>

						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A97']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A97']; ?>
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
							<td class="bracket-i">
							</td>
							<td>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A98"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B49']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B49']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A98']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A98']; ?>
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
							<td class="bracket-i"></td><td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B50"><img src="img/edit.png" /></a>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A99']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A99']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A100"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B50']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B50']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A100']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A100']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C10"><img src="img/edit.png" /></a>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A101']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A101']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A102"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B51']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B51']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A102']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A102']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B52"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C10']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A103']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A103']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A104"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B52']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B52']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A104']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A104']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-D6"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['E3']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['E3']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>				
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										<?php echo $positions['A105']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['A105']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A106"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B53']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B53']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A106']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A106']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B54"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C11']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A107']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A107']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A108"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B54']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B54']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A108']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A108']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D6']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A109']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A109']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A110"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B55']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B55']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A110']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A110']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B56"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C12']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A111']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A111']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A112"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B56']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B56']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A112']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A112']; ?>
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
						<td class="bracket-i"></td><td></td><td></td><td></td></tr>

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
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-E4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['F2']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['F2']; ?>
								</div>  
							</td>
						<td class="bracket-bas"></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A113']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A113']; ?>
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
							</td>
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A114"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B57']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B57']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A114']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A114']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B58"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['C13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['C13']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A115']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A115']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A116"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B58']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B58']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A116']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A116']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['D7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['D7']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A117']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A117']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A118"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B59']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B59']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A118']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A118']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B60"><img src="img/edit.png" /></a>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A119']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A119']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A120"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B60']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B60']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A120']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A120']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">1-16</div>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A121']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['A121']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A122"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B61']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B61']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A122']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A122']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B62"><img src="img/edit.png" /></a>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A123']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A123']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A124"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B62']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B62']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A124']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A124']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A125']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A125']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A126"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B63']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B63']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A126']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A126']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-64</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-B64"><img src="img/edit.png" /></a>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A127']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A127']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">1-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-A128"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['B64']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['B64']; ?>
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
						<td></td><td></td><td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['A128']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['A128']; ?>
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
					<?php ////////////////////////// CHALLENGE à 64 table /////////////////////////////// ?>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td></td>
							<td></td>
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
								<div class="bracket-position">65-96</div>
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
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td></td>
							<td></td>
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
								<div class="bracket-position">65-80</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">65-96</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td></td>
							<td></td>
							<td></td>
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
							<td></td>
							<td></td>
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
							<div class="bracket-position">65-72</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHD2"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHE1']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['CHE1']; ?>
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
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">65-96</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
								<div class="bracket-position">65-80</div>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
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
								<div class="bracket-position">65-96</div>
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
							<td class="bracket-i"></td>
							<td></td>
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
							<td class="bracket-i"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
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
							<td class="bracket-i"></td>
							<td></td>
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
								<div class="bracket-position">65-68</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHE2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHF1']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHF1']; ?>
								</div>  
							</td>
							<td class="bracket-haut"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA17']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA17']; ?>
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
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA18"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB9']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB9']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA18']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA18']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB10"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC5']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA19']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA19']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB10']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA20']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA20']; ?>
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
								<div class="bracket-position">65-80</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC6"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD3']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD3']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA21']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA21']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA22"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB11']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA22']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA22']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC6']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA23']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA23']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA24"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB12']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA24']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA24']; ?>
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
							<div class="bracket-position">65-72</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHD4"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
							<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHE2']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['CHE2']; ?>
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
									<?php echo $positions['CHA25']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHA25']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA26"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB13']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA26']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA26']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC7']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA27']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA27']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA28"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB14']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA28']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA28']; ?>
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
								<div class="bracket-position">65-80</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC8"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD4']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD4']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA29']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA29']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA30"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB15']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA30']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA30']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC8']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA31']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA31']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA32"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB16']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA32']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA32']; ?>
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
							<td class="bracket-i"></td>
							<td></td>
						</tr>


	<?php ///// Debut 32//////////////////////////////////// ?>
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
							</td>
							<td>                
							</td>
							<td>                
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<div class="bracket-position">65-66</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHF2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHG1']; ?>
								</div> 
							</td>
						</tr>

						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA33']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA33']; ?>
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
							<td class="bracket-i">
							</td>
							<td><div class="bracket-position">65</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA34"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB17']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB17']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA34']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA34']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB18"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC9']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC9']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA35']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA35']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA36"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB18']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB18']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA36']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA36']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">1-32</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC10"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD5']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD5']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td></td>
							<td></td>
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA37']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA37']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA38"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB19']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB19']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA38']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA38']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC10']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC10']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA39']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA39']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA40"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB20']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB20']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA40']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA40']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">65-72</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHD6"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHE3']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['CHE3']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-haut"></td>
							<td></td>				
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										<?php echo $positions['CHA41']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['CHA41']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA42"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB21']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB21']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA42']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA42']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB22"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC11']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC11']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA43']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA43']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA44"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB22']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB22']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA44']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA44']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
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
								<div class="bracket-position">65-80</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC12"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD6']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD6']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA45']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA45']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA46"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB23']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB23']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA46']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA46']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB24"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC12']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC12']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA47']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA47']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA48"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB24']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB24']; ?>
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
						<td class="bracket-i"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA48']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA48']; ?>
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
						<td class="bracket-i"></td><td></td></tr>

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
								<div class="bracket-position">65-68</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHE4"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHF2']; ?>
								</div>
								<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHF2']; ?>
								</div>  
							</td>
						<td class="bracket-bas"></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA49']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA49']; ?>
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
							</td>
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA50"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB25']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB25']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA50']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA50']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB26"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC13']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC13']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA51']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA51']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA20"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB26']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB26']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA52']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA52']; ?>
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
						<td></td><td></td></tr>
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
								<div class="bracket-position">65-80</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC14"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD7']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD7']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-haut"></td>
							<td></td>
							<td class="bracket-i"></td>
							<td></td>
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA53']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA53']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA53"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB27']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB27']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA54']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA54']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB28"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC14']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC14']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA55']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA55']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA55"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB28']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB28']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA56']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA56']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">65-72</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHD8"><img src="img/edit.png" /></a>
							</div>
							</td>
							<td class="bracket-t"></td>
							<td>
							<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHE4']; ?>
									</div>
									<div class="bracket-equipe-score">
										<?php echo $ptsPositions['CHE4']; ?>
									</div>
								</div>
							</td>
							<td class="bracket-bas"></td>
							<td></td>				
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA57']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHA57']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA57"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB29']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB29']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA58']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA58']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB30"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC15']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC15']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA59']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA59']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA59"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB30']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB30']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA60']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA60']; ?>
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
						<td></td><td></td></tr>
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
								<div class="bracket-position">65-80</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHC16"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHD8']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHD8']; ?>
									</div>
								</div>                
							</td>
							<td class="bracket-bas"></td>
							<td></td>
							<td></td>
							<td></td>
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA61']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA61']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA62"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB31']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB31']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA62']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA62']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">65-96</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHB32"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHC16']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHC16']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA63']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA63']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-position">65-128</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHA64"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHB32']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHB32']; ?>
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
						<td></td><td></td></tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHA64']; ?>
									</div>
									<div class="bracket-equipe-score">
									<?php echo $ptsPositions['CHA64']; ?>
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
								<div class="bracket-position">67-68</div>
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
								<div class="bracket-position">67</div>
							</td>
						</tr>
					</table>
				</div>

				
				
		</div>
	</div>
</div>

