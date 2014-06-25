<?php

class Auto implements Vehicle {
    
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

}