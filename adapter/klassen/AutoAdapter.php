<?php

class AutoAdapter implements Vehicle {
    
    // wir speichern eine Reference auf ein Objekt der Klasse Automobile
    protected $automobile = null;
    
    // Konstruktor verknüpft den Adapter mit einem Automobile
    public function __construct( Automobile $a ) {

        $this->automobile = $a;
    
    }

    public function startEngine() {

        // Schlüssel in das Automobile
        $this->automobile->pluginKey ();
        
        // ... und drehen ihn
        $this->automobile->ignite ();
    
    }

    public function stopEngine() {
    
        // Schlüssel raus
        $this->automobile->removeKey();
    }

    public function moveForward($km) {

        $this->automobile->drive(Automobile::RICHTUNG_VOR, $km);
    }

}