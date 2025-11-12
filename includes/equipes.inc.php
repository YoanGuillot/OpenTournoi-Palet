<?php
defined('_LPDT') or die;
$infosPhase = infosPhase();
$listeEquipes = listeEquipes();
if($infosTournoi['max_equipes'] != 0 && $nbEquipes >= $infosTournoi['max_equipes']){
	$disableCreerButton = "disabled";
}else{
	$disableCreerButton = "";
}
?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
					
	<!-- panel -->
	<div class="uk-width-1-1">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Créer une équipe</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<form method="POST">
							<input type="hidden" name="idTournoi" value="<?php echo $idTournoi; ?>"></input>
							<input type="hidden" name="action" value="cloturerInscriptions"></input>
							<?php if ($infosTournoi['statut_inscriptions'] != "ferme"){ ?>
							<button type="submit" class="uk-button uk-button-danger uk-margin-right"><span style="margin-right: 5px;vertical-align: text-bottom" uk-icon="icon: ban"></span> Clôturer les inscriptions</button></form>
							<?php }else{
									echo "<p style=\"color:red; font-weight: bold;\">Les inscriptions sont closes</p>";
							}
							?>
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div >
					<form action="index.php?idtournoi=<?php echo $idTournoi; ?>&page=equipes" class="uk-form" method="POST">
					<?php if ($infosTournoi['statut_inscriptions'] != "ferme"){ ?>
					<table class="uk-table uk-table-striped">
						<thead>
							<tr>
								<th style="width: 20%">Nom équipe <span style="color:red">*</span></th>
								<th style="width: 20%">Joueur 1</th>
								<th style="width: 20%">Joueur 2</th>
								<th style="width: 20%">Joueur 3</th>
								<th style="width: 10%">Actions</th>
							</tr>
						</thead>
							<td><input name="nomEquipe" class="uk-input uk-form-width-medium" type="text" required autofocus <?php echo $disableCreerButton; ?>></td>
							<td><input name="joueur1" class="uk-input uk-form-width-medium" type="text" <?php echo $disableCreerButton; ?>></td>
							<td><input name="joueur2" class="uk-input uk-form-width-medium" type="text" <?php echo $disableCreerButton; ?>></td>
							<td><input name="joueur3" class="uk-input uk-form-width-medium" type="text" <?php echo $disableCreerButton; ?>></td>
							<input type="hidden" name="action" class="uk-input" value="creationEquipe">
							<td><button style="background-color: mediumseagreen;color: #ffffff;" class="uk-button uk-margin-left" <?php echo $disableCreerButton; ?>><span style="margin-right: 5px;" uk-icon="plus-circle"></span> Créer</button></td>
					<?php } ?>
					</table>	
					</form>	
					<p><span style="color:red">* </span> champs obligatoires</p>					
				</div>
			</div>
			
		</div>
	</div>
	<!-- /panel -->
	<!-- panel -->
	<div class="uk-width-1-1">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Equipes inscrites : <?php echo $nbEquipes; ?> </h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						<a href="PDF-equipes.php?idtournoi=<?php echo $idTournoi; ?>"><button class="uk-button uk-button-primary uk-margin-right" ><span uk-icon="print"></span> IMPRIMER</button></a>
						
						<button class="uk-button importBouton">Importer<span uk-icon="triangle-down"></span></button>
						<div uk-dropdown="pos: bottom-center;animation: slide-top; animate-out: true; duration: 700;">
						<!---	<a class="uk-float-left" href="exportEquipes-xlsx.php?idtournoi=<?php echo $idTournoi; ?>"><img src="images/xlsx.png" /></a>
							<a class="uk-float-right" href="exportEquipes-csv.php?idtournoi=<?php echo $idTournoi; ?>"><img src="images/csv.png" /></a> --->

							<form action="importEquipes-csv.php?idtournoi=<?= $idTournoi ?>" method="post" enctype="multipart/form-data">
								<h3>Importer des équipes (CSV)</h3>
								<input class="parcourirBouton" type="file" name="fichier_csv" accept=".csv" required>
								<button type="submit">Importer CSV</button>
							</form>

							<form action="importEquipes-xlsx.php?idtournoi=<?= $idTournoi ?>" method="post" enctype="multipart/form-data">
								<h3>Importer des équipes (XLSX)</h3>
								<input class="parcourirBouton" type="file" name="fichier_xlsx" accept=".xlsx" required>
								<button type="submit">Importer XLSX</button>
							</form>



						</div>
						
						<button class="uk-button exportBouton">Exporter<span uk-icon="triangle-down"></span></button>
						<div uk-dropdown="pos: bottom-center;animation: slide-top; animate-out: true; duration: 700;">
							<a class="uk-float-left" href="exportEquipes-xlsx.php?idtournoi=<?php echo $idTournoi; ?>"><img src="images/xlsx.png" /></a>
							<a class="uk-float-right" href="exportEquipes-csv.php?idtournoi=<?php echo $idTournoi; ?>"><img src="images/csv.png" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
					<table class="uk-table uk-table-striped">
						<thead>
							<tr>
								<th style="width: 100%">
									
									<div style="display:inline-block;width: 10%">N°Equipe</div>
									<div style="display:inline-block;width: 17%">Nom équipe</div>
									<div style="display:inline-block;width: 15%">Joueur 1</div>
									<div style="display:inline-block;width: 15%">Joueur 2</div>
									<div style="display:inline-block;width: 15%">Joueur 3</div>
									<div style="display:inline-block;width: 6%">Bonus Qualifs</div>
									<div style="display:inline-block;width: 10%">Actions</div>
								</th>
							</tr>
						</thead>
<?php
	
	$numEquipe = 1;
	
	if(!empty($listeEquipes)){
		foreach($listeEquipes as $row) {
			
			if(empty($infosPhase)){
				$deleteEquipe = "<a style=\"color: red\" onclick=\"supprEquipe(" .$idTournoi ."," .$row['id_equipe'] .")\" uk-icon=\"trash\" uk-toggle=\"target: #supprEquipe\"></a>";
			}else{
				$deleteEquipe = "";
			}
			echo "<tr id=\"idequipe-". $row['id_equipe'] ."\">
					<td style=\"with:100%\">
					<form id=\"formEquipe-". $row['id_equipe'] ."\" class=\"uk-form\" method=\"POST\" action=\"index.php?idtournoi=$idTournoi&page=equipes\">
						
						<div style=\"display:inline-block;width: 10%\" >". $numEquipe ."</div>
						<div style=\"display:inline-block;width: 17%\" ><input name=\"nomEquipe\" class=\"uk-input\" value=\"". $row['nom_equipe'] ."\"></input></div>
						<div style=\"display:inline-block;width: 15%\" ><input name=\"joueur1\" class=\"uk-input\" value=\"". $row['joueur1'] ."\"></input></div>
						<div style=\"display:inline-block;width: 15%\" ><input name=\"joueur2\" class=\"uk-input\" value=\"". $row['joueur2'] ."\"></input></div>
						<div style=\"display:inline-block;width: 15%\" ><input name=\"joueur3\" class=\"uk-input\" value=\"". $row['joueur3'] ."\"></input></div>
						<div style=\"display:inline-block;width: 6%\" ><input name=\"bonusQualifs\" class=\"uk-input\" value=\"". $row['bonus_qualifs'] ."\"></input></div>
						
						<div style=\"display:inline-block;width: 10%\" >
							<input type=\"hidden\" name=\"idEquipe\" value=\"". $row['id_equipe'] ."\" />
							<input type=\"hidden\" name=\"numEquipe\" value=\"". $numEquipe ."\" />
							<input type=\"hidden\" name=\"idTournoi\" value=\"". $idTournoi. "\" />
							<input type=\"hidden\" name=\"action\" value=\"miseajourEquipe\" />
							<a style=\"color: green\" href=\"javascript:document.getElementById('formEquipe-". $row['id_equipe'] ."').submit();\" class=\"uk-margin-medium-right\"  uk-icon=\"check\"></a>
							". $deleteEquipe ."
						</div>
					</form>
					</td>
				</tr>";
				updateNumEquipe($row['id_equipe'], $numEquipe);
				$numEquipe = $numEquipe +1;
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

<div id="supprEquipe" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title uk-text-center"><span uk-icon="icon: warning; ratio: 2"></span> ATTENTION <span uk-icon="icon: warning; ratio: 2"></span></h2>
        <p>Vous allez supprimer cette équipe. Cette action n'est pas réversible.<br /><br />Souhaitez vous continuer ?</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Annuler</button>
            <a id="supprEquipeBouton" href="#" class="uk-button uk-button-primary" style="background-color: red" type="button">Supprimer l'équipe</a>
        </p>
    </div>
</div>

<?php 
if ($infosTournoi['statut_inscriptions'] == "ferme"){
?>
<script>
	$(document).ready(function() {
		$('input').attr('disabled', true);
		$('a.uk-icon').css("display", 'none');
		// $('.importBouton').css("display", 'none');
		$('.parcourirBouton').attr("disabled", false);
		$('.visible-inline').css("display", 'inline-block');
		
		
	});
</script>
<?php } ?>
