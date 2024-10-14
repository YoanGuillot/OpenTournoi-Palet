<?php
defined('_LPDT') or die;





$statutInscriptions = $infosTournoi['statut_inscriptions'];
$statutQualifs = $infosTournoi['statut_qualifs'];
$statutFinales = $infosTournoi['statut_phasesfinales'];

if ($statutInscriptions == "ferme"){
	$verrouInscriptions = "<a href=\"index.php?idtournoi=$idTournoi&action=ouvririnscriptions\" style=\"color: red\" class=\"uk-icon-link\" title=\"Cliquez pour déverrouiler\" data-uk-tooltip data-uk-icon=\"icon: lock;ratio: 3\"></a><br />Verrouillé";
}else{
		$verrouInscriptions = "<a href=\"index.php?idtournoi=$idTournoi&action=fermerinscriptions\" style=\"color: green\" class=\"uk-icon-link\" title=\"Cliquez pour verrouiler\" data-uk-tooltip data-uk-icon=\"icon: unlock;ratio: 3\"></a><br />Déverrouillé";
}

if ($statutQualifs == "ferme"){
	$verrouQualifs = "<a href=\"index.php?idtournoi=$idTournoi&action=ouvrirqualifs\" style=\"color: red\" class=\"uk-icon-link\" title=\"Cliquez pour déverrouiler\" data-uk-tooltip data-uk-icon=\"icon: lock;ratio: 3\"></a><br />Verrouillé";
}else{
	$verrouQualifs = "<a href=\"index.php?idtournoi=$idTournoi&action=fermerqualifs\" style=\"color: green\" class=\"uk-icon-link\" title=\"Cliquez pour verrouiler\" data-uk-tooltip data-uk-icon=\"icon: unlock;ratio: 3\"></a><br />Déverrouillé";
}

if ($statutFinales == "ferme"){
	$verrouFinales = "<a href=\"index.php?idtournoi=$idTournoi&action=ouvrirfinales\" style=\"color: red\" class=\"uk-icon-link\" title=\"Cliquez pour déverrouiler\" data-uk-tooltip data-uk-icon=\"icon: lock;ratio: 3\"></a><br />Verrouillé";
}else{
	$verrouFinales = "<a href=\"index.php?idtournoi=$idTournoi&action=fermerfinales\" style=\"color: green\" class=\"uk-icon-link\" title=\"Cliquez pour verrouiler\" data-uk-tooltip data-uk-icon=\"icon: unlock;ratio: 3\"></a><br />Déverrouillé";
}





?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
		<div style="font-weight: bold" class="uk-width-1-1">Fonctionnalités de maintenance à utiliser seulement en dernier recours, cela pourrait perturber le déroulement logique du concours.</div>			
	<!-- panel -->
	<div class="uk-width-1-3">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Inscriptions</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
			<div class="uk-panel uk-text-center"><?php echo $verrouInscriptions ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		<!-- panel -->
	<div class="uk-width-1-3">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Phases qualificatives</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
					<div class="uk-panel uk-text-center"><?php echo $verrouQualifs ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		<!-- panel -->
	<div class="uk-width-1-3">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Phases finales</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
					<div class="uk-panel uk-text-center"><?php echo $verrouFinales ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>
