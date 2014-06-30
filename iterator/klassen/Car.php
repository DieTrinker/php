<?php
class Car{
    
    protected $hersteller = "";
    protected $farbe = "";
    protected $kilometerstand = 0;
    
    public function __construct($h, $f, $k){
        
        $this->hersteller = $h;
        $this->farbe = $f;
        $this->kilometerstand = $k;
    }
    
    public function __toString(){
        
        return __CLASS__ . " (".$this->hersteller
        .", "
        .$this->farbe
        .", "
        .$this->kilometerstand
        .") "
        .PHP_EOL;
    }
}