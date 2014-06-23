<?php
/**
 * simuliert den Nachrichtenversand per Email (an wen auch immer)
 * @author benutzer
 *
 */
class DebugEmail implements Debugger{
    
    public function debug($nachricht){
        
        echo __CLASS__ . ": " . $nachricht . PHP_EOL;
    }
}