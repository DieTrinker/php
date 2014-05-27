<h1>Anmelden</h1>

<?php

//echo $_SESSION['angemeldet']."<br>";
?>

<form action="php/_login.php" method="post">

<label for="user">
Benutzer:
<br />
<input type="text" name="user" id="user" />
</label>
<br />
<br />
<label for="pass">
Passwort:
<br />
<input type="password" name="pass" id="pass" />
</label>
<br />
<br />
<input type="submit" name="login" id="login" value="anmelden" />
</form>