<?php
class Automobile{
    
    // Zündung ein/aus?
    protected $ignite = FALSE;
    
    // Schlüssel steckt?
    protected $keyPluggedIn = FALSE;
    
    // km-Stand
    protected $kmStand = 0;
    
    // Richtung als Konstanten der Klasse
    const RICHTUNG_VOR = 1;
    const RICHTUNG_RUECK = 2;
    
    
    // Zündschlüssel einstecken
    public function pluginKey(){
        
        $this->keyPluggedIn = true;
    }
    
    // Motor starten, zünden
    public function ignite(){
        if ($this->keyPluggedIn){
            $this->ignite = true;
        }
    }
    
    // fahren
    public function drive($richtung, $km){
        if($this->ignite){
            if (self::RICHTUNG_VOR){
                $this->kmStand += $km;
            } else {
                $this->kmStand -= $km;
            }
        }
    }
    
    // Zündung einschalten
    public function stopIgnition(){
        if ($this->ignite){
            $this->ignite = false;
        }
    }
    
    // Zündschlüssel entfernen
    public function removeKey(){
        if($this->ignite == true){
            $this->stopIgnition();
        }
        
        $this->keyPluggedIn = false;
    }
}