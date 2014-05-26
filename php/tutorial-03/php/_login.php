<?php
//	die Sitzung starten bzw. wieder aufnehmen
session_start();

//	Prüfung der anmeldedaten gegen die Datenbank db_credentials
if ( isset( $_POST [ 'login' ] ) ) {

    mysql_connect( 'localhost', 'benutzer', 'benutzer' )
            or die( 'Fehler beim Herstellen der Verbindung!' );

    mysql_select_db( 'db_credentials' )
            or die( 'Fehler beim Verwenden der Datenbank' );

    $abfrage = "
    		SELECT
				account, pass
			FROM
				accounts
			WHERE
				account='" . trim( $_POST [ 'user' ] ) . "'
			AND
				pass = '" . sha1( trim( $_POST [ 'pass' ] ) ) . "'";

    // echo $abfrage;

    $ergebnis = mysql_query( $abfrage );

    // falls die Anmeldedaten verifiziert werden konnten, speichern wir den "Erfolg/Misserfolg"
    // in der Session
    if ( mysql_num_rows( $ergebnis ) > 0 ){
    	
    	$_SESSION [ 'angemeldet' ] = true;
    	
    	//	im Erfolgsfall leiten wir aum auf die Startseite
    	header("Location: http://php.kluhil.ks/ks.kluhil.php/php/tutorial-03/index.php?seite=4");
    }
        
    else {
    	
    	$_SESSION [ 'angemeldet' ] = false;
    	
    	//	im Erfolgsfall leiten wir auf auf die Anmelde(Formular)seite
    	header("Location: /ks.kluhil.php/php/tutorial-03/index.php?seite=4");	//	Kurzform
    }
}
