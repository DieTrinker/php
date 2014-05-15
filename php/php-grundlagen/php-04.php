<!--  Kontrollstrukturen -->
<?php

// bedingte Anweisung

$x = true;

if ($x)
    echo "alles ist wahr <br />" . PHP_EOL;
else
    echo "alles ist falsch <br />" . php_EOL;

$y = 10;

if ($y == 1)
    echo "Y hat den Wert ZWEI <br />" . PHP_EOL;
else if ($y == 2)
    echo "Y hat den Wert ZWEI <br />" . PHP_EOL;
else
    echo "Ich kann nur bis ZWEI zählen <br />" . PHP_EOL;

// http://www.php.net/manual/de/control-structures.alternative-syntax.php
// bedingte Anweisung, alternative Form

$a = false;

if ($a) :
    echo "alles ist wahr <br />" . PHP_EOL;

else :
    echo "alles ist falsch <br />" . PHP_EOL;

endif;

// Wiederholungsanweisung, Schleifen

$i = 0;

while ($i < 10) {

    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;

    $i = $i + 1;
}

$i = 0;

do {

    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;

    $i = $i + 1;

} while ($i < 10);

// while-Schleife in alternativer Schreibweise

while ($i > 0) :
    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;

    $i = $i - 1;

endwhile;

// morgenstern'che Variante (Christian)
$i = 10;
while ($i-- > 0) :
    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;

endwhile;


// Zählschleife

for($i = 0; $i < 10; $i = $i + 1)
    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;

// Zählschleife in alternative Schreibweise
for($i = 0; $i < 10; $i = $i + 1):
    echo "i hat den Wert: " . $i . " <br />" . PHP_EOL;
endfor;


/**
 * Mehrfachauswahl mit switch ... case
 * 
 */

$student = "christian";

// als Ausgabe erwarten wir: "christian ist ein Student"
switch ($student) 
{
     
     case "jette":        
         echo "jette ist eine Studentin <br />";
         break;
     
     case "christian":    
         echo "christian ist ein Student <br />";
         break;
         
     case "kluschke":    
         echo "hilmar ist auch ein Student<br />";
         break;
         
     default:
         echo "alle sind Studenten <br />";
         break;
}

// ohne switch ... case würde das so aussehen:

if( $student == "jette") {
    echo "jette ist eine Studentin <br />";
} else if( $student == "christian") {
    echo "christian ist ein Student <br />";
} else if( $student == "kluschke") {
    echo "hilmar ist auch ein Student<br />";
} else 
    echo "alle sind Studenten <br />";

/**
 * foreach-Schleife ...
 * 
 * ... kann verwendet werden, um iterierbare Daten zu verarbeiten
 */ 

$studenten = array( "daniel", "marcel", "valentina", "christian", "hilamr", "jette", "niels", "rene");

echo "<br />" . PHP_EOL;

// Variante 1, verarbeitet einen Array-Ausdruck rein wertmäßig
    
// ... für alle (foreach) Studenten wird eine Ausgabe erzeugt.
//     Der Einzelne Student wird für die Schleife 
//     als $student-Variable bereitgestellt
foreach( $studenten as $student )
        echo $student . "<br />" . PHP_EOL;
    
// Variante 2: stellt zusätzlich den Schlüsselwert zur Verfügung
    
foreach( $studenten as $key => $student)
    echo $key . ": " . $student . "<br />" . PHP_EOL;
    
// Experiment: wir wollen an jeden Studentennamen eine Zeichenkette anhängen
// Ein & vor $student sorgt jedoch erst dafür!!!
foreach( $studenten as &$student )
    $student = $student . " geht gleich nach Hause";
    
var_dump ( $studenten );

