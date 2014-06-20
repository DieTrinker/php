<?php
class TextRow extends Row{
    
    public function display(){
        
        // Ausgabe der oberen Rahmenlinie kann entfallen
        // (weil das sie untere Rahmenlinie des Headers ist)
        //echo "+". str_repeat("-", count($this->cells) * 11 - 1) . "+" . PHP_EOL;
        
        // Ausgabe der Datenzellen
        foreach ($this->cells as $cell){
            
            $cell->display();
        }
        
        echo"|" . PHP_EOL;  // Rahmenlinie ganz rechts am Rand der Tabelle
        
        // Ausgabe untere Rahmenlinie
        echo "+". str_repeat("-", count($this->cells) * 11 - 1) . "+" . PHP_EOL;
    }
}