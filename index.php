<?php
	
	session_start();

	/***	Définition et initialisation des variables ***/
	$view = "";

	$act = isset($_GET['act'])?$_GET['act']:'';

	$exec = isset($_POST['exec'])?$_POST['exec']:'';

	$connected = isset($_SESSION['connected'])?$_SESSION['connected']:false;
	/*****************************************************/

	//	Connexion à la base
	require("model/m_connexionDB.php");

	/***	Routage		***/
	if($act == "dec"){
		require("controller/deconnexion.php");
	}elseif(!$connected) {
		if($act == "" || $act == "acc_pub"){			
			require("controller/acc_pub.php");
		}elseif ($act == "conn") {
			require("controller/connexion.php");
		}else{
			require("controller/page_403.php");
		}
	}elseif($act == "page_priv" || $act == "computer" || $act == "attributiondeposte" || $act == "user" || $act == "jm_Reservation"){
		require("controller/page_prive.php");
	}else{
		require("controller/page_404.php");
	}
	/*******************/

	// Affichage de vue
	require($view);

?>