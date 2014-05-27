<h1>Willkommen auf meiner Webseite</h1>
<?php
	//	wir geben testweise das superglobale Array $_SESSION[] aus
	var_dump($_SESSION);
	
	//	wir speichern etwas in der Session
	$_SESSION['wetter'] = 'toll';
	echo $_SESSION['angemeldet']."<br>";
?>
