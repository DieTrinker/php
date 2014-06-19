<?php

/**
 * abstrakte Produktklasse(abstraktes Produkt B)
 * 
 * diese Klasse wird benötigt, damit der Nutzer (die Client-Klasse) die
 * "Zeile" referenzieren kann.<br> 
 * 
 * @author benutzer
 *
 */
abstract class Row{
    
    // wir brauchen Zellen für die Daten
    protected $cells = array();
    
    // Methode, um Zellen zu einer Zeile hinzuzufügen
    public function addCell(Cell $c){
        
        $this->cells[] = $c;
    }

    // abstrakte Methode, de eine (Daten-)Zeile "zeichnet" (darstellt)
    abstract public function display();
}