<?php
// Aktivierung der Fehlermeldungen
error_reporting ( E_ALL );

// überschreibt den Wert in der php.ini und aktiviert Fehlermeldungen
ini_set ( 'display_errors', 1 );

/*
 * Bisher mussten alle benötigten Klassendateien manuell laden Solange die Klassen in flachen
 * Vererbungshierarchien stehen, ist das relativ einfach zu handhaben. Naturgemäß sind
 * Vererbungslinien jedoch lang; hinzu kommen möglicherweise Interfaces. ==> das wird unhandlich
 * Lösung: Interceptor-Methode - Autoloading __autoload() ermöglicht das Laden von Klassendateien,
 * wenn diese benötigt werden
 */
function __autoload( $classname ) {
    
    /*
     * per Konvention sollen die Klassen in eigenständigen Dateien liegen und den gleichen Namen
     * tragen, wie die Klasse der Parameter $classname der Methode __autoload() kann nun als Basis
     * für einen Dateinamen dienen für einen Dateinamen. Diese Datei ließe sich dann via
     * include-Anweisung einbinden
     */
    $filename = 'klassen/' . $classname . '.php';
    
    // Prüfen, ob die Klassendatei existiert und ggf. includieren
    if ( file_exists ( $filename ) ) {
        include $filename;
    }
    
    echo "Es wurde versucht, die Klasse " . $classname . " zu laden." . PHP_EOL;

}

$obj = new KlasseD(100);

var_dump($obj);