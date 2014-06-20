<?php

class TextFactory extends TableFactory {
    
    // die abstrakten Klassen der TableFactory müssen implementiert werden
    // createTable() | createRow() | createHeader() | createCell($content)
    
    // hier muss eine ASCII (Text)-Tabelle erzeugt werden
    public function createTable() {

        return new TextTable ();
    
    }
    
    // hier muss eine ASCII (Text)-Zeile erzeugt werden
    public function createRow() {

        return new TextRow ();
    
    }
    
    // hier muss ein ASCII (Text)-Header erzeugt werden
    public function createHeader() {

        return new TextHeader ();
    
    }
    
    // hier muss eine ASCII (Text)-Zelle samt Inhalt erzeugt werden
    public function createCell( $content ) {

        return new TextCell ( $content );
    
    }

}