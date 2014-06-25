<?php

/**
 * Klasse erbt alles, was im VehicleDeko schon fertig ist und muss nur noch das implementieren, was
 * in VehicleDeko schon fertig ist
 * unfertige Dinge müssen noch implementiert werden (abstrakte Methoden)
 */
class DekoBreitreifen extends VehicleDeko {

    public function getMaxSpeed() {

        return $this->vehicle->getMaxSpeed () * 0.95;
    
    }

    public function getDailyRate( $days ) {

        return $this->vehicle->getDailyRate ( $days ) + 5;
    
    }

}