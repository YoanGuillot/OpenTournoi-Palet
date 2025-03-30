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

calculPhaseFinale($numPhaseFinale, 4);

?>


<div>
	<div id="phase-container-4">
			
		<section id="quarterFinals">
			<div>Equipe 1</div>
			<div>Equipe 2</div>
			<div>Equipe 3</div>
			<div>Equipe 4</div>
		</section>

		<div class="connecter" id="conn2">
			<div></div>
			<div></div>
		</div>

		<div class="line" id="line2">
			<div></div>
			<div></div>
		</div>

		<section id="semiFinals">
			<div></div>
			<div></div>
		</section>

		<div class="connecter" id="conn3">
			<div></div>
		</div>

		<div class="line" id="line3">
			<div></div>
		</div>

		<section id="final">
		<div></div>
		</section>

	</div>
</div>
