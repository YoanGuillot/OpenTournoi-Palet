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
						<div class="uk-width-auto"><h4>LABEL PHASE FINALE</h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
					<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										A1
									</div>
									<div class="bracket-equipe-score">
									0
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
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t">
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										B1
									</div>
									<div class="bracket-equipe-score">
										0
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
										A2
									</div>
									<div class="bracket-equipe-score">
									0
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
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t"> 
							</td>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										C1
									</div>
									<div class="bracket-equipe-score">
										0
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
										A3
									</div>
									<div class="bracket-equipe-score">
									0
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
										B2
									</div>
									<div class="bracket-equipe-score">
										0
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
										A4
									</div>
									<div class="bracket-equipe-score">
									0
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
									<img src="img/edit.png" />
								</div>
							</td>
							<td class="bracket-t">                
							</td>
							<td>
								<div class="bracket-equipe bracket-vainqueur">
									<div class="bracket-equipe-num">
										D1
									</div>
								</div>                
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										A5
									</div>
									<div class="bracket-equipe-score">
									0
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
										B3
									</div>
									<div class="bracket-equipe-score">
										0
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
										A6
									</div>
									<div class="bracket-equipe-score">
									0
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
										C2
									</div>
									<div class="bracket-equipe-score">
										0
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
										A7
									</div>
									<div class="bracket-equipe-score">
									0
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
										B4
									</div>
									<div class="bracket-equipe-score">
										0
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
										A8
									</div>
									<div class="bracket-equipe-score">
									0
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
						<div class="uk-width-auto"><h4>PETITE FINALE</h4></div>
											
					</div>
				</div>
				<div class="uk-card-body">	
					<table>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										PF1
									</div>
									<div class="bracket-equipe-score">
									0
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
										VPF1
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="bracket-equipe">
									<div class="bracket-equipe-num">
										PF2
									</div>
									<div class="bracket-equipe-score">
									0
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
						<div class="uk-width-auto"><h4>MATCHS DE CLASSEMENTS</h4></div>
											
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
									CLA1
								</div>
								<div class="bracket-equipe-score">
								0
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
									0
								</div>
								<div class="bracket-equipe-num">
									CLZ1
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
									CLB1
								</div>
								<div class="bracket-equipe-score">
									0
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
									CLA2
								</div>
								<div class="bracket-equipe-score">
								0
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
									CLY1
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
									CLC1
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
									CLA3
								</div>
								<div class="bracket-equipe-score">
								0
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
									0
								</div>
								<div class="bracket-equipe-num">
									CLZ2
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
									CLB2
								</div>
								<div class="bracket-equipe-score">
									0
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
									CLA4
								</div>
								<div class="bracket-equipe-score">
								0
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
