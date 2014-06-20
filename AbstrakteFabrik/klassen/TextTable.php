<?php
class TextTable extends Table{
    
    public function display(){
        
        // Ausgabe der Kopfzeile
        $this->header->display();
        
        //Ausgabe der Datenzeilen
        foreach ($this->rows as $row){
            $row->display();
        }
    }
}