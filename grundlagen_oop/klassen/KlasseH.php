<?php

class KlasseH implements IFaceA {

    public function dummyA() {

        echo "Ich bin die Methode " . __METHOD__ . " der Klasse: " . __CLASS__ . PHP_EOL;
    
    }

    public function dummyB() {

        echo "Ich bin die Methode " . __METHOD__ . " der Klasse: " . __CLASS__ . PHP_EOL;
    
    }

    /*
     * Funktion mit Typ-Hinweis
     * 
     * $param muss etwas sein, dass das Interface IFaceA implementiert
     */
    public function beispielFunktion( IFaceA $param ) {
        /*
         * PHP stellt sicher, dass der $param(eter) die Anforderung erfüllt
         * (sonst würde sich PHP mit einem Fehler melden)
         */
        $param->dummyA();
        $param->dummyB();
    }
}