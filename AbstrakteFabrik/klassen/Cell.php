<?php

/**
 * abstrakte Produktklasse(abstraktes Produkt D)
 * 
 * diese Klasse wird benötigt, damit der Nutzer (die Client-Klasse) die
 * "Zelle" referenzieren kann.<br> 
 * 
 * @author benutzer
 *
 */
abstract class Cell{
    
    // das wird der Inhalt der einzelnen Zellen werden
    protected $content = null;
    
    public function __construct($c){
        
        $this->content = $c;
    }
    
    // Methode, die eine Zelle "zeichnet" (darstellt)
    abstract public function display();
}