<?php

if(isset($_POST['action'])){
	
	
		if ($_POST['action'] == 'creationTournoi'){
				$nomTournoi = $_POST['nomTournoi'];
				$idTournoi = date('YmdHis');
				$idTournoi = intval($idTournoi);
				copy('./includes/conf/models/idtournoi.db', './includes/conf/'. $idTournoi .'.db');
				$db->exec("INSERT INTO tournois (id_tournoi, nom_tournoi) VALUES ('". $idTournoi ."', '". $nomTournoi ."')");
				
				//Connexion à la nouvelle base de donnée
				$db = new SQLite3('includes/conf/'. $idTournoi .'.db');
				$db->exec("INSERT INTO tournois (id_tournoi, nom_tournoi) VALUES ('". $idTournoi ."', '". $nomTournoi ."')");
				//$idTournoi = dernierTournoi();
				
				header("Location: index.php?idtournoi=$idTournoi");
		}

		if ($_POST['action'] == 'creationEquipe'){
					$nomEquipe = $_POST['nomEquipe'];
					$joueur1 = $_POST['joueur1'];
					$joueur2 = $_POST['joueur2'];
					$joueur3 = $_POST['joueur3'];
					$db->exec("INSERT INTO equipes (nom_equipe, joueur1, joueur2, joueur3) VALUES ('". $nomEquipe ."', '". $joueur1 ."', '". $joueur2 ."', '". $joueur3 ."')");
					
					header("Location: index.php?idtournoi=$idTournoi&page=equipes");
		}

		if ($_POST['action'] == 'miseajourEquipe'){
					$idTournoi = $_POST['idTournoi'];
					$idEquipe = $_POST['idEquipe'];
					$numEquipe = $_POST['numEquipe'];
					$nomEquipe = $_POST['nomEquipe'];
					$joueur1 = $_POST['joueur1'];
					$joueur2 = $_POST['joueur2'];
					$joueur3 = $_POST['joueur3'];
					$bonusQualifs = $_POST['bonusQualifs'];
					$db->exec("UPDATE equipes SET num_equipe = \"$numEquipe\", nom_equipe = \"$nomEquipe\", joueur1 = \"$joueur1\", joueur2 = \"$joueur2\", joueur3 = \"$joueur3\", bonus_qualifs = \"$bonusQualifs\" WHERE id_equipe == '$idEquipe'");
					
					header("Location: index.php?idtournoi=$idTournoi&page=equipes");
		}
		
		if ($_POST['action'] == 'miseajourParametres'){
					$idTournoi = $_POST['idTournoi'];
					$maxEquipes = $_POST['maxEquipes'];
					$typePhasesFinales = $_POST['typePhasesFinales'];
					$ptsQualifs = $_POST['ptsQualifs'];
					$ptsPhasesFinales = $_POST['ptsPhasesFinales'];
					$ptsFinales = $_POST['ptsFinales'];
					$db->exec("UPDATE tournois SET max_equipes = \"$maxEquipes\", type_phasesfinales = \"$typePhasesFinales\", pts_qualifs = \"$ptsQualifs\", pts_phasesfinales = \"$ptsPhasesFinales\", pts_finales = \"$ptsFinales\" WHERE id_tournoi == '$idTournoi'");
					
					header("Location: index.php?idtournoi=$idTournoi&page=parametres");
		}
		
		if ($_POST['action'] == 'miseajourMatchQualif'){
					$idTournoi = $_POST['idTournoi'];
					$idMatchQualif = $_POST['idMatchQualif'];
					$score1 = $_POST['score1'];
					$score2 = $_POST['score2'];
					$db->exec("UPDATE matchs_qualifs SET score1 = \"$score1\", score2 = \"$score2\" WHERE id_matchqualif == '$idMatchQualif'");
				
					header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
		}


		if ($_POST['action'] == 'miseajourMatchPhaseFinale'){
					$numPhaseFinale = $_POST['numPhaseFinale'];
					$idPhaseFinale = $_POST['idPhaseFinale'];
					$idTournoi = $_POST['idTournoi'];
					$position1 = $_POST['position1'];
					$position2 = $_POST['position2'];
					$score1 = $_POST['score1'];
					$score2 = $_POST['score2'];

					$db->exec("UPDATE positions_phasesfinales SET position_score = \"$score1\" WHERE num_phasefinale == '$numPhaseFinale' AND position_label == \"$position1\"");
					$db->exec("UPDATE positions_phasesfinales SET position_score = \"$score2\" WHERE num_phasefinale == '$numPhaseFinale' AND position_label == \"$position2\"");
		
			header("Location: index.php?idtournoi=$idTournoi&idphase=$idPhaseFinale&page=matchsphasesfinales");
}

		if ($_POST['action'] == 'cloturerInscriptions'){
					$idTournoi = $_POST['idTournoi'];
					//Attribution des numéros d'équipe dans la base
					$listeEquipes = listeEquipes($idTournoi);
					$numEquipe = 1;
					foreach($listeEquipes as $row) {
						$idEquipe = $row['id_equipe'];
						$db->exec("UPDATE equipes SET num_equipe = \"$numEquipe\" WHERE id_equipe == '$idEquipe'");					
						$numEquipe = $numEquipe +1;
					}
					
					$db->exec("UPDATE tournois SET statut_inscriptions = \"ferme\", statut_qualifs = \"encours\" WHERE id_tournoi == '$idTournoi'");
					
					header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
		}

		if ($_POST['action'] == 'cloturerPhasesQualifs'){
					$idTournoi = $_POST['idTournoi'];
					$db->exec("UPDATE tournois SET statut_inscriptions = \"ferme\", statut_qualifs = \"ferme\", statut_phasesfinales = \"encours\" WHERE id_tournoi == '$idTournoi'");
					
					header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
		}

			
		if ($_POST['action'] == 'impression'){
			require 'includes/lib/fpdf/fpdf.php';
			
			if($_POST['element'] == 'classementQualifs'){
					echo "Impression Classement Qualifs !";
					//A faire : Générer le classement PDF
			}
			
		}

		if ($_POST['action'] == 'restauration'){
			$nomTournoi = $_POST['nomTournoi'];
			 /**
			 * function formatFileName
			 * @access public
			 * @param string - nom de fichier à formater
			 * @param int - longueur maximale autorisée pour le nom de fichier
			 * @return string - nom de fichier formaté
			 * @desc Tronque éventuellement le nom de fichier, le convertit en minuscules et
			 *           y élimine les caractères potentiellement dangereux.
			 */         
			function formatFileName($aFileName, $aMaxLength = 50) {
				$aFileName = strToLower(subStr($aFileName, 0, $aMaxLength));
     			$aFileName = ereg_replace('[^a-zA-Z,._\+\()\-]', '', $aFileName);
				
				return $aFileName;
			} // end of function formatFileName() /2

			/* PARAMETRES DE CONFIGURATION DU SCRIPT
			*/
			
			// chemin d'accès au répertoire d'upload (vers où le fichier uploadé temporaire sera transféré)
			// ce répertoire doit EXISTER et être ACCESSIBLE EN ECRITURE !!
			$destination_dir = './includes/conf';
			
			// taille maximale en octets du fichier à uploader
			$file_max_size = 10000000;
			
			// extensions de fichiers autorisées
			$authorized_extensions = array('db');

			
			/* TRAITEMENT PRINCIPAL
			*/   
			
			// vérifie l'existence du répertoire de destination
			if (!is_dir($destination_dir)) {
				echo 'Veuillez indiquer un r&eacute;pertoire destination correct !';
				die(); 
			}

			// vérifie que répertoire de destination a des droits en écriture
			if (!is_writeable($destination_dir)) {
				echo 'Veuillez spécifier des droits en écriture pour le r&eacute;pertoire destination !';
				die();      
			}   
			
			// réception du formulaire
			if (isSet($_POST['submitFile'])) {

				// vérifie qu'un fichier a bien été soumis
				if (isSet($_FILES) && is_array($_FILES)) {
			
				// pas d'erreur lors de l'upload
				if ($_FILES['aFile']['error'] == UPLOAD_ERR_OK) {
					
					// vérifie la taille en octets
					if ($_FILES['aFile']['size'] <= $file_max_size) {

					// vérifie l'extension du fichier recu
					// il est aussi possible (et sans doute mieux) de se baser sur $_FILES['aFile']['type']
					// qui retourne le type MIME correspondant (par exemple: image/pjpeg)         
					$lastPos = strRChr($_FILES['aFile']['name'], ".");
					if ($lastPos !== false && in_array(strToLower(subStr($lastPos, 1)), $authorized_extensions)) {
			
						// définit un nom de fichier destination unique à partir du nom du fichier original formaté
						//$destination_file = time().formatFileName($_FILES['aFile']['name']);            
						$destination_file = $_FILES['aFile']['name'];            

						// déplace le fichier uploadé du répertoire temporaire
						// vers les répertoire/fichier destination spécifiés
						if (move_uploaded_file($_FILES['aFile']['tmp_name'],
													$destination_dir.DIRECTORY_SEPARATOR.$destination_file)) {
						echo 'Fichier valide et upload&eacute; correctement.'; 
						
						$db = new SQLite3('includes/conf/tournois.db');
						$fileArray = explode('.',$destination_file,-1);
						$fileNameTournoi = $fileArray[0];
						$db->exec("INSERT INTO tournois (id_tournoi, nom_tournoi) VALUES ('". $fileNameTournoi ."', '". $nomTournoi ."')");
						

						} else { // error sur move_uploaded_file
						echo 'Le fichier n\'a pas &eacute;t&eacute; upload&eacute; correctement !';
						}
					} else { // pas d'extension ou mauvaise extension
						echo 'Mauvaise extension !';
					}      
					} else { // Taille maximale dépassée
					echo 'Fichier trop volumineux !';
					}
				} else { // Erreur lors de l'upload
					switch ($_FILES['aFile']['error']){
					case UPLOAD_ERR_INI_SIZE:
						echo 'Le fichier upload&eacute; d&eacute;passe la valeur sp&eacute;cifi&eacute;e 
								pour upload_max_filesize dans php.ini.';
						break;
					case UPLOAD_ERR_FORM_SIZE:
						echo 'Le fichier upload&eacute; d&eacute;passe la valeur sp&eacute;cifi&eacute;e
								pour MAX_FILE_SIZE dans le formulaire d\'upload.';
						break;
					case UPLOAD_ERR_PARTIAL:
						echo 'Le fichier n\'a &eacute;t&eacute que partiellement upload&eacute;.';
						break;                            
					default:
						echo 'Aucun fichier n\'a &eacute;t&eacute upload&eacute;.';
					} // switch
				}   
				} else { // aucun fichier reçu
				echo 'Pas de fichier recu';
				}
			} // fin de réception de formulaire
			header("Location: index.php");
		}
}



if(isset($_GET['action'])){
			
		if($_GET['action'] == 'supprequipe'){

			$idEquipe = $_GET['idequipe'];
			$db->exec("DELETE FROM equipes WHERE id_equipe == ". $idEquipe ."");
			
			header("Location: index.php?idtournoi=$idTournoi&page=equipes");			
		}
		
		if($_GET['action'] == 'supprtournoi'){
			//Connexion à la base de donnée
			$db->close();
			$db = new SQLite3('includes/conf/tournois.db');
			$db->exec("DELETE FROM tournois WHERE id_tournoi == ". $idTournoi ."");
			unlink('./includes/conf/'. $idTournoi .'.db');
		
			header("Location: index.php");			
		}

		if($_GET['action'] == 'lockphasequalif'){
			$numPhase = $_GET['numphase'];
			$db->exec("UPDATE phases_qualif SET phasequalif_locked = '1' WHERE num_phase == '$numPhase'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
		}
		
		if($_GET['action'] == 'unlockphasequalif'){
			$numPhase = $_GET['numphase'];
			$db->exec("UPDATE phases_qualif SET phasequalif_locked = '0' WHERE num_phase == '$numPhase'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=qualifs");
		}
		
		if($_GET['action'] == 'supprphasequalif'){
			
			$db->exec("DELETE FROM phases_qualif WHERE id_tournoi == ". $idTournoi ." AND num_phase == ". $_GET['phasequalif'] ."");
			
			header("Location: index.php?idtournoi=$idTournoi&page=qualifs");			
		}
		
		if($_GET['action'] == 'supprphasefinale'){
			
			
			//mettre a jour la dispo finale
			
				global $db;
				$resultats = $db->query('SELECT * FROM matchs_phasesfinales WHERE num_phasefinale == '. $_GET['phasefinale'] .'');
				while ($row = $resultats->fetchArray(1)) {
					$equipe1 = $row['equipe1'];
					$equipe2 = $row['equipe2'];
										
					$db->exec("UPDATE equipes SET dispo_phasesfinales = '1' WHERE num_equipe == '$equipe1'");
					$db->exec("UPDATE equipes SET dispo_phasesfinales = '1' WHERE num_equipe == '$equipe2'");
					
				}	
			

			$db->exec("DELETE FROM phases_finales WHERE num_phasefinale == ". $_GET['phasefinale'] ."");
			
			header("Location: index.php?idtournoi=$idTournoi&page=phasesfinales");			
		}

		if($_GET['action'] == 'ouvririnscriptions'){

			$db->exec("UPDATE tournois SET statut_inscriptions = \"encours\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
		
		if($_GET['action'] == 'fermerinscriptions'){

			$db->exec("UPDATE tournois SET statut_inscriptions = \"ferme\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
			
			if($_GET['action'] == 'ouvrirqualifs'){

			$db->exec("UPDATE tournois SET statut_qualifs = \"encours\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
		
		if($_GET['action'] == 'fermerqualifs'){

			$db->exec("UPDATE tournois SET statut_qualifs = \"ferme\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
		
				if($_GET['action'] == 'ouvrirfinales'){

			$db->exec("UPDATE tournois SET statut_phasesfinales = \"encours\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
		
		if($_GET['action'] == 'fermerfinales'){

			$db->exec("UPDATE tournois SET statut_phasesfinales = \"ferme\" WHERE id_tournoi == '$idTournoi'");
			
			header("Location: index.php?idtournoi=$idTournoi&page=maintenance");			
		}
			
			
			
			
}



?>