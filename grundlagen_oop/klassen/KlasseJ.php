<?php

class KlasseJ implements IFaceA {

    public function dummyA() {

        echo "Ich bin die Methode " . __METHOD__ . " der Klasse: " . __CLASS__ . PHP_EOL;
        
        // Exception werfen
        throw new Exception ( 'Ging schon wieder etwas daneben!' );
    
    }

    public function dummyB() {

        echo "Ich bin die Methode " . __METHOD__ . " der Klasse: " . __CLASS__ . PHP_EOL;
    
    }
    
    // Testgelaende für Exceptions
    public function dummyTestArea( $param ) {

        if ( ! is_array ( $param ) ) {
            throw new ParameterException('Als Parameter wird ein Array (Feld) erwartet!');
        }
        
        //  ... irgendwas ...
        
        throw new SonstigesException('Irgendetwas ging schief, keiner weiß, was...');
    
    }

}