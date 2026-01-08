<?php
defined('_LPDT') or die;
$idTounroi = $_GET['idtournoi'];
$idPhaseFinale = $_GET['idphasefinale'];
$infosPhaseFinale = infosPhasefinale($idPhaseFinale);
$numPhaseFinale = $infosPhaseFinale['num_phasefinale'];
$typePhaseFinale = $infosPhaseFinale['type_phasefinale'];
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
							<?php if($typePhaseFinale == 'arbre'){ ?>
								<a class="visible-inline uk-margin-right" href="PDF-classement-phasesfinales.php?idtournoi=<?php echo $idTournoi; ?>&numphasefinale=<?php echo $numPhaseFinale; ?>" uk-icon="print"></a>
							<?php }
							if($typePhaseFinale == 'poule'){ ?>
								<a class="visible-inline uk-margin-right" href="PDF-classement-poulepf.php?idtournoi=<?php echo $idTournoi; ?>&numphasefinale=<?php echo $numPhaseFinale; ?>" uk-icon="print"></a>
							<?php } ?>

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
									
									
									<?php
									if($typePhaseFinale == 'arbre'){ ?>
										<div style="display:inline-block;width: 22%">Place</div>
										<div style="display:inline-block;width: 22%">N°Equipe</div>
										<div style="display:inline-block;width: 50%">Nom équipe</div>
									<?php }
									if($typePhaseFinale == 'poule'){ ?>
										<div style="display:inline-block;width: 10%">Place</div>
										<div style="display:inline-block;width: 10%">N°Equipe</div>
										<div style="display:inline-block;width: 30%">Nom équipe</div>
										<div style="display:inline-block;width: 8%">V</div>
										<div style="display:inline-block;width: 8%">Pts Pour</div>
										<div style="display:inline-block;width: 8%">Pts Contre</div>
										<div style="display:inline-block;width: 8%">Diff</div>
									<?php
									}
									?>
	
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
			if($typePhaseFinale == 'arbre'){
				echo "<tr id=\"idplace-". $row['class_place'] ."\">
						<td style=\"with:100%\">
							<div style=\"display:inline-block;width: 22%\" >". $row['class_place'] ."</div>
							<div style=\"display:inline-block;width: 22%\" >". $row['class_numequipe'] ."</div>
							<div style=\"display:inline-block;width: 50%\" >". $nomEquipe ."</div>
						</td>
					</tr>";
			}
			
			if($typePhaseFinale == 'poule'){
			
			$infosEquipePoulePF = infosEquipePoulePF($row['class_numequipe']);
			$nbVictoires = $infosEquipePoulePF['nb_victoires'];
			$ptsPour = $infosEquipePoulePF['pts_pour'];
			$ptsContre = $infosEquipePoulePF['pts_contre'];
			$ptsDiff = $infosEquipePoulePF['pts_diff'];


				echo "<tr id=\"idplace-". $row['class_place'] ."\">
						<td style=\"with:100%\">
							<div style=\"display:inline-block;width: 10%\" >". $row['class_place'] ."</div>
							<div style=\"display:inline-block;width: 10%\" >". $row['class_numequipe'] ."</div>
							<div style=\"display:inline-block;width: 30%\" >". $nomEquipe ."</div>
							<div style=\"display:inline-block;width: 8%\" >". $nbVictoires ."</div>
							<div style=\"display:inline-block;width: 8%\" >". $ptsPour ."</div>
							<div style=\"display:inline-block;width: 8%\" >". $ptsContre ."</div>
							<div style=\"display:inline-block;width: 8%\" >". $ptsDiff ."</div>
						</td>
					</tr>";
			}
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