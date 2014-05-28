<?php
//error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR);
// wir starten eine neue Sitzung bzw. setzen eine gestartete Sitzung fort
$lebenszeit = 600;

// setzt die Lebenszeit der Cookies auf eine Anzahl in Sekunden
session_set_cookie_params($lebenszeit, 'php-upload/');

session_start();
//echo session_name().": ".session_id();

//	wir tricksen: es wird ein neuer Cookie erzeugt:
//		der genauso heißt, wie der Sitzungscookie
//		den gleichen Inhalt hat(Sitzungs-ID)
//		Aber: dessen Zeitstempel mit jedem Aufruf der Telpmateseite (index.php,
//		so dass nur bei Inaktivität der Cookie tatsächlich altert
setcookie(session_name(), session_id(), time() + $lebenszeit, 'php-upload/');
?>
<html>
	<head>
		<title>PHP Uploads verarbeiten</title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body>
		<div id="header"></div>
		<div id="navigation">
			<ul id="horizmenue">
			<?php
	        if ( $_SESSION [ 'angemeldet' ] == true ) {
                echo ('<li><a href="index.php?seite=1">Home</a></li>');
                echo ('<li><a href="index.php?seite=2">Galerie</a></li>');
                echo ('<li><a href="scripte/_logout.php">Abmelden</a></li>');
            } else {
                echo ('<li><a href="index.php?seite=1">Home</a></li>');
                echo ('<li><a href="index.php?seite=4">Anmelden</a></li>');
    		}
			?>
				<!--
				<li><a href="index.php?seite=1">Home</a></li>
				<li><a href="index.php?seite=4">Anmelden</a></li>
				<li><a href="index.php?seite=2">Galerie</a></li>
				 -->
			</ul>
		</div>
		
		<div id="main">
			<?php
			$seite = "";
            if ( isset( $_GET [ 'seite' ] ) ) {
                $seite = $_GET [ 'seite' ];
            }

            switch ( $seite )
                {
                    default:
                    case '1':
                        include 'scripte/seite1.php';
                        break;
                    case '2':
                        include 'scripte/seite2.php';
                        break;
                    case '3':
                        include 'scripte/seite3.php';
                        break;
                    case '4':
                        include 'scripte/seite4.php'; //	Login-Formular
                        break;
                }
			?>
		</div>
	</body>
</html>