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
    
// ein Automobil, welches adaptiert werden soll
$auto = new Automobile();

// ein Adapter
$adapter = new AutoAdapter($auto);

// ... Interaktion nur über den Adapter
$adapter->startEngine();

var_dump($auto, get_class_methods("Automobile"));

$adapter->moveForward(253);

var_dump($auto);

$adapter->stopEngine();

var_dump($auto);