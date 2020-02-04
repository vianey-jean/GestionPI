<?php

	require("model/m_reservation.php");
	require("model/m_pc.php");
	require("model/m_users.php");
	require("model/m_stagiaire.php");
	
	$titrePage = "Espace Privé";
	//	Récupération liste de stagiaire
	$select_etudiant = recListeEtudiant($db);
	//	Récupération liste de PC
	$select_ordinateur = recListePc($db);
	//	Récupération liste de Reservation
	$select_reservation = recListeReservation($db);

	if( (isset($_GET['act']) && $_GET['act'] == "jm_Reservation") && (isset($_GET['exec']) && $_GET['exec'] == "retirer_ass")) {

		$reservID = $_GET['reservID'];
		//	Récupération de réservation par id
		$select_reserv_f = recReservation($db,$reservID);
		
		//suppression ordinateur id..
		$del_reserv = suppressionPc($db,$reservID);

		if( $del_reserv >= 0) {
			echo 'assignment removed!';

			//update etudiant id..
			updateEtudiant($db,$select_reserv_f['idStagReserv']);

			//update ordinateur id..
			updatePcDispo($db,$select_reserv_f['refPcResev']);

			echo '<script>window.location="index.php?act=jm_Reservation";</script>';
			die;
		}

 	}


 	if( (isset($_GET['act']) && $_GET['act'] == "user") && (isset($_GET['exec']) && $_GET['exec'] == "aj_user")) {

		$nomStag = htmlspecialchars($_POST['nomStag']);
		$prenomStag = htmlspecialchars($_POST['prenomStag']);
		$dispoStag = '0';

		//Création d'utilisateur
		$createuser = creerUser($db,$nomStag,$prenomStag,$dispoStag);

		if( $createuser ) {
			echo 'user created!';
			echo '<script>window.location="index.php?act=user";</script>';
			die;
 		}

  	}

  	if( (isset($_GET['act']) && $_GET['act'] == "computer" ) && (isset($_GET['exec']) && $_GET['exec'] == "attr_computer")){

      $etudiant_nom = $_POST['etudiant_nom'];
      
      //On récupère la liste des étudiants
      $select_etudiant_nom = recListeEtudiantParNom($db,$etudiant_nom);

      foreach ($select_etudiant_nom as $etudiant) {
	      $nomStagReserv = $etudiant['nomStag'];
	      $prenomStagReserv = $etudiant['prenomStag'];
      }
      
      $horaireResev = $_POST['horaireResev'];

      $idPc = $_POST['idPc'];
      //	Récupérer pc par son id
      $select_idPc = recListePcById($db,$idPc);

      $assigncomp;

      foreach ($select_idPc as $pc) {
      	$colResev = $pc['refPc'];
		//Assigner PC
	    $assigncomp = assignerPc($db,$etudiant_nom,$nomStagReserv,$prenomStagReserv,$horaireResev,$idPc,$colResev);
      }

      if( $assigncomp ) {
        echo 'assign computer!'; 

    	//update etudiant id..
		updateEtudiantDispo($db,$etudiant_nom);

		//update ordinateur id..
		updatePcNonDispo($db,$idPc);


        echo '<script>window.location="index.php?act=attributiondeposte";</script>';
        die;
      } 
    }

	// Mémoriser toute la sortie HTML qui suit à l'aide de la fonction "ob_start()" (en le mettant dans le buffer / Memoire Tampon en fraçais)
	ob_start(); 
	//	Inclure le contenu du fichier v_accueil_prive.php
	require('view/v_page_prive.php');

	// Récupérer les contenus mémorisés et le mettre dans la variable "$content" à l'aide de la fonction "ob_get_clean()"
	$content = ob_get_clean(); 

	$view = "view/template.php";
	
?>