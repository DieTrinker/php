<?php
/**
 * abstrakte Produktklasse(abstraktes Produkt A)
 * 
 * diese Klasse wird benötigt, damit der Nutzer (die Client-Klasse) die
 * "Tabelle" referenzieren kann.<br> 
 * 
 * @author benutzer
 *
 */
abstract class Table{
    
    // wir brauchen eine Kopfzeile
    protected $header = NULL;
    
    // wir brauchen beliebig viele Zeilen
    protected $rows = array();
    
    // Methode, um eine Methode hinzuzufügen
    public function setHeader(Header $h){
        $this->header = $h;
    }
    
    // Methode, um eine DatenZeile hinzuzufügen
    public function addRow(Row $r){
        
        $this->rows[] = $r;
    }
    
    // abstrakte Methode, de eine Tabelle "zeichnet" (darstellt)
    abstract public function display();
}