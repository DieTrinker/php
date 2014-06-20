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
// wir testen unsere HTML-Fabrik

$data = array(
    
        array("Überschr1","Ue2","Ue3","Ue4","Ue5"),
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

/* ************************************************************************** */
// wir testen unsere Text(ASCII)-Fabrik
// wir erzeugen die Fabrik
$fabrik = new TextFactory();

// wir erzeugen den Client und injizieren die Fabrik
$client = new Client($fabrik);

// wir lassen den Client die Daten ausgeben
$client->showData($data);