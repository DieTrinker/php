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
 * Beziehungen zwischen Klassen
 * 
 * 1. Assoziation, unidirektional, 1-Multiplizität
 * 
 * Implementierung:
 *      -   Die Assoziation wird nur in einer Klasse verwaltet. zur Verwaltung der
 *          Assoziation genügt eine einzelne Objektvariable (Referenzvariable)
 *          
 * Klassen:
 *  Kunde ---> Auftrag (1 Kunde erteilt 1 Auftrag)
 */

//  neuen Kunden erzeugen
$kunde = new Kunde();

//  neuen Auftrag anlegen
$auftrag = new Auftrag();

//  ... und ordnen diesen Auftrag dem Kunden zu (Herstellen der Beziehung)
$kunde->setLink($auftrag);

//  debug: Kunden testweise ausgeben/anzeigen
echo $kunde;

//  nur den Auftrag ausgeben
echo $kunde->getLink();

echo PHP_EOL;

//  Auftrag löschen aus dem Kundenobjekt
$kunde->removeLink();

//  debug: den Kunden testweise ausgeben
echo $kunde;

echo PHP_EOL;

//  der Auftrag existiert noch
echo $auftrag;
