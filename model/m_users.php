<?php
	function creerUser($db,$nomStag,$prenomStag,$dispoStag){
		//Création d'utilisateur
		$createuser = mysqli_query($db, "insert into jm_Stagiaire(nomStag,prenomStag,dispoStag) values('".$nomStag."','".$prenomStag."','".$dispoStag."')");
		return $createuser;
	}

	function verifAuthentification($db,$login,$mdp){

		$res = mysqli_query($db, "select * from jm_Users where login = '".$login."' AND password = '".$mdp."'"); 
		
		$num_lignes = mysqli_num_rows($res);
		return $num_lignes;
	}
?>