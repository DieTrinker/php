<?php
// Einschalten der Fehlermeldung
error_reporting ( E_ALL );
ini_set ( "display_errors", true );

// Autoloader für die Klassen
function __autoload( $klasse ) {

    $file = 'klassen/' . $klasse . '.php';
    
    include $file;

}
/* ************************************************************************* */
$trenner = "--------------";

$auto = new Auto ( 150, 0 );

echo "Auto fährt: "
        . $auto->getMaxSpeed ()
        . " km/h schnell" . PHP_EOL
        . "und kostet: "
        . $auto->getDailyRate ( 1 )
        . " Euro / Tag" . PHP_EOL
        . "bzw: "
        . $auto->getDailyRate ( 7 )
        . "Euro / Tag (ab 7 Tage Mietdauer)"
        . PHP_EOL;

// Auto bekommt nun einen Spoiler
$coolesAuto = new DekoSpoiler ( $auto );

echo $trenner." ... mit Spoiler ".$trenner.PHP_EOL;

echo "coolesCar fährt: "
         . $coolesAuto->getMaxSpeed ()
         . " km/h schnell und kostet: ".PHP_EOL
         . $coolesAuto->getDailyRate ( 1 )
         . " €/Tag " . "bzw.: ".PHP_EOL
         . $coolesAuto->getDailyRate ( 7 )
         . " €/Tag (ab 7 Tage Mietdauer)"
         . PHP_EOL;


// Cooles Auto bekommt nun Breitreifen
$batmanAuto = new DekoBreitreifen($coolesAuto);

echo $trenner." ... mit Spoiler UND Breitreifen ".$trenner.PHP_EOL;

echo "Auto fährt: "
        .$batmanAuto->getMaxSpeed()." km/h schnell".PHP_EOL. "und kostet: "
        .$batmanAuto->getDailyRate(1)." Euro / Tag".PHP_EOL."bzw: "
        .$batmanAuto->getDailyRate(7). "Euro / Tag (ab 7 Tage Mietdauer)"
        .PHP_EOL; 