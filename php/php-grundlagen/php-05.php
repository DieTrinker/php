<?php

    // Datenfelder in PHP
    // http://www.php.net/manual/de/language.types.array.php
    
    // Datenfelder sind Zusammenfassungen von Daten gleichen Typs
    // ... da es in PHP kein strenges Typkonzept gibt, kann alles mögliche
    // ... in Datenfeldern gespeichert werden (Mischmasch)
    
    // Datenfelder lassen sich in PHP auf verschiedene Arten erzeugen
    
    // (1) unter Verwendung der array()-Funktion
    $feld = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    var_dump($feld);
    
    $nochEinFeld = array( "hallo", "welt", "php", "ist", "toll");
    var_dump($nochEinFeld);
    
    // eine Mixtur aus ganzzahligen Werten und Zeichenketten
    $feldsalat = array( 0, 1, 2, "hallo", "welt", "php", 3, 4, 5 );
    var_dump($feldsalat);
    
    // ein leeres Feld
    $leeresFeld = array();
    var_dump($leeresFeld);
    
    
    // (2) unter Verwendung von Indizes
    $daniel[] = "hallo";
    $daniel[] = "welt";
    $daniel[] = "!";
    $daniel[] = 1;
    
    var_dump($daniel);
    
    // in PHP gibt es neben den indizierten >Feldern (arbeiten mit Index)
    // auch noch assoziative Felder, die statt eines Index einen Schlüsselwert verwenden
    
    // (3) assoziatives Feld mit der array()-Funktion
    $assoziatesFeld = array( "schluessel" => "wert", "daniel" => "macht Stress", "fuenf" => 2);
    
    var_dump($assoziatesFeld);
    
    // (4) assoziatives Feld unter Verwendung der Index-Schreibweise
    
    $jette["hallo"] = "welt";
    $jette["dessau"] = "dort";
    $jette["magdeburg"] = "hier";
    
    var_dump($jette);
    
    
    // mehrdimensionale Felder lassen sich in PHP mit der Array()-Funktion und der 
    // Indexschreibweise anlegen
    //
    // Hinweis: oft liefern Funktionsaufrufe mehrdimensionale Felder zurück
    // Hinweis: in PHP werden mehrdimensionale Felder gern als Parameter für Funktionen verwendet
    // Hinweis: mehrdimensionale Felder eignen sich besonders gut für Konfigurationsaufgaben
    
    // (5) mehrere Dimensionen mit der Array()-Funktion
    
    $multiDim = array( 
                    array( 1, 2, 3, 4),
                    array( 10, 20, 30, 40),
                    array( 100, 200, 300, 400)
                );
    
    var_dump($multiDim);
    
    
    // (6) mehrere Dimensionen mit der Index-Schreibweise
    
    $multiKulti[0][] = "hallo";
    $multiKulti[0][] = "welt";
    $multiKulti[0][] = "!";
    $multiKulti[0][] = "PHP";
    $multiKulti[0][] = "toll";
    $multiKulti[1][] = "....";
    $multiKulti[1][] = "++++";
    $multiKulti[1][] = "####";
    
    var_dump($multiKulti);
    
    // (7) mehrdimensionale, assoziative Arrays mit der Array()-Funktion
    
    $multiAssoziativ = array( 
                            "eins" => array(0,1,2,3,4),
                            "zwei" => array(10,20,30,40),
                            "drei" => array(100,200)
                       );
    
    var_dump($multiAssoziativ);
    
    // (8) mehrdimensionale, assoziative Array mit der Indexschreibweise
    
    $multiAssoziativInd["eins"][] = "hallo";
    $multiAssoziativInd["eins"][] = "welt";
    $multiAssoziativInd["zwei"][] = "1.Mai";
    $multiAssoziativInd["zwei"][] = "wir sind dabei";
    $multiAssoziativInd["eins"][] = "!";
    $multiAssoziativInd["drei"][] = 100;
    
    var_dump($multiAssoziativInd);
    
    // (9) extremes Beispiel
    
    $extrem = array(
                "eins" => array(
                        array(0,1,2,3),
                        array("a","b","c")
                ),        
                "zwei" => array(
                        "hallo",
                         "welt",
                        "!"
                )
            );
                        
    var_dump($extrem);

    
    /**
     * einige, nützliche Array-Funktionen
     * http://de3.php.net/manual/de/ref.array.php
     * http://de3.php.net/manual/de/function.list.php
     */
    
    echo "<br /><br />";
    
    // prüfen, ob eine Variable ein Array ist -> true ider false
    echo is_array( $extrem ) . "<br />" . PHP_EOL;
        
    $a = 100;
    echo is_array( $a ) . "<br />" . PHP_EOL;

    
    // implode()
    // Inhalte eines Arrays zusammenfügen, hier mit Kommata getrennt!
    $feld = array( "hallo", "welt", "alles", "ist", "so", "toll", "hier");
    
    $kommaGetrennt = implode(",", $feld);
    
    echo $kommaGetrennt . "<br />" . PHP_EOL;
    
    
    // explode()
    // Zeichenkette in Array-Elemente zerlegen
    
    $zeichenkette = "Alle Vögel sind schon da";
    
    $feld = explode(" ", $zeichenkette);
    
    var_dump($feld);
    
    
    // count()
    // zählt die Elemente eines Arrays
    
    $feld = array( "hallo", 0, "welt", 100, "!", -2);
    
    echo count($feld) . "<br />" . PHP_EOL;
    
    
    // sort()
    // sortiert die Elemente eines Arrays
    
    $feld = array( 30, 20, 10, -100, 300, 30 );
    
    sort( $feld );
    var_dump($feld);
    
    
    // rsort()
    // sortiert die Elemente eines Arrays **absteigend**
    
    rsort( $feld );
    var_dump($feld);
    
    
    // array_merge()
    // fügt mehrere Felder zu einem zusammen
    
    $feldA = array ( 0, 1, 2, 3, 4 );
    $feldB = array ( 10, 20, 30, 40 );
    
    $mischer = array_merge( $feldA, $feldB );
    var_dump($mischer);
    
    
    // ... aufpassen, falls Schlüssel-"duplikate" vorhanden sind, werden diese in dem
    // ... gemischten Feld entfernt
    $fledA = array( "farbe" => "rot", 0, 1, 2);
    $fledB = array( "farbe" => "grün", 10, 3, 2, 0);
    
    $mischer = array_merge( $feldA, $feldB );
    var_dump($mischer);
    
    /**
     * Anmerkung
     * 
     * Arrays in PHP sind iterierbar,
     * d.h. ich kann in einem Array nacheinander auf
     * alle Feldelemente zugreifen (vom ersten zum letzten)
     * Iteration = durchlaufende Wiederholung
     * 
     * Array: [ 0, 1, 2, 3, 4, 5, 6 ]
     *          ^
     *          |
     *      aktuelles Element
     *      
     * Iteration wird durchgeführt
     * 
     * Array: [ 0, 1, 2, 3, 4, 5, 6 ]
     *             ^
     *             |
     *          aktuelles Element
     *          
     * Eine Iteration wird durchgeführt
     * 
     * Array: [ 0, 1, 2, 3, 4, 5, 6 ]
     *                ^
     *                |
     *          aktuelles Element
     *          
     * ... einige Iterationen später
     * 
     * Array: [ 0, 1, 2, 3, 4, 5, 6 ]
     *                            ^
     *                            |
     *                      aktuelles Element
     * Iteration "am Stück":
     * 
     * Array: [ 0, 1, 2, 3, 4, 5, 6 ]
     *          ^
     *          .. ^
     *          ..... ^
     *          ........ ^
     *          ........... ^
     *          .............. ^
     *          ................. ^
     *  
     */
    
    $studenten = array( "daniel", "marcel", "valentina", "christian", "hilamr", "jette", "niels", "rene");
    
    // liefert den ersten (aktuellen) Studenten -> Daniel
    $student = current($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Marcel
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Valentina
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Christian
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Valentina
    $student = prev($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Christian
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Hilmar
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Jette
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Niels
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // liefert den nächsten Studenten -> Rene
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    
    // was passiert, wenn ich noch einmal next() aufrufe?
    // Frage:      liefert jetzt was???
    // Antwort:    "NICHTS!" Wir sind am Ende angebkommen und es würde **nichts** mehr geliefert!
    $student = next($studenten);
    echo "???" . $student . "<br />" . PHP_EOL;
    
    // setzt den internen Array-Zeiger zurück
    reset($studenten);
    
    // liefert jetzt wieder -> Daniel
    $student = next($studenten);
    echo $student . "<br />" . PHP_EOL;
    