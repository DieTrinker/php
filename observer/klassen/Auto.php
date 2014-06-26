<?php
/**
 * die Klasse Auto implementiert die beiden Interfaces
 * Vehicle und Beobachtbar
 * @author benutzer
 *
 */
class Auto implements Vehicle, Beobachtbar {
    
    // Klasseneigenschaften
    protected $maxSpeed = 0;

    protected $engineStarted = false;

    protected $kmStand = 0;
    
    // Konstruktor
    // legt Höchstgeschwindigkeit und Anfangskilometerstand fest
    public function __construct( $maxSpeed, $kmStand ) {

        $this->maxSpeed = $maxSpeed;
        $this->kmStand = $kmStand;
    
    }

    public function startEngine() {

        $this->engineStarted = true;
    
    }

    public function stopEngine() {

        $this->engineStarted = false;
    
    }

    public function moveForward( $km ) {

        $this->kmStand += $km;
        
        // ... wenn der km-Stand sich ändert, dann auch alle Beobachter informieren
        $this->notify();
    
    }

    public function getMaxSpeed() {

        return $this->maxSpeed;
    
    }
    
    // der Tagessatz wird ab einer Mietdauer von 7 Tagen rabattiert
    public function getDailyRate( $days ) {

        $rate = 75.0;
        
        if ( $days >= 7 ) {
            $rate = 65.90;
        }
        return $rate;
    
    }
    
    ///////////////////////////////////////////////////////////////////////////
    // Eigenschaften, die für das Beobachter-Beobachtbar-Muster benötigt werden
    // zum Speichern der Beobachter-Objekte
    protected $beobachter = array();
    
    public function getKilometerstand(){
        
        return $this->kmStand;
    }
    
    // Methoden des Interface Beobachtbar
    
    // attach fügt einen neuen Beobachter hinzu
    public function attach(Beobachter $beobachter){
        $this->beobachter[] = $beobachter;
    }
    
    public function detach(Beobachter $beobachter){
        
        // Differenz bilden aus zwei Arrays (A1 - A2)
        // wir ziehen von unserem Feld der Beobachter ein Feld ab,
        // das nur den zu löschenden Beobachter beinhaltet
        //
        // array_diff() vergleicht die elemente der Felder als Zeichenketten
        /* $this->beobachter = array_diff($this->beobachter, array($beobachter)); */
        
        // Position des Objektes im Array suchen
        $position = array_search($beobachter, $this->beobachter);
        
        // ... und entfernen die gefundene Position aus dem Array
        if($position === false){
            
            return;
        }
        
        unset($this->beobachter[$position]);
    }
    
    /**
     * die Funktion notify() informiert alle Beobachter darüber,<br> dass sich
     * der Zustand des Autos geändert hat
     */
    public function notify(){
        
        // für jeden registrierten Beobachter...
        foreach ($this->beobachter as $beobachter){
            
            // ... wird die Methode update() aufgerufen
            $beobachter->update($this);
        }
    }

    // Interceptor toString() für die Ausgabe
    public function __toString(){
        
        return __CLASS__."(".$this->kmStand.")";
    }
}