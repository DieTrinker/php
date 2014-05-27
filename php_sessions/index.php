<?php
// wir starten eine neue Sitzung bzw. setzen eine gestartete Sitzung fort
$lebenszeit = 120;

// setzt die Lebenszeit der Cookies auf eine Anzahl in Sekunden
session_set_cookie_params($lebenszeit, 'php_sessions');

session_start();
//echo session_name().": ".session_id();

//	wir tricksen: es wird ein neuer Cookie erzeugt:
//		der genauso heißt, wie der Sitzungscookie
//		den gleichen Inhalt hat(Sitzungs-ID)
//		Aber: dessen Zeitstempel mit jedem Aufruf der Telpmateseite (index.php,
//		so dass nur bei Inaktivität der Cookie tatsächlich altert
setcookie(session_name(), session_id(), time() + $lebenszeit, 'php_sessions');
?>
<html>
	<head>
		<title>PHP Sitzungen</title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		</div>
		<div id="menu">
			<ul id="horizmenue">
			<li><a href="index.php?seite=1">Home</a></li>
			<?php
				if ( $_SESSION [ 'angemeldet' ] == false ) {
			?>
			<li><a href="index.php?seite=2">Anmelden</a></li>
			<?php
			}
			
				if ( $_SESSION [ 'angemeldet' ] == true ) {
			?>
			<li><a href="php/_logout.php">Abmelden</a></li>
			<li><a href="index.php?seite=4">Geheim</a></li>
			<?php
			}
			?>
			</ul>
		</div>
		<div id="content">
			<?php
			
			$seite = "";
			
			if ( isset( $_GET [ 'seite' ] ) )
			    $seite = $_GET [ 'seite' ];
			
			switch ( $seite )
			    {
			
			        default:
			        case '1':
			            include 'php/seite1.php';
			            break;
			
			        case '2':
			            include 'php/seite2.php';
			            break;
			
			        case '3':
			            include 'php/seite3.php';
			            break;
			
			        case '4':
			            include 'php/seite4.php';
			            break;
			    }
			?>
		</div>
	</body>
</html>