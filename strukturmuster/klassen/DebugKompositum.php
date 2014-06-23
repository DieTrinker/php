<?php
/**
 * implementiert ein Kompositum
 * @author benutzer
 *
 */
class DebugKompositum implements Debugger{
    
    // dient der Aggregation beliebig vieler Debug-Komponenten
    private $debugger = array();
    
    // diese Methode ist lt. Interface vorgeschrieben
    public function debug($nachricht){

        // iteriere über alle Debugger im Array
        foreach ($this->debugger as $kind){
            
            // ... und delegiere den Aufruf an die Kind-Objekte
            $kind->debug($nachricht);
        }
    }
    
    // eine Methode, um weitere Debugger zum Kompositum hinzuzufügen
    public function addDebugger(Debugger $d){

        $this->debugger[] = $d;
    }
    
    // eine Methode, um einen Debugger aus dem Kompositum zu entfernen
    public function removeDebugger(){
        
        // durchsucht das Array nach dem Debugger und liefert entweder
        // die Position im Array oder FALSE
        $postion = array_search($d, $this->debugger);
        
        // falls nichts gefunden wurde...
        if($postion === false){
            return false;
        }
        
        // ... sonst den Debugger löschen
        unset($this->debugger[$postion]);
        
        return true;
    }
}