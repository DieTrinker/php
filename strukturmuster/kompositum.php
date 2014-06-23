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
// wir testen das Kompositum

$kompositum = new DebugKompositum();

$debLog = new DebugLog();

$debMail = new DebugEmail();

$debSMS = new DebugSMS();

// Registrierung im ersten Schritt von zwei Debuggern beim Kompositum
$kompositum->addDebugger($debLog);
$kompositum->addDebugger($debMail);


// wir benutzen das "Große Ganze", um die einzelnen
// Komponenten "debuggen" zu lassen
$kompositum->debug("Hallo Welt");

// debug
echo "<br>";

// Noch einen Debugger registrieren und dann debuggen lassen
$kompositum->addDebugger($debSMS);
$kompositum->debug("Pause!");

/* ************************************************************************** */
// Verschachtelung der Kompositionen
$dasGrosseGanze = new DebugKompositum();

$logDebug = new DebugLog();
$mailDebug = new DebugEmail();

$smsDebug1 = new DebugSMS();
$smsDebug2 = new DebugSMS();

// wir fassen smsDebug1 und smsDebug2 zu einem Kompositum zusammen
$dasSMSKompositum = new DebugKompositum();

$dasSMSKompositum->addDebugger($smsDebug1);
$dasSMSKompositum->addDebugger($smsDebug2);

// ... und fügen aslles zum Großen-Ganzen zusammen
$dasGrosseGanze->addDebugger($logDebug);
$dasGrosseGanze->addDebugger($mailDebug);
$dasGrosseGanze->addDebugger($dasSMSKompositum);    // Kompositum als Teil des Kompositums

//... und der Test ...
echo "<br>**************************************************************************<br>".PHP_EOL;

$dasGrosseGanze->debug("*** Test des 'Großen-Ganzen'");
