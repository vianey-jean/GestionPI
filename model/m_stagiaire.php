<?php
	function recListeEtudiant($db){			
		$select_etudiant = mysqli_query($db, "select * from jm_Stagiaire where dispoStag = '0'"); 
		
		if($select_etudiant && $select_etudiant->num_rows>0){
		  $select_etudiant->fetch_all(MYSQLI_ASSOC);
		}
		return $select_etudiant;
	}

	function recListeEtudiantParNom($db,$etudiant_nom){			
		//On récupère la liste des étudiants
     	$select_etudiant_nom = mysqli_query($db, "select * from jm_Stagiaire where idStag = '".$etudiant_nom."'"); 
		
		if($select_etudiant_nom && $select_etudiant_nom->num_rows>0){
		  $select_etudiant_nom->fetch_all(MYSQLI_ASSOC);
		}
		return $select_etudiant_nom;
	}

	function updateEtudiant($db,$idStag){
		//update etudiant id..
		$update_etudiant_dispoStag = mysqli_query($db, "update jm_Stagiaire set dispoStag = '0' where idStag = '".$idStag."'");
	}

	function updateEtudiantDispo($db,$etudiant_nom){
        //update etudiant id..
        $update_etudiant_dispoStag = mysqli_query($db, "update jm_Stagiaire set dispoStag = '1' where idStag = '".$etudiant_nom."'");
	}
?>