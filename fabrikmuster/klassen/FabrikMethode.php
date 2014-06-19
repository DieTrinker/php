<?php

class FabrikMethode {

    public function erzeuge( $produktname ) {
        
        // Initialisierung des Rückgabewertes
        $produkt = null;
        
        switch ( $produktname ) {
            case "Flugzeug" :
                $produkt = new Flugzeug ();
                break;
            case "PKW" :
                $produkt = new PKW ();
                break;
            case "LKW" :
                $produkt = new LKW ();
                break;
        }
        return $produkt;
    
    }
}