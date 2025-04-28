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
								<span>Limite nombre d'équipe : </span>
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
							
							<div class="uk-margin">
								<span>Type de phases finales : </span>
								<select name="typePhasesFinales" class="uk-select uk-form-width-small">
									<option value="aleatoire"<?php if ($infosTournoi['type_phasesfinales'] == 'aleatoire'){ echo " selected";} ?>>Aléatoire</option>
									<option value="tetedeserie"<?php if ($infosTournoi['type_phasesfinales'] == 'tetedeserie'){ echo " selected";} ?> disabled>Tête de série (indisponible)</option>
								</select>
							</div>
							
							<div class="uk-margin">
								<span>Points d'un match de qualification : </span>
								<select name="ptsQualifs" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_qualifs'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_qualifs'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_qualifs'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
							
							<div class="uk-margin">
								<span>Points d'un match de phase finale : </span>
								<select name="ptsPhasesFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_phasesfinales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_phasesfinales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_phasesfinales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
							
							<div class="uk-margin">
								<span>Points d'un match de finale : </span>
								<select name="ptsFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_finales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_finales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_finales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>

							<div class="uk-margin">
								<span>Points d'un match de petite finale : </span>
								<select name="ptsPetiteFinales" class="uk-select uk-form-width-small">
									<option value="11"<?php if ($infosTournoi['pts_petitefinales'] == '11'){ echo " selected";} ?>>11</option>
									<option value="13"<?php if ($infosTournoi['pts_petitefinales'] == '13'){ echo " selected";} ?>>13</option>
									<option value="15"<?php if ($infosTournoi['pts_petitefinales'] == '15'){ echo " selected";} ?>>15</option>
								</select>
							</div>
	
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