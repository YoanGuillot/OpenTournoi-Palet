<?php
defined('_LPDT') or die;

?>


<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
					
	<!-- panel -->
	<div class="uk-width-1-2@xl">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Paramètres du tournoi</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div >
					<form action="index.php?idtournoi=<?php echo $idTournoi; ?>&page=parametres" class="uk-form" method="POST">
							
							<div class="uk-margin">
								<span style="font-weight: bold;">Limite nombre d'équipe : </span>
								<select name="maxEquipes" class="uk-select uk-form-width-small">
									<option value="0"<?php if ($infosTournoi['max_equipes'] == '0'){ echo " selected";} ?>>Non limité</option>
									<option value="8"<?php if ($infosTournoi['max_equipes'] == '8'){ echo " selected";} ?>>8</option>
									<option value="12"<?php if ($infosTournoi['max_equipes'] == '12'){ echo " selected";} ?>>12</option>
									<option value="16"<?php if ($infosTournoi['max_equipes'] == '16'){ echo " selected";} ?>>16</option>
									<option value="20"<?php if ($infosTournoi['max_equipes'] == '20'){ echo " selected";} ?>>20</option>
									<option value="24"<?php if ($infosTournoi['max_equipes'] == '24'){ echo " selected";} ?>>24</option>
									<option value="28"<?php if ($infosTournoi['max_equipes'] == '28'){ echo " selected";} ?>>28</option>
									<option value="32"<?php if ($infosTournoi['max_equipes'] == '32'){ echo " selected";} ?>>32</option>
									<option value="36"<?php if ($infosTournoi['max_equipes'] == '36'){ echo " selected";} ?>>36</option>
									<option value="40"<?php if ($infosTournoi['max_equipes'] == '40'){ echo " selected";} ?>>40</option>
									<option value="44"<?php if ($infosTournoi['max_equipes'] == '44'){ echo " selected";} ?>>44</option>
									<option value="48"<?php if ($infosTournoi['max_equipes'] == '48'){ echo " selected";} ?>>48</option>
									<option value="52"<?php if ($infosTournoi['max_equipes'] == '52'){ echo " selected";} ?>>52</option>
									<option value="56"<?php if ($infosTournoi['max_equipes'] == '56'){ echo " selected";} ?>>56</option>
									<option value="60"<?php if ($infosTournoi['max_equipes'] == '60'){ echo " selected";} ?>>60</option>
									<option value="64"<?php if ($infosTournoi['max_equipes'] == '64'){ echo " selected";} ?>>64</option>
									<option value="68"<?php if ($infosTournoi['max_equipes'] == '68'){ echo " selected";} ?>>68</option>
									<option value="80"<?php if ($infosTournoi['max_equipes'] == '80'){ echo " selected";} ?>>80</option>
									<option value="96"<?php if ($infosTournoi['max_equipes'] == '96'){ echo " selected";} ?>>96</option>
									<option value="128"<?php if ($infosTournoi['max_equipes'] == '128'){ echo " selected";} ?>>128</option>
									<option value="144"<?php if ($infosTournoi['max_equipes'] == '144'){ echo " selected";} ?>>144</option>
									<option value="160"<?php if ($infosTournoi['max_equipes'] == '160'){ echo " selected";} ?>>160</option>
								</select>
							</div>
							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Type de phases finales : </span>
								<select name="typePhasesFinales" class="uk-select uk-form-width-small">
									<option value="aleatoire"<?php if ($infosTournoi['type_phasesfinales'] == 'aleatoire'){ echo " selected";} ?>>Aléatoire</option>
									<option value="tetedeserie"<?php if ($infosTournoi['type_phasesfinales'] == 'tetedeserie'){ echo " selected";} ?> disabled>Tête de série (indisponible)</option>
								</select>
							</div>
							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Type de classement pour les phases qualificatives : </span>
								<div class="uk-margin-left uk-form-controls">
            						<label><input class="uk-radio btRadioDef" type="radio" value="CF"name="classType" <?php if ($infosTournoi['type_classement'] == 'CF'){ echo " checked";} ?>> <span style="font-style: italic;">Coupe France : </span>  Nb de Victoires - Pts Pour - Différence (Goalaverage)</label><br>
           							<label><input class="uk-radio btRadioDef" type="radio" value="Challenge17" name="classType" <?php if ($infosTournoi['type_classement'] == 'Challenge17'){ echo " checked";} ?>><span style="font-style: italic;"> Challenge 17 : </span>  Nb Victoires - Différence (Goalaverage)</label><br>
           							<label><input class="uk-radio btRadioPerso" type="radio" value="Perso" name="classType" <?php if ($infosTournoi['type_classement'] == 'Perso'){ echo " checked";} ?>><span style="font-style: italic;"> Personnalisé</span></label><br>
								</div>	
								<br>
								<div id="classPersoDiv" style="display:none;"><span>Ordre de Classement personnalisé :</span><br>
									<div class="uk-margin-left">
										1- <select class="uk-width-medium uk-select" name="classPerso1"><option value="nbvictoires" <?php if ($infosTournoi['type_classperso1'] == 'nbvictoires'){ echo " selected";} ?>>Nb de Victoires</option><option value="ptspour" <?php if ($infosTournoi['type_classperso1'] == 'ptspour'){ echo " selected";} ?>>Pts Pour (DESCENDANT)</option><option value="ptscontre" <?php if ($infosTournoi['type_classperso1'] == 'ptscontre'){ echo " selected";} ?>>Pts Contre (ASCENDANT)</option><option value="diff" <?php if ($infosTournoi['type_classperso1'] == 'diff'){ echo " selected";} ?>>Différence (Goalaverage DESCENDANT)</option></select><br>
										2- <select class="uk-width-medium uk-select" name="classPerso2"><option value="aucun" <?php if ($infosTournoi['type_classperso2'] == 'aucun'){ echo " selected";} ?>>-- AUCUN --</option><option value="nbvictoires" <?php if ($infosTournoi['type_classperso2'] == 'nbvictoires'){ echo " selected";} ?>>Nb de Victoires</option><option value="ptspour" <?php if ($infosTournoi['type_classperso2'] == 'ptspour'){ echo " selected";} ?>>Pts Pour (DESCENDANT)</option><option value="ptscontre" <?php if ($infosTournoi['type_classperso2'] == 'ptscontre'){ echo " selected";} ?>>Pts Contre (ASCENDANT)</option><option value="diff" <?php if ($infosTournoi['type_classperso2'] == 'diff'){ echo " selected";} ?>>Différence (Goalaverage DESCENDANT)</option></select><br>
										3- <select class="uk-width-medium uk-select" name="classPerso3"><option value="aucun" <?php if ($infosTournoi['type_classperso3'] == 'aucun'){ echo " selected";} ?>>-- AUCUN --</option><option value="nbvictoires" <?php if ($infosTournoi['type_classperso3'] == 'nbvictoires'){ echo " selected";} ?>>Nb de Victoires</option><option value="ptspour" <?php if ($infosTournoi['type_classperso3'] == 'ptspour'){ echo " selected";} ?>>Pts Pour (DESCENDANT)</option><option value="ptscontre" <?php if ($infosTournoi['type_classperso3'] == 'ptscontre'){ echo " selected";} ?>>Pts Contre (ASCENDANT)</option><option value="diff" <?php if ($infosTournoi['type_classperso3'] == 'diff'){ echo " selected";} ?>>Différence (Goalaverage DESCENDANT)</option></select><br>
										4- <select class="uk-width-medium uk-select" name="classPerso4"><option value="aucun" <?php if ($infosTournoi['type_classperso4'] == 'aucun'){ echo " selected";} ?>>-- AUCUN --</option><option value="nbvictoires" <?php if ($infosTournoi['type_classperso4'] == 'nbvictoires'){ echo " selected";} ?>>Nb de Victoires</option><option value="ptspour" <?php if ($infosTournoi['type_classperso4'] == 'ptspour'){ echo " selected";} ?>>Pts Pour (DESCENDANT)</option><option value="ptscontre" <?php if ($infosTournoi['type_classperso4'] == 'ptscontre'){ echo " selected";} ?>>Pts Contre (ASCENDANT)</option><option value="diff" <?php if ($infosTournoi['type_classperso4'] == 'diff'){ echo " selected";} ?>>Différence (Goalaverage DESCENDANT)</option></select><br>
									 </div>
								</div>
							</div>
    			

							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Points d'un match de qualification : </span>
								<select name="ptsQualifs" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_qualifs'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_qualifs'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_qualifs'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Points d'un match de phase finale : </span>
								<select name="ptsPhasesFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_phasesfinales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_phasesfinales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_phasesfinales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Points d'un match de finale : </span>
								<select name="ptsFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_finales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_finales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_finales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>	
							<hr />
							<div class="uk-margin">
								<span style="font-weight: bold;">Points d'un match de petite finale : </span>
								<select name="ptsPetiteFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_petitefinales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_petitefinales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_petitefinales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
							<hr />
							<input type="hidden" name="action" class="uk-input" value="miseajourParametres"></input>
							<input type="hidden" name="idTournoi" class="uk-input" value="<?php echo $idTournoi; ?>"></input>
							<button type="submit" class="uk-button uk-button-primary uk-margin-right">Sauvegarder</button>
					</form>						
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
</div>

<script>

	$(document).ready(function() {
		var persoSelected = $('.btRadioPerso').attr('checked');
		if(persoSelected == 'checked'){
			$('#classPersoDiv').css('display', 'block');
		}
		$('.btRadioDef').on('click', function(){
			$('#classPersoDiv').css('display', 'none');
		});
		$('.btRadioPerso').on('click', function(){
			$('#classPersoDiv').css('display', 'block');
		});


	});

</script>