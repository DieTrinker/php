<?php
// Aktivierung der Fehlermeldungen
error_reporting ( E_ALL );

// überschreibt den Wert in der php.ini und aktiviert Fehlermeldungen
ini_set ( 'display_errors', 1 );

// die Klassendatei einbinden
include 'klassen/KlasseC.php';

// neues Objekt instanziieren
$objektC = new KlasseC ( 250 );

// ... Testen, ob mit der neuen Initialisierung alles geklappt hat
$objektC->wichtigTest ();

include 'klassen/KlasseD.php';

// neues Objekt instanziieren
$objektD = new KlasseD ( 1000 );

$objektD->sehrWichtigerTest ();

//var_dump ( $objektD );


include 'klassen/KlasseE.php';

//  statische Klassenelemente
echo "KlasseE - Zähler: ".KlasseE::$counter.PHP_EOL;

KlasseE::ichDenkeMit();     //  nicht erlaubt: statischer Zugriff auf nicht-statische Methode

$objE1 = new KlasseE();
$objE2 = new KlasseE();
$objE3 = new KlasseE();
$objE4 = new KlasseE();
$objE5 = new KlasseE();

echo "KlasseE - Zähler: ".KlasseE::$counter.PHP_EOL;