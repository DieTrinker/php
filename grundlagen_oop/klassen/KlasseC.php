<?php

class KlasseC {
    
    // Muss dringend initialisiert werden
    private $wichtig;
    
    // Konstruktor (beginnt mit 2 Unterstrichen)
    public function __construct( $initialisierung ) {

        $this->wichtig = $initialisierung;
        
        echo "Konstruktor der KlasseC: " . PHP_EOL;
    
    }

    public function wichtigTest() {

        echo "wichtig hat den Wert: " . $this->wichtig. PHP_EOL;
    
    }
    
    //  Destruktor
    public function __destruct(){
        
        echo "Destruktor der Klasse C: ".PHP_EOL;
    }

}