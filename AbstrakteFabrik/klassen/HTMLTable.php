<?php
class HTMLTable extends Table{
    
    public function display(){
        
        // Beginn des HTML-Tabellenbereiches
        echo "<table border='1'>" .PHP_EOL;
        
        // Darstellung des Headers
        $this->header->display();
        
        // Darstellung aller Datenzeilen
        // iteriere durch das array()
        foreach($this->rows as $row){
           // ... und sage jeder Zeile, dass sie sich zeichen soll
           $row->display();  
        }
        
        // Beginn des HTML-Tabellenbereiches
        echo "</table>" .PHP_EOL;
    }
}