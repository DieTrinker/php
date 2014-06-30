<?php
interface Iterierbar{
    
    // liefert das aktuelle Objekt innerhalb der iterierbaren Datenmenge
    public function current();
    
    // liefert die aktuelle Position innerhalb der iterierbaren Datenmenge
    public function key();
    
    // setzt den "Zeiger" auf das nächste Element in der iterierbaren Datenmenge
    public function next();
    
    // prüft, ob der Positions-"Zeiger" auf einem gültigen Element steht
    public function valid();
    
    // setzt den Positions-"Zeiger" wieder auf den ersten Eintrag der iterierbaren Datenmenge
    public function rewind();
}