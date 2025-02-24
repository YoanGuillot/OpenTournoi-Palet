<?php
defined('_LPDT') or die;


?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
					
	<!-- panel -->
	<div class="uk-width-1-1">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Classement phases qualificatives</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<form id="formPrint-classementQualifs" method="POST">
							<input type="hidden" name="action" value="impression"></input>
							<input type="hidden" name="element" value="classementQualifs"></input>
							<a href="javascript:document.getElementById('formPrint-classementQualifs').submit();" type="submit" class="uk-icon-link" title="Imprimer" data-uk-tooltip data-uk-icon="icon: print"></a>
						</form>
					
					
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
					<table class="uk-table uk-table-striped">
						<thead>
							<tr>
								<th style="width: 100%">
									
									<div style="display:inline-block;width: 10%">Place</div>
									<div style="display:inline-block;width: 10%">N°Equipe</div>
									<div style="display:inline-block;width: 30%">Nom équipe</div>
									<div style="display:inline-block;width: 8%">V</div>
									<div style="display:inline-block;width: 8%">Pts Pour</div>
									<div style="display:inline-block;width: 8%">Pts Contre</div>
									<div style="display:inline-block;width: 8%">Diff</div>
								</th>
							</tr>
						</thead>
<?php
	$classementQualifs = classementQualifs($idTournoi);
		
	$placeEquipe = 1;
	if(!empty($classementQualifs)){
		foreach($classementQualifs as $row) {
			echo "<tr id=\"idplace-". $placeEquipe ."\">
					<td style=\"with:100%\">
						<div style=\"display:inline-block;width: 10%\" >". $placeEquipe ."</div>
						<div style=\"display:inline-block;width: 10%\" >". $row['num_equipe'] ."</div>
						<div style=\"display:inline-block;width: 30%\" >". $row['nom_equipe'] ."</div>
						<div style=\"display:inline-block;width: 8%\" >". $row['nb_victoires'] ."</div>
						<div style=\"display:inline-block;width: 8%\" >". $row['pts_pour'] ."</div>
						<div style=\"display:inline-block;width: 8%\" >". $row['pts_contre'] ."</div>
						<div style=\"display:inline-block;width: 8%\" >". $row['pts_diff'] ."</div>
					</form>
					</td>
				</tr>";
			$placeEquipe = $placeEquipe + 1;
		}	
	}

?>	
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>
