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
		
		echo "
			<div class='thumbnail'>
				<div class='pic-wrapper'>
					<img src=".$datensatz['pfad']."/".$datensatz['dateiName']." height='100'/>
				</div>
				<br />
			Caption
			</div>";
		echo "modulo 3: ".$i%3;
		if ($i%3 == 0){
			echo "jetze aber: <br class='clearboth'>";
		}
		$i++;
	}
?>