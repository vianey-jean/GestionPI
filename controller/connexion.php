<?php
	
	require("model/m_users.php");

	$titrePage = "Page de connexion";
	if(isset($_POST['login'])&&isset($_POST['pwd'])){	

		$login = htmlspecialchars($_POST['login']);		
		$mdp = htmlspecialchars($_POST['pwd']);

		$res = verifAuthentification($db,$login,$mdp);

		if ($res>0) {
			$_SESSION['connected'] = true;
			header("LOcation: index.php?act=page_priv");
		}else{
			$_SESSION['msg'] = "Identifiant ou mot de passe incorrect";
			header("LOcation: index.php?act=conn");
		}
	}

	// Mémoriser toute la sortie HTML qui suit à l'aide de la fonction "ob_start()" (en le mettant dans le buffer / Memoire Tampon en fraçais)
	ob_start(); 
	//	Inclure le contenu du fichier v_accueil_prive.php
	require('view/v_connexion.php');

	// Récupérer les contenus mémorisés et le mettre dans la variable "$content" à l'aide de la fonction "ob_get_clean()"
	$content = ob_get_clean(); 

	$view = "view/template.php";
	
?>