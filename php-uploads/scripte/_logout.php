<?php
//	die Sitzung starten bzw. wieder aufnehmen
session_start();

//	von der Sitzung abmelden
$_SESSION['angemeldet'] = false;

//	automatisch auf die Startseite weiterleiten
header('Location: http://php.kluhil.ks/ks.kluhil.php/php_sessions/index.php?seite=1');