<?php
/**
 * Liste von Autos, die aus einer CSV-Datei ausgelesen werden
 * 
 * die Implementierung der eigenen Schnittstelle Iterierbar ist eigentlich nicht notwendig
 * Das Interface Iterator (bei PHP in Core bereits vorhanden) hat exakt den gleiche Aufbau
 * --> hier sollte nur gezeigt werden, das foreach() ---> siehe iteratorMain.php, das
 * Interface erfordert
 * 
 * richtig wäre: class Carlist implements Iterator { ... }
 * 
 * aber: iterieren würde Iterator auch, jedoch ohne die Funktionalität von foreach() 
 * 
 * @author benutzer
 *
 */
class CarList implements Iterierbar, Iterator{
    
    // Klasseneigenschaften
    
    // Positionszeiger
    protected $position = 0;
    
    // ein Array speichert die Autos
    protected $cars = array();
    
    // der Konstruktor liest die Daten der Autos aus einer CSV-Datei
    public function __construct($filename){
        
        // CSV -> comma separeted values
        // CSV - Dateien bestehen aus Datenzeilen (1 DS pro Zeile)
        // und Feldern, die standardmäßig durch Kommata voneinander getrennt werden
        // die Verarbeitung erfolgt über den Funktionsaufruf
        // fgetcsv() --> (file get csv)
        // diese Funktion liefert im Ergebnis ein Array
        
        // der mehrmalige Aufruf von fgetcsv() durchläuft alle Datenzeilen
        // in dieser Datei bis zum EOF (EndOfFile) --> false
        
        // TODO
        // alle DS aus der CSV-Datei lesen
        // für jede DZeile ein car-Objekt erzeugen
        // jedes neue car-Objekt in die Datenstruktur (Array) $cars eintragen
        
        if(!file_exists($filename)){
            throw new Exception("Datei existiert nicht");
        }
        
        // mit fopen() kann eine Datei geöffnet werden
        // fopen() liefert bei Erfolg ein Handle (Descriptor),
        // über den bei Bedarf auf die Datei zugegriffen werden kann
        $file = fopen($filename, 'r');  // Lesezugriff (r = read)
        
        // in einer Schleife alle Datenzeilen durchlaufen
        while(($datenzeile = fgetcsv($file)) !== false) {
            
            $car = new Car($datenzeile[0], $datenzeile[1], $datenzeile[2]);
            
            $this->cars[] = $car;
        }
        
        // schließt das Datei-Handle
        fclose($file);
    }
    
    // zu implementierende Methode des Interface Iterierbar
    // liefert das aktuelle Objekt innerhalb der iterierbaren Datenmenge
    public function current(){
        
        $retVal = null;
        
        // prüfen, ob an der aktuellen Position ein Auto (Eintrag) existiert
        if(isset($this->cars[$this->position])){
            $retVal = $this->cars[$this->position];
        }
        
        return $retVal;
    }
    
    // zu implementierende Methode des Interface Iterierbar
    // liefert die aktuelle Position innerhalb der iterierbaren Datenmenge
    public function key(){
        
        return $this->position;
    }
    
    // zu implementierende Methode des Interface Iterierbar
    // setzt den "Zeiger" auf das nächste Element in der iterierbaren Datenmenge
    public function next(){
        
        $this->position++;
    }
    
    // zu implementierende Methode des Interface Iterierbar
    // prüft, ob der Positions-"Zeiger" auf einem gültigen Element steht
    // Rückgabewert ist vom Typ boolean
    public function valid(){
        
        // Positionszeiger muss kleiner sein, als die Arraylänge -> Index beginnt bei 0
        return $this->position < count($this->cars);
    }
    
    // zu implementierende Methode des Interface Iterierbar
    // setzt den Positions-"Zeiger" wieder auf den ersten Eintrag der iterierbaren Datenmenge
    public function rewind(){
        
        $this->position = 0;
    }
    
}