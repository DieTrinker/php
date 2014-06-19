<?php
// Einschalten der Fehlermeldung
error_reporting(E_ALL);
ini_set("display_errors", true);

// Autoloader für die Klassen
function __autoload($klasse){

    $file = 'klassen/'.$klasse.'.php';

    include $file;
}
/* ************************************************************************** */
// wir tsten unsere HTML-Fabrik

$data = array(
    
        array("Überschrift1","Überschrift2","Überschrift3","Überschrift4","Überschrift5"),
        array(1,2,3,4,5),
        array(10,20,30,40,50),
        array(100,200,300,400,500)
);

// wir erzeugen die Fabrik
$fabrik = new HTMLFactory();

// wir erzeugen den Client und injizieren die Fabrik
$client = new Client($fabrik);

// wir lassen den Client die Daten ausgeben
$client->showData($data);