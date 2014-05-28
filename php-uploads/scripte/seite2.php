<h1>Galerie</h1>
<p>
	<a href="index.php?seite=3">Bild hochladen</a>
</p>
<?php
	//	Galerie anzeigen, d.h.
	//
	//	1.	Datensätze laden
	//	2.	Bilder darstellen
	//	3.	Community-Funktionen integrieren
	//
	
	//	zu 1.
	include 'scripte/mysql.inc.php';
	
	$abfrage = "
			SELECT
				*
			FROM
				bild ";
	
	$ergebnis = mysql_query($abfrage, $link);
	$i = 1;
	while ($datensatz = mysql_fetch_array($ergebnis)) {
		//	Darstellen der einzelnen Bilder
		//echo $datensatz['pfad']."/".$datensatz['dateiName'];
		
		//	Ermitteln der Bewertung
		//	wenn avg(...) null ist, dann gib etwas anderes (z.B. 0 oder String) aus
		//		=> ifnull()
		//	floor() => schneidet Nachkommastellen ab
		$abfrage = "
				SELECT
					count(*) AS anzahl,
					floor( ifnull( avg(wertung), 0 ) ) AS sterne
				FROM
					bewertung
				WHERE
					bildID='".$datensatz['bildID']."'
				";
		
		$ergebnis_wertung = mysql_query($abfrage, $link);
		$datensatz_wertung = mysql_fetch_array($ergebnis_wertung);
		
		echo "
			<div class='thumbnail'>
				<div class='pic-wrapper'>
					<img src=".$datensatz['pfad']."/".$datensatz['dateiName']." />
				</div>
				<br />
				<a href='".$datensatz['pfad']."/".$datensatz['dateiName']."'>Download</a>
				<br />
				".$datensatz_wertung['sterne']." Sterne <br> ".$datensatz_wertung['anzahl']." Stimmen
			</div>";
		//echo "modulo 3: ".$i%3;
		if ($i%3 == 0){
			echo "<br class='clearboth'>";
		}
		$i++;
	}
?>