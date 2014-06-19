<?php
abstract class Produkt{
    
    // überschreiben des Interceptors, damit wir in den abgeleiteten Klassen
    // kein __toString implementieren müssen
    public function __toString(){
        
        return get_class($this).PHP_EOL."<br>";
    }
    
    
}