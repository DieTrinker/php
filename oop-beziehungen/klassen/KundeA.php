<?php

class KundeA {
    
    // die Auftraege des Kunden werden in einem Array gespeichert
    private $auftraege = array ();

    private $auftragszaehler = 0;
    
    // maximale anzahl an Aufträgen
    private $maxAuftraege = 3;

    public function setLink( AuftragA $a ) {
        
        // 1. Problem: wie stelle ich sicher, dass es nicht mehr als 4 Aufträge werden?
        if ( $this->auftragszaehler > $this->maxAuftraege ) {
            throw new Exception ( 'Es sind bereits 4 Aufträge für den Kunden registriert' );
        }
        
        // oder:
        /*
         * if (count($this->auftraege) == $this->maxAuftraege) { throw new Exception('Es sind
         * bereits 4 Aufträge für den Kunden registriert'); }
         */
        
        // 2. Problem: wie halte ich die bis zu 4 Aufträge auseinander?
        // die Auftragsnummer dient als Index für das Feld Auftraege
        
        if ( array_key_exists ( $a->getAuftragsNummer (), $this->auftraege ) ) {
            throw new Exception ( 'Dieser Auftrag ist bereits registriert' );
        }
        
        $this->auftraege [ $a->getAuftragsNummer () ] = $a;
        $this->auftragszaehler ++;
    
    }
    
    // liefert einen einzelnen Auftrag
    public function getLink( $auftragsNummer ) {

        $auftrag = null;
        
        if ( array_key_exists ( $auftragsNummer, $this->auftraege ) ) {
            $auftrag = $this->auftraege [ $auftragsNummer ];
        }
        
        return $auftrag;
    
    }
    
    // liefert das Auftragsfeld
    public function getAllLinks() {

        return $this->auftraege;
    
    }
    
    // löscht eine einzelne Beziehung zu einem Auftrag
    public function removeLink( $auftragsNummer ) {

        if ( array_key_exists ( $auftragsNummer, $this->auftraege ) ) {
            // unset() löscht einen einzelnen Schlüsselwert aus dem Array
            unset ( $this->auftraege [ $auftragsNummer ] );
            $this->auftragszaehler --;
        }
    
    }
    
    // löscht alle Beziehungen zu den Aufträgen
    public function removeAllLinks() {

        $this->auftraege = array ();
        $this->auftragszaehler = 0;
    
    }

    public function __toString() {

        return __CLASS__ . " hat folgende Aufträge: ";
    
    }

}