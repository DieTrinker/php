<?php

class KlasseD extends KlasseC {

    private $sehrWichtig;

    public function __construct( $initWert ) {
        
        /*
         * Wie in Java müssen die parameterbehafteten Konstruktoren der Basis(Eltern-) Klasse manuell aufgerufen werden die Syntax schreibt das Schlüsselwort 'parent' und den doppelten Doppelpunkt (Scope-Operator) vor
         */
        parent :: __construct ( 500 );
        
        echo "Konstruktor der KlasseD: " . PHP_EOL;
        
        $this->sehrWichtig = $initWert;
    
    }

    public function sehrWichtigerTest() {

        echo "Sehr wichtig hat den Wert: " . $this->sehrWichtig . PHP_EOL;
    
    }
    
    // Destruktor
    public function __destruct() {

        echo "Destruktor der Klasse D: " . PHP_EOL;
    
    }

}