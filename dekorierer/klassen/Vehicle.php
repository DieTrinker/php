<?php
interface Vehicle{
    
    public function startEngine();
    
    public function moveForward($km);
    
    public function stopEngine();
    
    // Methoden für den Dekorierer
    public function getMaxSpeed();
    
    public function getDailyRate($days);
}