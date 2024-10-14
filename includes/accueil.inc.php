<?php
defined('_LPDT') or die; 
?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
					
	<!-- panel -->
	<div class="uk-width-1-2@l">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Créer un tounoi</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div class="chart-container">
					<img style="max-height:200px;" src="images/tournoi.png" class="uk-align-center"/>
					<form method="POST">
							<div class="uk-panel uk-panel-box uk-margin-top">Nom du tournoi : <input name="nomTournoi" class="uk-input uk-form-width-medium" type="text" required>
							<button class="uk-button uk-button-success uk-margin-left">Créer</button>
							<input type="hidden" name="action" class="uk-input" value="creationTournoi">
						</div>
					</form>						
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
	<!-- panel -->
	<div class="uk-width-1-2@l">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Ouvrir un Tournoi</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="#" class="uk-icon-link sortable-icon" title="Déplacer" data-uk-tooltip data-uk-icon="icon: move"></a>
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div class="chart-container" uk-overflow-auto>
					<table class="uk-table uk-table-striped">
						<thead>
							<tr>
								<th style="width:10%">ID</th>
								<th style="width: 60%">Nom tournoi</th>
								<th style="width: 30%">Actions</th>
							</tr>
						</thead>
<?php
	$listeTournois = listeTournois();
	foreach($listeTournois as $row) {
		echo "<tr><td>". $row['id_tournoi'] ."</td>
				<td>". $row['nom_tournoi'] ."</td>
				<td>
					<a href=\"index.php?idtournoi=". $row['id_tournoi'] ."\"><button class=\"uk-button uk-button-primary uk-button-small\">Ouvrir</button></a>
					<a class=\"uk-float-right\" style=\"color: red\" href=\"\" onclick=\"supprTournoi(". $row['id_tournoi'] .")\" uk-icon=\"icon: trash; ratio: 1.2\" uk-toggle=\"target: #supprTournoi\"></a>
				</td>
			</tr>";
	}
?>	
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>

<div id="supprTournoi" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title uk-text-center"><span uk-icon="icon: warning; ratio: 2"></span> ATTENTION <span uk-icon="icon: warning; ratio: 2"></span></h2>
        <p>Vous allez supprimer ce tournoi. Cette action n'est pas réversible.<br /><br />Souhaitez vous continuer ?</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
            <a id="supprTournoiBouton" href="#" class="uk-button uk-button-primary" style="background-color: red" type="button">Supprimer le tournoi</a>
        </p>
    </div>
</div>

