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
 * Fehlerbehandlung mit Exeptions (Ausnahmen)
 * 
 * In der OOP kann man nicht mehr einfach nur per if-else und die() und exit()
 * Fehlerbehandlung durchführen
 * 
 * Das wäre unpraktikabel, besonders in den Programmiersprachen, in denen Klassen, Interfaces
 * und Programme vor der Ausführung übersetzt werden
 * 
 * In der OOP werden Fehler durch Methoden der Klassen oder durch die Anwendungslogik
 * erkannt und entsprechende Ausnahmen (exeptions) geworfen.
 * 
 * Die geworfene Ausnahme kann der Programmentwickler fangen (catch) und selbständig behandeln.
 * 
 * Kritische Programmabschnitte werden durch den Entwickler in einen try ... catch - Block
 * gesetzt.
 * 
 * Wird eine geworfene Ausnahme nicht behandelt, wird diese automatisch weitergeworfen,
 * bis die Ausnahme auf der **obersten** Ebene ankommt.
 * Dort muss sie behandelt werden, oder es kommt zu einer Fehlermeldung.
 * 
 * Ausnahmen sind Klassen, d.h. Ausnahme-Objekte werden mit dem new-Operator erzeugt.
 * Die Basis-Klasse ist die Klasse Exception. ( http://de2.php.net/manual/de/class.exception.php )
 */

function kennyKiller() {
    // wir töten Kenny und werfen eine Exception
    throw new Exception ( 'Sie haben Kenny getötet!' );

}

function southPark() {

    kennyKiller ();

}

// mit dem try ... catch - Block können kritische Programmabschnitte überwacht werden
/* try {
    // hier wird es kritisch (throw --> **werfen** einer Ausnahme)
    southPark ();
} catch ( Exception $e ) {
    // ... hier kommt das Pflaster drauf - alles nicht so schlimm!
    echo $e->getMessage ();
    
    echo PHP_EOL;
    
    // zusätzlich den Stacktrace ausgeben
    echo $e->getTraceAsString ();
} */

// und es kann weitergehen ...

// ...

// Exception-Handling und Klassen
/*
 * Die Methode dummyTestArea() kann zwei Exceptions auslösen
 * (1)  Parameter ist kein Array
 * (2)  einfach nur so
 * 
 * Problem: wie kann ich die unterschiedlichen Exceptions im catch-Block differenziert behandeln
 * 
 * Ansatz:              Die E. arbeiten mit einer Fehlernummer (code)
 * 
 * besserer Ansatz:     -   separate E-Klassen, leiten also von Exception weitere Klassen ab
 *                      -   werfen von unterschiedlichen E., die durch unterschiedliche
 *                          catch - Blöcke behandelt werden
 */
$obj = new KlasseJ ();

try {
    
    //$obj->dummyTestArea(array(1,2,3,4,5));
    $obj->dummyTestArea(10);
    
} catch ( ParameterException $e ) {
    
    echo $e->getMessage();
    echo PHP_EOL;
    echo $e->getTraceAsString ();
    
} catch ( SonstigesException $e ){
    
    echo $e->getMessage();
    echo PHP_EOL;
    echo $e->getTraceAsString ();
    
}

/*
 * Globales Exception-Handling (als Fallback)
 * 
 * Was passiert mit Exeptions, die nicht gefangen werden?
 * ==>  dann kümmert sich der PHP-Stack darum!
 * 
 * Besser:
 *          Es wird ein zentraler E-Handler installiert, der die freilaufenden E.
 *          einsammelt (protokolliert ...)
 *          
 * Ansatz:
 *          -   es wird eine Funktion geschrieben, die sich um diese Exceptions kümmern soll
 *          -   die Funktion wird im PHP_Stack registriert als zentraler Handler
 *                  set_eception_handler(<NameDerFunktion>)
 */

function meinAusnahmeBehandler(Exception $e) {
    
    echo "Nicht gefangene Exception: ". PHP_EOL . $e->getTraceAsString();
}

//  mein zentraler E-Handler wird registriert
set_exception_handler('meinAusnahmeBehandler');

$obj->dummyTestArea(500);