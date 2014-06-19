<?php
abstract class Fabrik{
    
    private  $name = "";
    
    public function __construct($n){
        
        $this->name = $n;
    }
    
    // zentrale Schnittstelle zur Applkation
    public function erzeuge(){
        
        // später dank des dynamischen Bindens hier die Herstellung der
        // eigentlichen Produkte
        return $this->herstellen();
    }
    
    // die eigentliche Objekterzeugung findet später in den konkreten Fabriken statt
    abstract protected function herstellen();
}