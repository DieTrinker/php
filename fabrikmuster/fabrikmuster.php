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
    // ab hier die Fabrikationen
    
// konkrete Fabrik erzeugen
$pkwFabrik = new PKWFabrik("PHP-MD");
$lkwFabrik = new LKWFabrik("PHP-MD");
$flugzeugFabrik = new FlugzeugFabrik("PHP-MD");

$p1 = $pkwFabrik->erzeuge();
$l1 = $lkwFabrik->erzeuge();
$f1 = $flugzeugFabrik->erzeuge();

var_dump($p1);
echo $p1;
var_dump($l1);
echo $l1;
var_dump($f1);
echo $f1;
echo "<br><br>ab hier mit FlugzeugMethode()<br>";
$fabrikMethode = new FabrikMethode();

$p2 = $fabrikMethode->erzeuge("PKW");
$l2 = $fabrikMethode->erzeuge("LKW");
$f2 = $fabrikMethode->erzeuge("Flugzeug");

var_dump($p2);
echo $p2;
var_dump($l2);
echo $l2;
var_dump($f2);
echo $f2;
