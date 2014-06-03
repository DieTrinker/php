<?php
abstract class KlasseF {
    //  Definition abstrakte Funktion dummy()
    abstract public function dummy();
    
    public function __toString(){
        return "Ich bin die Klasse ".get_class($this).PHP_EOL;
    }
}