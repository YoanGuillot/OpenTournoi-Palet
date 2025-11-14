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
					<div class="uk-panel"><a href="#" class="uk-icon-link generate-web-btn" title="Générer site Web" data-idtournoi="<?= $idTournoi ?>" data-uk-tooltip data-uk-icon="icon: cloud-upload;ratio: 3"></a><br />Générer site Web</div>
					<div class="uk-panel"><a href="index.php" class="uk-icon-link" title="Quitter le tournoi" data-uk-tooltip data-uk-icon="icon: sign-out;ratio: 3"></a><br />Quitter le tournoi</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>

<!-- Modal pour affichage du résultat de generateweb.php -->
<div id="generateWebModal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h3 class="uk-modal-title">Génération du site web</h3>
        <div id="generateWebModalContent" style="max-height:60vh; overflow:auto;">
            <div class="uk-text-center uk-padding-small">
                <div uk-spinner="ratio: 1.5"></div>
                <div>Génération en cours, veuillez patienter...</div>
            </div>
        </div>
        <div class="uk-text-right uk-margin-top">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Fermer</button>
        </div>
    </div>
</div>

<script>
// petit helper pour échapper le HTML (afin d'afficher le output brut)


$(document).ready(function() {
    $('.generate-web-btn').on('click', function(e){
        e.preventDefault();
        var idtournoi = $(this).data('idtournoi');
        var $modal = UIkit.modal('#generateWebModal');
        // afficher modal et loader
        $('#generateWebModalContent').html('<div class="uk-text-center uk-padding-small"><div uk-spinner="ratio: 1.5"></div><div>Génération en cours, veuillez patienter...</div></div>');
        $modal.show();

        // lancer la requête AJAX (GET car generateweb.php lit idtournoi en GET)
        $.ajax({
            url: 'generateweb.php',
            method: 'GET',
            data: { idtournoi: idtournoi },
            dataType: 'text',
            timeout: 120000, // augmenter si génération/FTP prend du temps
            success: function(response) {
                // afficher la réponse brute en conservant la mise en forme
                $('#generateWebModalContent').html('<pre style="white-space:pre-wrap; word-wrap:break-word;">' + response + '</pre>');
            },
            error: function(xhr, status, err) {
                var msg = 'Erreur lors de la génération (' + status + ')';
                if (xhr && xhr.responseText) msg += ' : ' + xhr.responseText;
                $('#generateWebModalContent').html('<div class="uk-alert-danger" uk-alert><p>' + msg + '</p></div>');
            }
        });
    });
});
</script>