<h1>Detailansicht</h1>
<?php
include 'mysql.inc.php';

//	Wir werten das Formular aus
if ($_POST['senden']){
	
	//	Bewertung mit Sternchen
	
	//	BildNummer aus dem Formular abholen
	$bildID = $_POST['bildID'];
	
	//	Prüfen, ob Sterne vergeben wurden
	if ($_POST['sterne'] != 0){
		
		//	Falls ja, dann die Bewertung in die Datenbank eintragen
		$abfrage = "
				INSERT INTO
					bewertung
				VALUES
				(
					'".$_SESSION['benutzer']."',
					'".$bildID."',
					now(),
					".$_POST['sterne'].",
					'".$_SERVER['REMOTE_ADDR']."'
				)";
		
		//	Abfrage an den Server senen und den Rückgabewert prüfen,
		//	weil evtl. bereits eine Bewertung durch den aktuell angemeldeten
		//	Benutzer existiert
		//	in diesem Fall muss eine Aktualisierung durch eine neue Abfrage
		//	stattfinden
		if(!mysql_query($abfrage, $link)) {
			$abfrage = "
					UPDATE
						bewertung
					SET
						wertung = ".$_POST['sterne']."
					WHERE
						accountID = '".$_SESSION['benutzer']."'
					AND
						bildID = '".$bildID."'
						";
			
			//	DEBUG
			//echo $abfrage;
			//	Eintrag der aktualisierten Bewertung in die Datebbank
			mysql_query($abfrage, $link);
		}
	}
	
	//	Kommentare
	//	BildNummer aus dem Formular abholen
	$kommentar = trim($_POST['kommentar']);
	
	//	Prüfen, ob Kommentar vergeben wurden
	if ($_POST['kommentar'] != ''){
	
		//	Falls ja, dann die Bewertung in die Datenbank eintragen
		$abfrage = "
				INSERT INTO
					kommentar
				VALUES
				(
					'".$_SESSION['benutzer']."',
					'".$bildID."',
					now(),
					'".$kommentar."',
					'".$_SERVER['REMOTE_ADDR']."'
				)";
		
		//	Abfrage an den Server senen und den Rückgabewert prüfen,
		//	weil evtl. bereits eine Bewertung durch den aktuell angemeldeten
		//	Benutzer existiert
		//	in diesem Fall muss eine Aktualisierung durch eine neue Abfrage
		//	stattfinden
		if(!mysql_query($abfrage, $link)) {
			$abfrage = "
					UPDATE
						kommentar
					SET
						kommentar = '".$kommentar."'
					WHERE
						accountID = '".$_SESSION['benutzer']."'
					AND
						bildID = '".$bildID."'
						";
				
			//	DEBUG
			//echo "kommentar wird aktualisiert:" .$abfrage."<br>";
			
			//	Eintrag der aktualisierten Bewertung in die Datebbank
			mysql_query($abfrage, $link);
		}
	}
}

//	Extraktion der BildID aus der URL
if ( isset( $_GET [ 'bildID' ] ) ) {
    $bildID = $_GET [ 'bildID' ];
} /* else {
    $bildID = "";
} */

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

<form action="?seite=5" method="post">

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
		<textarea name="kommentar" id="kommentar"></textarea>
	</label>
	
	<br>
	<br>
	<input type="submit" name="senden" value="bewerten und kommentieren" />
</form>