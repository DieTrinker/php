<?php
//	die Sitzung starten bzw. wieder aufnehmen
session_start();

//	Prüfung der anmeldedaten gegen die Datenbank db_credentials
if ( isset( $_POST [ 'login' ] ) ) {

    include 'scripte/mysql.inc.php';

    $abfrage = "
    		SELECT
				account, passwort
			FROM
				account
			WHERE
				account='" . trim( $_POST [ 'account' ] ) . "'
			AND
				passwort = '" . sha1( trim( $_POST [ 'passwort' ] ) ) . "'";

     echo "abfrage: ".$abfrage;

    $ergebnis = mysql_query( $abfrage );
    echo "num_rows: ".mysql_num_rows( $ergebnis );

    // falls die Anmeldedaten verifiziert werden konnten, speichern wir den "Erfolg/Misserfolg"
    // in der Session
    if ( mysql_num_rows( $ergebnis ) > 0 ){
    	
    	$_SESSION [ 'angemeldet' ] = true;
    	$_SESSION ['benutzer'] = trim($_POST['account']);
    	
    	//	im Erfolgsfall leiten wir aum auf die Startseite
    	//header("Location: http://php.kluhil.ks/ks.kluhil.php/php-uploads/index.php?seite=2");
    }
        
    else {
    	
    	$_SESSION [ 'angemeldet' ] = false;
    	//echo "num_rows: ".mysql_num_rows( $ergebnis );
    	//	im MissErfolgsfall leiten wir auf auf die Anmelde(Formular)seite
    	//header("Location: http://php.kluhil.ks/ks.kluhil.php/php-uploads/index.php?seite=4");
    }
}
