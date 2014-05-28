<h1>Detailansicht</h1>
<?php
include 'mysql.inc.php';

if ( isset( $_GET [ 'bildID' ] ) ) {
    $bildID = $_GET [ 'bildID' ];
} else {
    $bildID = "";
}

$abfrage = "
				SELECT
					*
				FROM
					bild
				WHERE
					bildID = '" . $bildID . "'";

$ergebnis = mysql_query( $abfrage, $link );

$datensatz = mysql_fetch_array($ergebnis);

if (!$datensatz){
	die("Probleme beim Anzeigen des Bildes");
}

//	Bild darstellen und Community-Funktionen anbieten
$datei = $datensatz['pfad'].'/'.$datensatz['dateiName'];
?>
<img src="<?php echo $datei; ?>" />

<form action="?seite5" method="post">

	<input type="hidden" name="bildID" id="bildID" value="<?php echo $bildID; ?>" />
	<label for="sterne">
		Sterne:
		<select name="sterne">
			<option value="0">-- Voten! --</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</label>
	
	<br>
	<br>
	
	<label for="kommentar">
		Kommentar:
		<br>
		<textarea name="kommentar" id=""></textarea>
	</label>
	
	<br>
	<br>
	<input type="submit" name="senden" value="bewerten und kommentieren" />
</form>