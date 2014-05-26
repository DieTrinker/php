<h1>Gästebuch verwalten</h1>

<?php
// wir bauen in diese Seite einen Wächter ein (guard)
if( $_SESSION['angemeldet'] != true ){
	//die("Sie müssen angemeldet sein, um die Seite sehen zu können");
	include_once 'php/form_login.php';
} else {
	require 'php/mysql.inc.php';
	// die Auswertung des abgesendeten Formulars
	
	if( isset( $_POST['senden'] ) ) {
	
		// die angeklickten Beiträge in der Datenbank auf den Status 'unsichtbar' setzen
	
		// s.a. https://github.com/schlupp2014/php/blob/master/php-grundlagen/php-04.php
		// ab Zeile 103
		foreach( $_POST['eintrag'] as $key => $value ) {
	
			$abfrage =	"UPDATE
							eintraege
						SET
							status = 'unsichtbar'
						WHERE
							id = " . $value;
	
			mysql_query( $abfrage );
		}
	}
	
	// wir holen alle sichtbaren GB-Einträge
	$abfrage = "
			SELECT
				*
			FROM
				eintraege
			WHERE
				status='sichtbar'
			ORDER BY
				datum DESC";
	
	$ergebnis = mysql_query( $abfrage, $link );
	
	?>
	<form action="index.php?seite=4" method="post" accept-charset="UTF-8">
	<?php
	
	// innerhalb der Schleife erzeugen wir die Formularelemente
	while( $datensatz = mysql_fetch_array( $ergebnis ) )
	{
	// wir reduzieren den GB-Eintrag auf die ersten 80 Zeichen für die Übersichtsdarstellung
	// im Formular
	// s.a. http://www.php.net/manual/de/function.substr.php
	$kurzEintrag = substr($datensatz['eintrag'], 0, 80);
	?>
	<input type="checkbox"
	name="eintrag[]"
	id="eintrag<?php echo $datensatz['id'];?>"
	value="<?php echo $datensatz['id'];?>"
	/>
	<label for="eintrag<?php echo $datensatz['id']; ?>"><?php echo $kurzEintrag; ?></label>
	<br />
	<?php
	}
	?>
	<input type="submit" name="senden" id="senden" value="Einträge verbergen" />
	</form>
	
<?php }?>