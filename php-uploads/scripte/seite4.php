<h1>Anmelden</h1>

<?php

echo $_SESSION['angemeldet']."<br>";
?>

<form
	action="scripte/_login.php"
	method="post">

	<label for="account"> Benutzer: <br /> <input
		type="text"
		name="account"
		id="account" />
	</label> <br /> <br /> <label for="passwort"> Passwort: <br /> <input
		type="password"
		name="passwort"
		id="passwort" />
	</label> <br /> <br /> <input
		type="submit"
		name="login"
		id="login"
		value="anmelden" />
</form>