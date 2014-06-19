<?php
class HTMLFactory extends TableFactory{
    
    
    // die abstrakten Klassen der TableFactory müssen implementiert werden
    // createTable() | createRow() | createHeader() | createCell($content)  
    
    // hier muss eine HTML-Tabelle erzeugt werden
    public function createTable(){
        
        return new HTMLTable();
    }
    
    // hier muss eine HTML-Zeile erzeugt werden
    public function createRow(){
        
        return new HTMLRow();
    }
    
    // hier muss ein HTML-Header erzeugt werden
    public function createHeader(){
        
        return new HTMLHeader();
    }
    
    // hier muss eine HTML-Zelle samt Inhalt erzeugt werden
    public function createCell($content){
        return new HTMLCell($content);
    }
}