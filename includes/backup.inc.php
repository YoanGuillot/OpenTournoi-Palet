<?php
defined('_LPDT') or die;
?>

<div class="uk-grid uk-grid-medium" data-uk-grid uk-sortable="handle: .sortable-icon">
		<div style="font-weight: bold" class="uk-width-1-1">Fonctionnalités de sauvegarde et de restauration de l'ensemble des tournois.</div>			
	<!-- panel -->
	<div class="uk-width-1-2">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Sauvegarde</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
			<div class="uk-panel uk-text-center">
            <a href="./includes/conf/tournois.db" class="uk-icon-link" title="Cliquez pour télécharger une sauvegarde" data-uk-tooltip data-uk-icon="icon: download;ratio: 3"></a><br />Télécharger la sauvegarde
            </div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		<!-- panel -->
	<div class="uk-width-1-2">
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-header">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-auto"><h4>Restaurer une sauvegarde</h4></div>
					<div class="uk-width-expand uk-text-right panel-icons">
						
					</div>
				</div>
			</div>
			<div class="uk-card-body">
				<div uk-overflow-auto>
					<div class="uk-panel uk-text-center">
                    <form name="form" method="post" action="page_receptrice.php" enctype="multipart/form-data">
                        <!-- Taille maximale en octets. Non sécurisé car facilement contournable !! -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        
                        <input type="file" name="aFile" />
                        <br />
                        <br />
                        <input type="submit" name="submitFile" value="restaurer la sauvegarde" />
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- /panel -->
		
</div>
