<?php
/**
 * Die Klasse dient als Vorlage für konkrete Dekorierer
 * @author benutzer
 *
 */
abstract class VehicleDeko implements Vehicle{
    
    // wir speichern eine Reference auf ein Objekt der Klasse Vehicle
    // ==> Assoziation 1:1
    protected $vehicle = null;
    
    // Konstruktor
    public function __construct(Vehicle $v){
        $this->vehicle = $v;
    }
    
    // zu implementierende Methoden aus Vehicle
    /**
     * Damit die konkreten Dekorierer die Methoden des Vehicles nicht alle selbst
     * implementieren müssen, werden die gemeinsamen Methoden der Dekorierer
     * bereits in der abstrakten Klasse (VehicleDeko) implementiert und an die
     * abgeleiteten Klassen vererbt
     */
    public function startEngine(){
        $this->startEngine();
    }
    
    public function moveForward($km){
        $this->moveForward($km);
    }
    
    public function stopEngine(){
        $this->stopEngine();
    }
    
    // Methoden für den Dekorierer (aus Vehicle)
    /*
     * diese bleiben abstrakt und werden erst von den konkreten Dekorierer implementiert
     */
    abstract public function getMaxSpeed();
    
    abstract public function getDailyRate($days);
}