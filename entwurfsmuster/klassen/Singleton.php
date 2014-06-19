<?php
class Singleton {
    
    // eine statische Eigenschaft zum Speichern der Instance
    private static  $instance = NULL;
    
    // eine statische Methode, um die Instanz auszuliefern
    public static function getInstance(){
        
        // falls das Exemplar noch nicht erzeugt wurde
        if(self::$instance == null){
            
            self::$instance = new Singleton();
        }
        
        return self::$instance;
    }
    
    // Absicherung, dass keine weiteren Instanzen erzeugt werden können
    private function __construct(){
        
    }
    
    // Klonen?
    private function __clone(){
        
    }
}