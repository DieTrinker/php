<?php
class Intervallinspektion implements Beobachter{
    
    // Klasseneigenschaften
    protected $naechsteInspektion = 0;
    protected $intervall = 0;
    
    public function __construct($startKm, $wartungsintervall){
        
        // wann ist die nächste Inspektion fällig
        $this->naechsteInspektion = $startKm;
        
        // in welchem Intervall sind dann die folgenden Inspektionen fällig?
        $this->intervall = $wartungsintervall;
    }
    
    public function update(Beobachtbar $auto){
        
        if($auto->getKilometerstand() >= $this->naechsteInspektion){
            
            echo "Wartungsintervall für ".$auto."erreicht".PHP_EOL;
            
            // nächste Inspektion fällig
            $this->naechsteInspektion += $this->intervall;
        }
    }
}