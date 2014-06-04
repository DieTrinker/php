<?php
class Auftrag{
    
    public function __toString(){
        
        //  erzeugt eine einfache Zeichenkette, an deren Ende 
        //  der Objekt-HashCode (wird automatisch erzeugt) steht 
        return "Auftrag ".spl_object_hash($this);
    }
}