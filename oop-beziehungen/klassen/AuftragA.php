<?php

class AuftragA {

    //  eine eindeutige Nummer, die den Auftrag (auf Dauer) identifiziert
    private $auftragsNummer = 0;
    
    //  der Konstruktor der Klasse AuftragA setzt die eindeutige Nummer des Auftrages
    public function __construct($auftragsNummer) {
        $this->auftragsNummer = $auftragsNummer;
    }
    
    public function getAuftragsNummer(){
        
        return $this->auftragsNummer;
    }
    
    public function __toString(){
        return "Auftrag: #".$this->auftragsNummer;
    }
}