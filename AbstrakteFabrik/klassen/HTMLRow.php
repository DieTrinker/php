<?php
class HTMLRow extends Row{
    
    public function display(){
        
        // Beginn der HTML-Zeile
        echo "\t<tr>" .PHP_EOL;
        
        // alle Zellen der Zeile
        // iteriere durch das Array
        foreach ($this->cells as $cell){
            
            // ... und zeichne jede Zelle
            $cell->display();
        }
        
        // Ende der HTML-Zeile
        echo "\t</tr>" .PHP_EOL;
    }
}