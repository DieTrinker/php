<?php

class KlasseE {
    
    // statische Eigenschaft
    public static $counter = 5;

    public function __construct() {

        if ( self :: $counter > 0 ) {
            echo "Konstruktoraufruf - counter = " . self :: $counter . PHP_EOL;
            self :: $counter --;
        }
    
    }
    
    public function ichDenkeMit() {
        
        echo "Ich denke immer mit!".PHP_EOL;
    }

}