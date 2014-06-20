<?php
class TextHeader extends Header{
    
    /**
     * +--------+-------+-------+-------+-------+
     * |Ü1      |Ü2     |Ü3     |Ü4     |Ü5     |
     * +--------+-------+-------+-------+-------+
     * 
     * |<- 10 Zeichen ->|
     * 
     * !CodeTemplates.overridecomment.nonjd!
     * @see Row::display()
     */
    public function display(){
        
        // Ausgabe obere Rahmenlinie
        // Anzahl der Zellen * 11 +1
        // str_repeat ("-", ...) wiederholt die Ausgabe der Zeichenkette
        // count( ... ) --> Anzahl der Zellen
        echo "+". str_repeat("-", count($this->cells) * 11 - 1) . "+" . PHP_EOL;
        
        // Ausgabe der Zellen
        foreach ($this->cells as $cell){
            
            $cell->display();
        }
        
        echo"|" . PHP_EOL;  // Rahmenlinie ganz rechts am Rand der Tabelle
        
        // Ausgabe untere Rahmenlinie
        echo "+". str_repeat("-", count($this->cells) * 11 - 1) . "+" . PHP_EOL;
    }
}