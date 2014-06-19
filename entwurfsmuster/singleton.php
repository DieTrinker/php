<?php
// Einschalten der Fehlermeldung
error_reporting(E_ALL);
ini_set("display_errors", true);

// Autoloader für die Klassen
function __autoload($klasse){
    
    $file = 'klassen/'.$klasse.'.php';
    
    include $file;
}

/* *********************************** */
// Singleton testen
$s = Singleton::getInstance();
echo spl_object_hash($s). PHP_EOL;

$s1 = Singleton::getInstance();
echo spl_object_hash($s1). PHP_EOL;

/* $s2 = new Singleton();
echo spl_object_hash($s2). PHP_EOL; */

$s3 = clone $s1;
echo spl_object_hash($s3). PHP_EOL;