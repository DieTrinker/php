<?php
interface Debugger{
    
    /**
     * Methode, die für die konkrete Komponente und
     * für das Kompositum als gemeinsames Verhalten vorgeschrieben wird
     * @param unknown $nachricht
     */
    public function debug($nachricht);
}