<?php
//	die Sitzung starten bzw. wieder aufnehmen
session_start();

//	von der Sitzung abmelden (Sitzungsarray wird mit einem neuen array() überschrieben)
$_SESSION = array();

//	automatisch auf die Startseite weiterleiten
header('Location: http://php.kluhil.ks/ks.kluhil.php/php-uploads/index.php?seite=1');