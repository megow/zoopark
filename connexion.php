<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php

	if(isset($_GET['delog'])) : //pas de session_destroy, car on doit encore garder certaines infos comme la langue | on supprime uniquement l'entrée ['auteurs']
		unset($_SESSION['zoo_admins']);
		header("location:index.php");
		exit;
	endif;

 $connexion = sprintf("SELECT user, pass, id_zoo_admins FROM zoo_admins WHERE user ='%s' AND pass='%s'",
		$_POST['user'],
		$_POST['pass']
		);

	$connexion_request = $db_connect->query($connexion);
	echo $db_connect->error;

	while($connex = $connexion_request->fetch_object()):
		$allRowsConnex[] = $connex;
	endwhile;

	$connexion_request->num_rows; // num_rows de la requete | pussyofmars@hot.com = 1

	if($connexion_request->num_rows>0):
		$thisConnex = $allRowsConnex[0];
		$_SESSION['zoo_admins']['id_zoo_admins'] = $thisConnex-> id_zoo_admins ;
		$_SESSION['zoo_admins']['user'] = $thisConnex-> user ;
		header("location:index.php");
		exit;
	else :
		header("location:index.php?error=log");
		exit;
	endif;
?>

