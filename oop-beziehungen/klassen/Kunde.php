<?php
class Kunde{
    
    //  Referenzvariable speichert den zum Kunden gehörenden Auftrag
    private $auftrag = NULL;
    
    //  wor müssen die 3 abstrakten Operationen implementieren,
    //  um:
    //      a)  die Assoziation herzustellen
    //      b)  die Assoziation abzufragen
    //      c)  die Assoziation zu löschen

    //      a)  die Assoziation herstellen
    public function setLink( Auftrag $a ) {

        $this->auftrag = $a;
    }
    
    //      b)  die Assoziation abfragen
    public function getLink() {
        
        return $this->auftrag;
    }
    
    //      c)  die Assoziation löschen
    public function removeLink(){
        
        $this->auftrag = null;
    }
    
    //  Ausgabe der ganzen Beziehung
    //  der Interzeptor __toString() wird immer dann aufgerufen, wenn das Objekt 
    //  einer Klasse in einem Zeichenkettenkontexkt verwendet wird,
    //  z.B. bei einer Ausgabe mit "echo"
    public function __toString(){
        
        return __CLASS__ ." ist mit folgendem Auftrag verknüpft: ".$this->auftrag.PHP_EOL;
    }
    
    
}