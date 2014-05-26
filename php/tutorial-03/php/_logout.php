<?php
//	die Sitzung starten bzw. wieder aufnehmen
session_start();

//	von der Sitzung abmelden
$_SESSION['angemeldet'] = false;
//$_SESSION['angemeldet'] = array();
//session_destroy();

//	automatisch auf die Startseite weiterleiten
header('Location: http://php.kluhil.ks/ks.kluhil.php/php/tutorial-03/index.php?seite=1');