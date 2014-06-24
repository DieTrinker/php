<?php
interface Vehicle{
    
    public function startEngine();
    
    public function moveForward($km);
    
    public function stopEngine();
}