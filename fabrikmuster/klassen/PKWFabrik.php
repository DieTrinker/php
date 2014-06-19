<?php
class PKWFabrik extends Fabrik{
    
    // ruft den Konstruktor der Elternklasse auf
    public function __construct($name){
        
        parent::__construct($name);
    }
    
    // konkrete Implementierung der abstraktenMethode herstellen() aus der Oberklasse
    protected function herstellen(){
        
        return new PKW();
    }
}