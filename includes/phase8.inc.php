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

calculPhaseFinale($numPhaseFinale, 8);

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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-8</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">1-4</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">1-16</div>
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
								<div class="bracket-position">1-2</div>
								<div class="bracket-edit">
								<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-C2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['D1']; ?>
									</div>
								</div>                
							</td>
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
								<?php echo $positions['CLB2']; ?>
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