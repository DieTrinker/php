<?php
interface Beobachtbar{
    // fügt einen neuen Beobachert (Stalker) zu dem Subjekt hinzu
    public function attach(Beobachter $observer);
    
    // entfernt einen Beobachter ahs der der Lister der Beobchter
    public function detach(Beobachter $observer);
    
    // Informiert alle Beobachter, das sich etwas getan hat
    // in Java ist notify() bereits besetzt; dort einen anderen Bezeichner verwenden
    public function notify();
}