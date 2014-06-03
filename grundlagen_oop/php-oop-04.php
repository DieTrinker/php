<?php
// Aktivierung der Fehlermeldungen
error_reporting ( E_ALL );

// überschreibt den Wert in der php.ini und aktiviert Fehlermeldungen
ini_set ( 'display_errors', 1 );

/* $obj = new KlasseD ( 100 ); */
function __autoload( $classname ) {

    $filename = 'klassen/' . $classname . '.php';
    if ( file_exists ( $filename ) ) {
        include $filename;
    }

}

/*
 * Beginn "Abstrakte Klassen und Interfaces"
 */
    
/* $obj = new KlasseG();

$obj->dummy();

echo $obj;  //  hier wird der Interceptor __toString aufgerufen
 */

/* $obj = new KlasseH ();

$obj->dummyA ();

$obj->dummyB ();
 */

/*
 * Es gibt in PHP keine Typen, allerdings lassen sich die Konzepte der OOP
 * bzgl. Polymorphie und dynamisches Binden sehr wohl anwenden.
 * Demzufolge müssen Klassen und Interfaces - trotz typloser Sprachdefinition PHP - 
 * eine "Art Typ" benutzen
 * 
 * Für Klassen und Interfaces dürfen Typ-Hinweise (type hints) verwendet werden
 * 
 * Konzept:
 *      
 *      public function beispielFunktion( IFaceA $param )
 *                                        ++++++
 *                                        Typ-Hinweis: $param muss IFaceA implementieren
 *                                       
 *      public function beispielFunktion( KlasseG $param )
 *                                        +++++++
 *                                        Typ-Hinweis: $param muss ein Objekt der Klasse sein
 *                                                      oder einer davon abgeleiteten Klasse
 */

$obj = new KlasseH();

//  Aufruf der Funktion beispielFunktion mit einem unpassenden Parameter
/* $obj->beispielFunktion(new KlasseA()); */

//  Aufruf der Funktion beispielFunktion mit einem passenden Parameter
$obj->beispielFunktion(new KlasseJ());

