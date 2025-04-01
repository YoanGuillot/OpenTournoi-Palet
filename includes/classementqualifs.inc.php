<?php
defined('_LPDT') or die;


?>

<div class="uk-grid uk-grid-medium donotprint data-uk-grid uk-sortable="handle: .sortable-icon">
					
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
							<a onclick="window.print();" type="submit" class="uk-icon-link donotprint" title="Imprimer" data-uk-tooltip data-uk-icon="icon: print"></a>
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
						<tbody>
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
					
					</td>
				</tr>";
			$placeEquipe = $placeEquipe + 1;
		}	
	}

?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>
<div class="printable">

	<div class="uk-width-auto"><h4 style="font-weight: bold;">Classement phases qualificatives</h4></div>
	<table>
		<thead>
			<tr>
				<th style="width: 10%">Place</th>
				<th style="width: 10%">N°Equipe</th>
				<th style="width: 44%">Nom équipe</th>
				<th style="width: 8%">V</th>
				<th style="width: 8%">Pts Pour</th>
				<th style="width: 8%">Pts Contre</th>
				<th style="width: 8%">Diff</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$classementQualifs = classementQualifs($idTournoi);
					
				$placeEquipe = 1;
				if(!empty($classementQualifs)){
					foreach($classementQualifs as $row) {
						echo "<tr>
									<td style=\"width: 10%;font-weight:bold;\" >". $placeEquipe ."</td>
									<td style=\"width: 14%\" >". $row['num_equipe'] ."</td>
									<td style=\"width: 44%\" >". $row['nom_equipe'] ."</td>
									<td style=\"width: 8%\" >". $row['nb_victoires'] ."</td>
									<td style=\"width: 8%\" >". $row['pts_pour'] ."</td>
									<td style=\"width: 8%\" >". $row['pts_contre'] ."</td>
									<td style=\"width: 8%\" >". $row['pts_diff'] ."</td>
							</tr>";
						$placeEquipe = $placeEquipe + 1;
					}	
				}

			?>	
		</tbody>
	</table>
</div>
