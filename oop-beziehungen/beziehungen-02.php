<?php
// Aktivierung der Fehlermeldungen
error_reporting ( E_ALL );

// überschreibt den Wert in der php.ini und aktiviert Fehlermeldungen
ini_set ( 'display_errors', 1 );

function __autoload( $classname ) {

    $filename = 'klassen/' . $classname . '.php';
    if ( file_exists ( $filename ) ) {
        include $filename;
    }

}

/*
 * Beziehungen zwischen Klassen 1. Assoziation, unidirektional, 1:4-Multiplizität Implementierung: -
 * Die Assoziation wird nur in einer Klasse verwaltet. zur Verwaltung der Assoziation werden
 * benötigt: a) vier Objektvariablen (Referenzvariablen) oder b) ein Array für die Aufträge, die mit
 * dem Kunden verknüpft sind Klassen: Kunde ---> Auftrag (1 Kunde erteilt 1 bis 4 Aufträge)
 */

$kundeA = new KundeA ();

$auftragA1 = new AuftragA ( 1 );
$auftragA2 = new AuftragA ( 2 );
$auftragA3 = new AuftragA ( 3 );
$auftragA4 = new AuftragA ( 4 );

// Kunde bekommt Aufträge zugeordnet
$kundeA->setLink ( $auftragA1 );
$kundeA->setLink ( $auftragA2 );
//$kundeA->setLink ( $auftragA3 );
$kundeA->setLink($auftragA4);

// debug: Test der Ausnahmen - Anzahl der zugelassenen Aufträge wird überschritten
/* $kundeA->setLink($auftragA1); // sollte Exception ausgelösen */

// debug: Test der Ausnahmen - Auftrag bereits registriert
/* $kundeA->setLink($auftragA1); // sollte Exception ausgelösen */

// Test der beiden get*Link - Methoden
// ein einzelner Auftrag
/* echo $kundeA . $kundeA->getLink ( 1 ) . PHP_EOL; */

// alle vorhandenen Aufträge
/* echo $kundeA; */
// getAllLinks liefert ein Array, welches mit der foreach-Schleife verarbeitet wird
/* foreach ( $kundeA->getAllLinks () as $auftrag ) {
    echo PHP_EOL.$auftrag;
} */

//  Test der beiden remove*Link-Methoden: Löschen der Beziehungen
//  Löschen einer einzelnen Beziehung
$kundeA->removeLink(1);

echo PHP_EOL.'nach dem Löschen einer einzelnen Beziehung restliche Ausgaben:';
//  Ausgabe der restlichen Beziehungen
foreach ( $kundeA->getAllLinks () as $auftrag ) {
    echo PHP_EOL.$auftrag;
}

//  Löschen aller Beziehungen
$kundeA->removeAllLinks();


echo PHP_EOL.'restliche Ausgaben:';
//  Ausgabe der restlichen Beziehungen
foreach ( $kundeA->getAllLinks () as $auftrag ) {
    echo PHP_EOL.$auftrag;
}