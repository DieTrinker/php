<?php
class Erstinspektion implements Beobachter{
    
    public function update(Beobachtbar $auto){
        
        if($auto->getKilometerstand() >= 1000){
            echo "Erstinspektion fällig für ". $auto .PHP_EOL;
            
            // nach der Erstinspektion werden nur noch Intervallinspektionen
            // filgen ==> Auto braucht nicht mehr beobachtet werden -> austragen
            $auto->detach($this);
        }
    }
}