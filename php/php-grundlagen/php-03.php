<!-- Konstanten -->
<?php

    // s.a. http://www.php.net/manual/language.constants.php
    // define() erlaubt es, Konsstanten zu definieren
    
    define("PI", "3.141");
    
    // Beim Benutzen der Konstanten wird das Dollarzeichen weggelassen!
    echo PI . "<br />" .PHP_EOL;
    
    echo 10*PI . PHP_EOL;
    
    
    // s.a. http://www.php.net/manual/de/language.constants.predefined.php
    // magische Konstanten werden durch den PHP-Stack bereitgestellt
    // magische Konstanten werden in doppelte Underscores eingefasst
    
    echo __DIR__ . PHP_EOL;    // gibt das Verzeichnis aus, in dem sich die Datei befindet
    
    echo __FILE__ . PHP_EOL;   // gibt den Dateinamen aus
    
    echo __LINE__ . PHP_EOL;   // gibt die Zeilennummer aus, --- PHP_EOL = PHP_EndOfLine (nur: Zeilenumbruch im Quelltext)
    
    // Exkurs: Zeilenumbruch
    
    // Zeilenumbruch in html mit <br />
        echo "Zeile <br />" . PHP_EOL . " Zeile <br />";
    