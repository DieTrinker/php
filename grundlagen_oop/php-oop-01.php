<?php
//	Aktivierung der Fehlermeldungen
error_reporting(E_ALL);

//	überschreibt den Wert in der php.ini und aktiviert Fehlermeldungen
ini_set('display_errors', 1);

//	die Klassendatei einbinden
include 'klassen/KlasseA.php';
include 'klassen/KlasseB.php';

//	eine Objektvariable anlegen und ein neues Objekt der KlasseA erzeugen
$objektA = new KlasseA();

//var_dump($objektA);

//	Provozieren von Fehlern

$objektA->a = 10;		//	ok

//$objektA->b = 20;		//	falsch

//$objektA->c = 30;		//	falsch

//	Zugriff auf die Methoden der KlasseA
$objektA->fktA();		//	ok, weil public
//$objektA->fktB();		//	falsch, weil protected
//$objektA->fktC();		//	falsch, weil private

//	eine Objektvariable anlegen und ein neues Objekt der KlasseB erzeugen
$objektB = new KlasseB();

var_dump($objektB);

$objektB->fktMyA();
$objektB->fktMyB();