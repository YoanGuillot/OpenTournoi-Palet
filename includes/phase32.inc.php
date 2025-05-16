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

calculPhaseFinale($numPhaseFinale, 32);

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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
								<div class="bracket-position">33-40</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">33-36</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
								<div class="bracket-position">33-40</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
								<div class="bracket-position">33-34</div>
								<div class="bracket-edit">
									<a href="index.php?idtournoi=<?php echo $idTournoi; ?>&idphase=<?php echo $idPhaseFinale; ?>&page=matchsphasesfinales#matchid-CHE2"><img src="img/edit.png" /></a>
								</div>
							</td>
							<td class="bracket-t">  
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
									<?php echo $positions['CHF1']; ?>
								</div>  
							</td>
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
							<div class="bracket-position">33</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
								<div class="bracket-position">33-40</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<div class="bracket-position">33-36</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
								<div class="bracket-position">33-40</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="bracket-position">33-48</div>
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
						</tr>
						<tr>
							<td>
								<div class="bracket-position">33-64</div>
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

