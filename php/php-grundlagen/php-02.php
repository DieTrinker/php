<!-- Variablen und Datentypen -->
<?php

// datentypen: boolean, ganzen Zahlen, gebrochenen Zahlen, Zeichenketten
    
// boolesche Typen ...
    
$x = true;
$x = false;

$y = TRUE;
$Y = FALSE;

// ganze Zahlen

$x =  123;
$x = -123;

$oktal  = 0123;     // 8 ist die Basis, also: 3*8^0 + 2*8^1 + 1*8^2 = 3*1 + 2*8 + 1*64 = 83
$hex    = 0xFF;     // 16 ist die Basis, also: F*16^0 + F*16^1 = 15*1 + 15*16 = 255

// gebrochene Zahlen (Fließkommazahlen)

$y = 1.234;
$y = 1.2e3;    // 1.2 * 10^3 = 1.2 * 1000 = 1200
$y = 1E-3;     // 1.0 * 10^-3 = 1.0 / 1000 = 0.001

echo $y;


// Zeichenketten

$a = "Hallo Welt!";
$b = 'Hallo Welt!';

echo "Hallo Welt!";

echo "<br />";

echo "$a";        // gibt aus: Hallo Welt!    Zeichenkette MIT Substitution!
echo '$b';        // gibt aus: $b             Zeichenkette OHNE Substitution!

echo "<br />";


// Variablen werden mit $ vor dem Bezeichner notiert

$x = 100;
$y = "Hallo";
echo $x;

// Variablen sind case-sensitive (Groß- und Kleinschreibung wird unterschieden)

$a = 100;
$A = "Hallo Welt";

// Es existieren variable Variablen

$x = "jette";
$$x = "hallo welt";    // eigentlich $jette = "hallo welt"

echo $x;               // gibt aus: jette
echo $jette;           // gibt aus: hallo welt

// Gültigkeitsbereiche: lokal, global und zusätzlich super-globalen Variablen

var_dump($_SERVER);
