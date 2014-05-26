<h1>Gästebuch</h1>
<p>
Hier können Sie sich in das Gästebuch <a href="index.php?seite=3">eintragen</a>
</p>

<?php

// hier folgt der Quelltext, um das Gästebuch dazustellen...

require 'php/mysql.inc.php';

// wir möchten seitenweise die Gästebucheinträge darstellen
$start = 0;
$anzahl = 10;	// fixer Wert, pro Seite 10 Einträge

// wenn eine konkrete Bildschirmseite angefordert wurde
if( isset( $_GET['start'] ) )
$start = $_GET['start'];

// Abfrage formulieren
$abfrage =	"SELECT
*
FROM
eintraege
WHERE
status = 'sichtbar'
ORDER BY
datum DESC
LIMIT "
. ($start * $anzahl)	// wir müssen unsere Bildschirmseiten umrechnen in DS
. ","
. ($anzahl+1);

// Abfrage an den Server senden
$ergebnis = mysql_query( $abfrage, $link );

// prüfen, ob wir am Ende aller Einträge des Gästebuchs angekommen sind
$amEnde = mysql_num_rows($ergebnis) < ($anzahl+1);

// prüfen, ob wir noch weiterblättern können
if( !$amEnde)
$next = $start + 1;
else
$next = $start;

// prüfen, ob wir noch zurückblättern können
if( $start > 0 )
$start = $start - 1;

/*
// alle Datensätze ausgeben ...
// vgl. https://github.com/schlupp2014/php/blob/master/php-mysql/mysql-01.php
// (Zeile 147ff. )
while( $datensatz = mysql_fetch_array( $ergebnis, MYSQL_ASSOC)) {

echo $datensatz['name']
. " ++ "
. $datensatz['datum']
. " ++ "
. $datensatz['eintrag']
. " ++ "
. $datensatz['email']
. " ++ "
. $datensatz['url']
. "<br /><br />";
}
*/
?>
<!-- Navigation Gästebuchseiten -->
<div class="gb-navigation">
<ul id="navigation">
<li class="left">
<a href="index.php?seite=2&start=<?php echo $start; ?>" class="prev"> prev </a>
</li>
<li class="right">
<a href="index.php?seite=2&start=<?php echo $next; ?>" class="next"> next </a>
</li>
</ul>
</div>
<?php

// Ausgabe aller Gästebucheinträge durch das DIV-Layout

for( $i=0; $i<$anzahl && ($datensatz=mysql_fetch_array($ergebnis)); $i++ )
{
?>
<!-- Umschlag für einen Gästebucheintrag -->
<div class="gb-eintrag">
<div class="gb-meta">
<!-- Name, Datum, Email, URL -->
<?php echo $datensatz['name']; ?>
schrieb am
<?php echo date('d.m.Y - H:i', strtotime($datensatz['datum'])) . ' Uhr'; ?>
( E-Mail:
<?php echo $datensatz['email']; ?>
,
URL:
<?php echo $datensatz['url']; ?>
)
</div>
<div class="gb-content">
<!-- Eintrag -->
<?php echo $datensatz['eintrag']; ?>
</div>
</div>
<?php
}
?>