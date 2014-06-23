<?php
/**
 * simuliert das Logging in einer Datei
 * @author benutzer
 *
 */
class DebugLog implements Debugger{
    
    public function debug($nachricht){
        echo __CLASS__ . ": " . $nachricht . PHP_EOL;
        
        // Protokollierung in einer Datei
        error_log($nachricht);
    }
}