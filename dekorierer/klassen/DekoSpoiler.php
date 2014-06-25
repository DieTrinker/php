<?php

/**
 * Klasse erbt alles, was im VehicleDeko schon fertig ist und muss nur noch das implementieren, was
 * in VehicleDeko schon fertig ist
 * unfertige Dinge müssen noch implementiert werden (abstrakte Methoden)
 */
class DekoSpoiler extends VehicleDeko {

    public function getMaxSpeed() {
        
        // ein Spoiler lässt das "Vehicle" 15 Km/h schneller fahren
        return $this->vehicle->getMaxSpeed () + 15;
    
    }
    
    // $days gibt die Gesamtmietdauer an, von der der Tagessatz abhängig ist
    // (ab 7 Tage gäbe es nämlich Rabatt)
    public function getDailyRate( $days ) {
        
        // ein Spoiler kostet pro Tag 10 € mehr
        return $this->vehicle->getDailyRate ( $days ) + 10;
    
    }

}