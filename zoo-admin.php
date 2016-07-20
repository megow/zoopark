<?php require("config.php"); ?>
<?php require("function.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Zoopark</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/styles.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/modifications_zooadmin.css">

</head>
<body>
	


<section class="login">
	<form class="formZooadmin" action="connexion.php" method="post">

		<label for="user">User</label>
		<input class="inputZooadmin" type="text" name="user" id="user">

		<label for="pass">Mot de passe</label>
		<input class="inputZooadmin" type="password" name="pass" id="pass">
		<input type="submit" id="log" value="envoyer">
	</form>
</section>
</body>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/modifications.js"></script>

</body>
</html>