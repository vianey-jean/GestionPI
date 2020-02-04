<?php
	session_destroy();	

	$titrePage = "";

	$menu = '';
	$connected = false;
	// Mémoriser toute la sortie HTML qui suit à l'aide de la fonction "ob_start()" (en le mettant dans le buffer / Memoire Tampon en fraçais)
	ob_start(); 
	//	Inclure le contenu du fichier v_accueil_public.php
	require('view/v_accueil_public.php');


	// Récupérer les contenus mémorisés et le mettre dans la variable "$content" à l'aide de la fonction "ob_get_clean()"
	$content = ob_get_clean(); 

	$view = "view/template.php";
	
?>