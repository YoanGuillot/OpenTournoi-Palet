<?php
defined('_LPDT') or die;
$idTounroi = $_GET['idtournoi'];
$idPhaseFinale = $_GET['idphasefinale'];
$infosPhaseFinale = infosPhasefinale($idPhaseFinale);
$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
$nbEquipes = $infosPhaseFinale['nb_equipes'];
$label = $infosPhaseFinale['label_phasefinale'];

calculClassementPF($idTournoi, $numPhaseFinale, $nbEquipes);


?>

<div class="uk-grid uk-grid-medium donotprint data-uk-grid uk-sortable="handle: .sortable-icon">
					
	<!-- panel -->
	<div class="uk-width-1-1">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Classement <?php echo $label; ?></h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<form id="formPrint-classementPF" method="POST">
							<a class="visible-inline uk-margin-right" href="PDF-classement-phasesfinales.php?idtournoi=<?php echo $idTournoi; ?>&numphasefinale=<?php echo $numPhaseFinale; ?>" uk-icon="print"></a>
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
									
									<div style="display:inline-block;width: 22%">Place</div>
									<div style="display:inline-block;width: 22%">N°Equipe</div>
									<div style="display:inline-block;width: 50%">Nom équipe</div>
								</th>
							</tr>
						</thead>
						<tbody>
<?php
	$classementPF = classementPF($numPhaseFinale);
		
	
	if(!empty($classementPF)){
		foreach($classementPF as $row) {
			if($row['class_numequipe'] != ''){
				$nomEquipe = getEquipeName($row['class_numequipe']);
			}else{
				$nomEquipe = "";
			}
			
			echo "<tr id=\"idplace-". $row['class_place'] ."\">
					<td style=\"with:100%\">
						<div style=\"display:inline-block;width: 22%\" >". $row['class_place'] ."</div>
						<div style=\"display:inline-block;width: 22%\" >". $row['class_numequipe'] ."</div>
						<div style=\"display:inline-block;width: 50%\" >". $nomEquipe ."</div>
					</td>
				</tr>";
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