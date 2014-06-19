<?php

class HTMLHeader extends Header {

    public function display() {
        // Beginn der Kopfzeile
        echo "<thead>";
        echo "\t<tr style='font-weight: bold'>" . PHP_EOL;
        
        // Zellen der Kopfzeile
        // iteriere durch die Zellen der Kopfzeile
        foreach ( $this->cells as $cell ) {
            
            // und zeichne jede Zelle
            $cell->display ();
        }
        
        // Ende der Kopfzeile
        echo "\t</th>" . PHP_EOL;
        echo "</thead>";
    
    }

}