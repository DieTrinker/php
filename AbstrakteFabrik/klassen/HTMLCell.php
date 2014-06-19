<?php
class HTMLCell extends Cell{
      
    public function display(){
        
        // Beginn der Zelle
        echo "\t\t<td>";
        
        // Inhalt der Zelle
        echo $this->content;
        
        // Ende der Zelle
        echo "\t\t<td>".PHP_EOL;
    }
}