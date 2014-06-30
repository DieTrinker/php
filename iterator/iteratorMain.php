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
    
// neue Autoliste erzeugen
$liste = new CarList("autos.csv");

// alle Autos der Liste ausgeben
while ($liste->valid()){
    
    // das aktuelle auto aus der Liste holen
    $car = $liste->current();
    
    // Auto ausgeben
    echo $car;
    
    // wechseln zum nächsten Element
    $liste->next();
    
}

echo "== Versuch, die Liste noch einmal auszugeben ... oops!! ===".PHP_EOL;

// Versuch, die Liste noch einmal auszugeben
// ... ooops
while ($liste->valid()){

    // das aktuelle auto aus der Liste holen
    $car = $liste->current();

    // Auto ausgeben
    echo $car;

    // wechseln zum nächsten Element
    $liste->next();

}

echo "=== Liste muss zurückgesetzt werden ===".PHP_EOL;

// Liste muss zurückgesetzt werden
$liste->rewind();

while ($liste->valid()){

    // das aktuelle auto aus der Liste holen
    $car = $liste->current();

    // Auto ausgeben
    echo $car;

    // wechseln zum nächsten Element
    $liste->next();

}

echo "=== mit foreach ===".PHP_EOL;

// besser so...
// mit foreach()
foreach ($liste as $auto){
    
    echo $auto;
}