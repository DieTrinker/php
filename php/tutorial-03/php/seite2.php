<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
	<h1>Gästebuch</h1>
	<p>
		Hier können Sie sich in das <a href="index.php?seite=3">Gästebuch</a>
		eintragen
	</p>
</body>

</html>
<?php
/* Quellcode für das Gästebuch */
require 'php/mysql.inc.php';

// Abfrage formulieren
$abfrage = "
        SELECT
            *
        FROM
        eintraege
        ORDER BY
        datum DESC
        ";
// Abfrage an den Server senden
$ergebnis = mysql_query ( $abfrage, $link );

$anzahl = mysql_num_rows ( $ergebnis );

if ($anzahl > 0) {
	echo "<p>Anzahl der Gästebucheinträge: " . $anzahl . "</p>";
} else {
	echo "<p>Es sind leider noch keine Gästebucheinträge vorhanden!</p>";
}

/**
 * alle Datensätze ausgeben...
 * gitub schlupp...
 */

/*
 * while ($datensatz = mysql_fetch_array($ergebnis, MYSQL_ASSOC)){ echo "||name: ".$datensatz['name'] ."|| ++ " ."||datum: ".$datensatz['datum'] ."|| ++ " ."||eintrag: ".$datensatz['eintrag'] ."|| ++ " ."||email: ".$datensatz['email'] ."|| ++ " ."||url: ".$datensatz['url'] ."||<br><br>"; }
 */
// Ausgabe aller Gästebucheinträge durch das DIV-Layout

?>
<!-- Umschlag für einen Gästabucheintrag -->
<?php while ($datensatz = mysql_fetch_array($ergebnis, MYSQL_ASSOC)){ ?>
<div class="gb-eintrag">
	<div class="gb-meta">
		<!-- Name, Datum, Email, URL -->
	<?php echo $datensatz['name']; ?>
	schrieb am:
	<?php  echo date('d.m.Y - H:i', strtotime($datensatz['datum'])).' Uhr'; ?>
	(Email:
	<?php  echo $datensatz['email']; ?>
	,
	URL:
	<?php  echo $datensatz['url']; ?>
	)
	</div>
	<div class="gb-content">
		<!-- Eintrag -->
	<?php  echo $datensatz['eintrag']; ?>
	</div>
</div>
}
<?php }?>
