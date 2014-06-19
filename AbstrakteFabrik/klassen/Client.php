<?php

/**
 * Beispiel für einen Nutzerklasse
 * 
 * @author benutzer
 */
class Client {
    
    // hier folgt noch eine Menge Zeugs
    
    // welche konkrete Fabrik zur Laufzeit die Ausgaben übernimmt,
    // ist noch nicht festgelegt
    protected $tableFactory = NULL;
    
    // Konstruktur
    // beim Erzeugen eines neuen Clients wird eine konkrete Fabrik
    // als Parameter übergeben
    // ---> HTMLFabrik: HTML-Ausgabe
    // ---> TextFabrik: Text-Ausgabe
    public function __construct( TableFactory $tableFac ) {
        
        // hier wird die Assoziation zur Clientfabrik hergestellt
        $this->tableFactory = $tableFac;
    
    }
    
    // Methoden, die ein Array (mit den Daten) über die Fabrik ausgeben lässt
    // das Array muss zweidimensional sein wegen der Ausgabe in Tabellenform (Zeile, Spalte)
    /*
     * array(
     *      array("header1", "header2", "header n"),
     *      array(100, 200, n Hundert),
     *      array(1000, 2000, n Tausend)
     * )
     */
    public function showData( Array $data ) {

        if($this->tableFactory == null) {
            
            throw new Exception("Erst eine Fabrik festglegt");
        }
        
        // Abruf der Methoden der vier Methoden der Fabrik, um:
        // * Tabelle (Table)
        // * Header (Header)
        // * Reihe (Row)
        // * Zelle (Cell)
        // zu erzeugen
        
        // Tabelle erzeuegen (welche genau, hängt von der assoziierten Fabrik ab)
        $table = $this->tableFactory->createTable();
        
        // header erzeugen
        $header = $this->tableFactory->createHeader();
        
        // alle Überschriften stehen am Anfang des Feldes $data
        $headerLine = current($data);
        
        // alle Überschriften durchlaufen
        // und erzeugen für jede Überschrift eine HTML-TebellenZelle
        foreach ($headerLine as $head){
            
            $cell = $this->tableFactory->createCell($head);
            
            // die neue Tabellenzelle wird der Kopfzeile hinzugefügt
            $header->addCell($cell);
        }
        
        // die fertige Kopfzeile wird in die Tabelle eingetragen
        $table->setHeader($header);
        
        // die "restlichen" Reihe erzeugen aus $data enthalten die Daten
        while ($values = next($data)){
            
            $row = $this->tableFactory->createRow();
            
            // alle Werte in die "Tabelle" aufnehmen
            foreach ($values as $value){
                
                $cell = $this->tableFactory->createCell($value);
                
                // die neue Zelle wird zu einer TabellenZeile hinzugefügt
                $row->addCell($cell);
            }
            
            // die fertige Zeile zur Tabelle hinzufügen
            $table->addRow($row);
        }
        
        // das fertige Ergebnis lassen wir uns anzeigen
        $table->display();
    }

}