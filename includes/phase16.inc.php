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

calculPhaseFinale($numPhaseFinale, 16);

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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">1-2</div>
							</td>
							<td class="bracket-i"></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
							<td class="bracket-i"></td>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="bracket-t"></td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['E1']; ?>
									</div>
								</div>
							</td>				
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">1-2</div>
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['VPF1']; ?>
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

				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4>MATCHS DE CLASSEMENTS <?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">
				<table>
					<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLA1']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLA1']; ?>
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
					</tr>
					<tr>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLZ1']; ?>
								</div>
								<div class="bracket-equipe-num">
								<?php echo $positions['CLZ1']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-position">5-8</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLB1']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLB1']; ?>
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
						</td>
						<td class="bracket-i">
						</td>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLA2']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLA2']; ?>
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
					</tr>
					<tr>
						<td>
							<div class="bracket-equipe bracket-vainqueur">
								<div class="bracket-equipe-num">
									<?php echo $positions['CLY1']; ?>
								</div>
							</div> 
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-edit-r">
								<img src="img/edit.png" />
							</div>
							<div class="bracket-position">7-8</div>
							
						</td>
						<td>
						</td>
						<td>

						</td>
						<td>

						</td>
						<td>
							<div class="bracket-position">5-6</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t"> 
						</td>
						<td>
							<div class="bracket-equipe bracket-vainqueur">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLC1']; ?>
								</div>
							</div> 
						</td>
					</tr>
					<tr>
						<td>
							<div class="bracket-position">7</div>
						</td>
						<td class="bracket-i">
						</td>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLA3']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLA3']; ?>
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
							<div class="bracket-position">5</div>  
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLZ2']; ?>
								</div>
								<div class="bracket-equipe-num">
								<?php echo $positions['CLZ2']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-position">5-8</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $ptsPositions['CLB2']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLB2']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-bas">  
						</td>
						<td>  
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CLA4']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CLA4']; ?>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">9-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">5-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">9-16</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">3-4</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $ptsPositions['CHD1']; ?>
									</div>
								</div>                
							</td>
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
								<div class="bracket-position">1</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-4</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-8</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
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
								<div class="bracket-position">3-4</div>
								<div class="bracket-edit">
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHVPF1']; ?>
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
								<div class="bracket-position">3</div>
							</td>
						</tr>
					</table>
				</div>

				<div class="uk-card-header">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto"><h4>MATCHS DE CLASSEMENTS CHALLENGE <?php echo $labelPhaseFinale; ?></h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">
				<table>
					<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLA1']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLA1']; ?>
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
					</tr>
					<tr>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLZ1']; ?>
								</div>
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLZ1']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-position">5-8</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $ptsPositions['CHCLB1']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLB1']; ?>
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
						</td>
						<td class="bracket-i">
						</td>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLA2']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLA2']; ?>
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
					</tr>
					<tr>
						<td>
							<div class="bracket-equipe bracket-vainqueur">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLY1']; ?>
								</div>
							</div> 
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-edit-r">
								<img src="img/edit.png" />
							</div>
							<div class="bracket-position">7-8</div>
							
						</td>
						<td>
						</td>
						<td>

						</td>
						<td>

						</td>
						<td>
							<div class="bracket-position">5-6</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t"> 
						</td>
						<td>
							<div class="bracket-equipe bracket-vainqueur">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLC1']; ?>
								</div>
							</div> 
						</td>
					</tr>
					<tr>
						<td>
							<div class="bracket-position">7</div>
						</td>
						<td class="bracket-i">
						</td>
						<td>
						</td>
						<td class="bracket-haut-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLA3']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLA3']; ?>
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
							<div class="bracket-position">5</div>  
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLZ2']; ?>
								</div>
								<div class="bracket-equipe-num">
									<?php echo $positions['CHCLZ2']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-tr">
						</td>
						<td>
							<div class="bracket-position">5-8</div>
							<div class="bracket-edit">
								<img src="img/edit.png" />
							</div>
						</td>
						<td class="bracket-t">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLB2']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLB2']; ?>
								</div>
							</div>
						</td>
						<td class="bracket-bas">  
						</td>
						<td>  
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td class="bracket-bas-r">
						</td>
						<td>
							<div class="bracket-equipe">
								<div class="bracket-equipe-num">
								<?php echo $positions['CHCLA4']; ?>
								</div>
								<div class="bracket-equipe-score">
								<?php echo $ptsPositions['CHCLA4']; ?>
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
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

