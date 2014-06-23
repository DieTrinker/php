<?php
/**
 * simuliert den Nachrichtenversand per SMS (an wen auch immer)
 * @author benutzer
 *
 */
class DebugSMS implements Debugger{

    public function debug($nachricht){

        echo __CLASS__ . ": " . $nachricht . PHP_EOL;
    }
}