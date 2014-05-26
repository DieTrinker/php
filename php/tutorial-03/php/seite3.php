<?php
// prüfen, ob wir auswerten müssen
if( isset( $_POST['eintragen']) )	// prüfe, ob der Eintrage-Button gedrückt wurde
{
// dann auswerten und Fehler feststellen

// Auswertung: NAME
if( !empty( $_POST['benutzer']) )
$name = trim( $_POST['benutzer'] );

if( !(isset($name) && $name!= "") )
$error['name'] = "Name muss eingegeben werden";


// Auswertung: KOMMENTAR
if( !empty( $_POST['eintrag']) )
$eintrag = trim( $_POST['eintrag'] );

if( !(isset($eintrag) && $eintrag!="" ) )
$error['eintrag'] = "Ein Kommentar muss eingeben werden";

// Auswertung: EMAIL
// http://php.net/manual/de/function.filter-var.php

/** Test der Funktion: filter_var(...)
*
* var_dump( filter_var('bauer@megalearn.de', FILTER_VALIDATE_EMAIL) );
* var_dump( filter_var('nonsens', FILTER_VALIDATE_EMAIL) );
*
*/

if( !empty( $_POST['email']) )
$email = trim($_POST['email']);

if( !(isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) )
$error['email'] = "Bitte E-Mail-Adresse prüfen";

// Auswertung: URL
$url = trim( $_POST['url']);

// falls die URL nicht leer ist, muss sie in einem gültigen Format vorliegen
// gültiges Format: <Protokoll>://<Adresse>

if( $url != "" && ! filter_var($url, FILTER_VALIDATE_URL) )
$error['url'] = "Die URL hat kein gültiges Format";


// FALLS BIS HIERHIN ALLES IN ORDNUNG IST, DANN KÖNNEN WIR ETWAS IN DIE DATAENBANK EINTRAGEN
if( !isset($error)) {

require 'php/mysql.inc.php';

// Datenbankabfrage formulieren und zum Server senden
$abfrage = "INSERT INTO
eintraege
(
name,
datum,
eintrag,
email,
url,
ip
)
VALUES
(
'" . $name . "',
now(),
'" . $eintrag . "',
'" . $email . "',
'" . $url . "',
'" . $_SERVER['REMOTE_ADDR'] ."'
)
";

mysql_query( $abfrage );
}
else
var_dump($error);
}

// prüfen, ob wir das Formular anzeigen müssen
if( !isset( $_POST['eintragen']) || isset( $error ) )	// prüfe, ob der Eintrage-Button noch
// nicht gedrückt wurde
// ODER
// ob Fehler bei der Eingabe bemerkt worden sind
{
?>
<h1>Bitte Formular ausfüllen</h1>

<form action="index.php?seite=3" method="post" accept-charset="UTF-8">

<label for="benutzer">Name:
<br />
<input type="text" name="benutzer" id="benutzer" maxlength="80" />
</label>
<br />
<br />
<label for="eintrag">Kommentar:
<br />
<textarea name="eintrag" id="eintrag" cols="30" rows="8"></textarea>
</label>
<br />
<br />
<label for="email">E-Mail:
<br />
<input type="text" name="email" id="email" maxlength="120" />
</label>
<br />
<br />
<label for="url">Webseite:
<br />
<input type="text" name="url" id="url" maxlength="120"/>
</label>
<br />
<br />
<input type="submit" name="eintragen" id="eintragen" value="eintragen" />
</form>

<?php
}
?>

