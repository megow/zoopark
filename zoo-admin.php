<?php require("config.php"); ?>
<?php require("function.php"); ?>


<section class="login">
	<form action="connexion.php" method="post">

		<label for="user">User</label>
		<input type="text" name="user" id="user">

		<label for="pass">Mot de passe</label>
		<input type="password" name="pass" id="pass">
		<input type="submit" id="log" value="envoyer">
	</form>
</section>

