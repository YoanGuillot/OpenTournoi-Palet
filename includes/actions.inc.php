<?php

if(isset($_POST['action'])){
	
	
		if ($_POST['action'] == 'creationTournoi'){
				$nomTournoi = $_POST['nomTournoi'];
				$db->exec("INSERT INTO tournois (nom_tournoi) VALUES ('". $nomTournoi ."')");
				$idTournoi = dernierTournoi();
				header("Location: index.php?idtournoi=$idTournoi");
		}

		if ($_POST['action'] == 'creationEquipe'){
					$nomEquipe = $_POST['nomEquipe'];
					$joueur1 = $_POST['joueur1'];
					$joueur2 = $_POST['joueur2'];
					$joueur3 = $_POST['joueur3'];
					$db->exec("INSERT INTO equipes (id_tournoi, nom_equipe, joueur1, joueur2, joueur3) VALUES ('". $idTournoi ."', '". $nomEquipe ."', '". $joueur1 ."', '". $joueur2 ."', '". $joueur3 ."')");
					
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
					$db->exec("UPDATE equipes SET num_equipe = \"$numEquipe\", nom_equipe = \"$nomEquipe\", joueur1 = \"$joueur1\", joueur2 = \"$joueur2\", joueur3 = \"$joueur3\" WHERE id_equipe == '$idEquipe'");
					
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
}



if(isset($_GET['action'])){
			
		if($_GET['action'] == 'supprequipe'){

			$idEquipe = $_GET['idequipe'];
			$db->exec("DELETE FROM equipes WHERE id_equipe == ". $idEquipe ."");
			
			header("Location: index.php?idtournoi=$idTournoi&page=equipes");			
		}
		
		if($_GET['action'] == 'supprtournoi'){

			$db->exec("DELETE FROM tournois WHERE id_tournoi == ". $idTournoi ."");
			
			header("Location: index.php");			
		}
		
		if($_GET['action'] == 'supprphasequalif'){

			$db->exec("DELETE FROM phases_qualif WHERE id_tournoi == ". $idTournoi ." AND num_phase == ". $_GET['phasequalif'] ."");
			
			header("Location: index.php?idtournoi=$idTournoi&page=qualifs");			
		}
		
		if($_GET['action'] == 'supprphasefinale'){
			
			
			//mettre a jour la dispo finale
			
				global $db;
				$resultats = $db->query('SELECT * FROM matchs_phasesfinales WHERE id_tournoi == '. $idTournoi .' AND num_phasefinale == '. $_GET['phasefinale'] .'');
				while ($row = $resultats->fetchArray(1)) {
					$equipe1 = $row['equipe1'];
					$equipe2 = $row['equipe2'];
										
					$db->exec("UPDATE equipes SET dispo_phasesfinales = \"oui\" WHERE id_tournoi == '$idTournoi' AND num_equipe == '$equipe1'");
					$db->exec("UPDATE equipes SET dispo_phasesfinales = \"oui\" WHERE id_tournoi == '$idTournoi' AND num_equipe == '$equipe2'");
					
				}	
			

			$db->exec("DELETE FROM phases_finales WHERE id_tournoi == ". $idTournoi ." AND num_phasefinale == ". $_GET['phasefinale'] ."");
			
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