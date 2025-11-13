<?php
defined('_LPDT') or die; 
?>
<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
	<!-- panel -->
	<div >
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Gestion</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body uk-text-center">
				<div class="uk-grid uk-grid-large">
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=parametres" class="uk-icon-link" title="Paramètres" data-uk-tooltip data-uk-icon="icon: settings;ratio: 3"></a><br />Paramètres</div>
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=equipes" class="uk-icon-link" title="Equipes" data-uk-tooltip data-uk-icon="icon: users;ratio: 3"></a><br />Equipes</div>
					<!--<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=impressions" class="uk-icon-link" title="Impressions" data-uk-tooltip data-uk-icon="icon: print;ratio: 3"></a><br />Impressions</div>-->
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		<!-- panel -->
	<div >
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Phases Qualificatives</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body uk-text-center">
				<div class="uk-grid uk-grid-large">
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=qualifs" class="uk-icon-link" title="Phases" data-uk-tooltip data-uk-icon="icon: thumbnails;ratio: 3"></a><br />Phases</div>
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=classementqualifs" class="uk-icon-link" title="Classement" data-uk-tooltip data-uk-icon="icon: list;ratio: 3"></a><br />Classement</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		<!-- panel -->
	<div >
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Phases Finales</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body uk-text-center">
				<div class="uk-grid uk-grid-large">
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=phasesfinales" class="uk-icon-link" title="Phases" data-uk-tooltip data-uk-icon="icon: thumbnails;ratio: 3"></a><br />Phases</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
	<!-- panel -->
	<div >
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Bilan Tournoi</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body uk-text-center">
				<div class="uk-grid uk-grid-large">
					<div class="uk-panel"><a href="index.php?idtournoi=<?php echo $idTournoi; ?>&page=classementfinal" class="uk-icon-link" title="Classement final" data-uk-tooltip data-uk-icon="icon: list;ratio: 3"></a><br />Classement final</div>
					<div class="uk-panel"><a href="generateweb.php?idtournoi=<?= $idTournoi ?>" class="uk-icon-link" title="Générer site Web" data-uk-tooltip data-uk-icon="icon: sign-out;ratio: 3"></a><br />Générer site Web</div>
					<div class="uk-panel"><a href="index.php" class="uk-icon-link" title="Quitter le tournoi" data-uk-tooltip data-uk-icon="icon: sign-out;ratio: 3"></a><br />Quitter le tournoi</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>