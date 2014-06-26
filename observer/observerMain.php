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
    
$auto = new Auto(150, 0);

$erstInspektor = new Erstinspektion();

// die erste IntervallInspektion bei 3500 km, dann alle 2500 km
$intervallInspektor = new Intervallinspektion(3500, 2500);

$auto->attach($erstInspektor);
$auto->attach($auto);

// Auto ein paar km fahren
// Dessau -> Paris
$auto->moveForward(991);

// Paris -> Dessau (Erstinspaktor müsste sich melden)
$auto->moveForward(991);

// Dessau -> Sevilla (anschließend müsste sich Intervallinspektor melden)
$auto->moveForward(2730);

