<?php
/**
 * Das Zusammenspiel zwischen php und mysql funktioniert über das php-mysql-api
 *
 *  http://del.php.net/manual/de/ref.mysql.php
 *
 * Hinweis: Apache muss für php und php-mysql nachgerüstet werden:
 *  apt-get install php5 php5-mysql
 *
 *  allgemeine Herangehensweise:
 *      1.  Verbindung zum DB-Server aufbauen
 *      2.  Abfragen an den Server senden und anworten verarbeiten
 *      3.  Verbindung zum Server abbauen
 */

//  Verbindung zum Server aufbauen
/*
 * DB-Server:   a) IP
 *              b) DNS
 * DB-Benutzer: mysql-Benutzername
 * DB-Passwort: mysql-Passwort
 */
//$link = mysql_connect(<db-server>, <db-benutzer, <db-passwort>);
$link = mysql_connect('127.0.0.1', 'root', 'benutzer');

//  prüfen, ob das funktioniert hat
if(mysql_errno() != 0) {
    echo "Es hat irgendetwas nicht funktioniert: " . mysql_error()."<br>";
} else {
    echo "Verbindung mit DB-Server hergestellt...<br>";
}

/*
 * Abfragen formulieren und verarbeiten
 * ************************************
 *
 * CRUD - Create Read Update Delete
 *
 *  a)  Daten abfragen mit SELECT
 */

//  zum Arbeiten mit den Daten die DB auswählen
$db = mysql_select_db('db_world', $link);

if ($db) {
    echo "DB ausgewählt...<br>";
} else {
    echo "DB nicht ausgewählt!<br>";
}

$abfrage = "SELECT
                code, name, continent
            FROM
                Country
            LIMIT 10";

$ergebnis = mysql_query($abfrage, $link);

/*  wir prüfen, ob wir eine Datenmenge (ResourceID) erhalten haben...  */
if($ergebnis != false) {

    echo "Ergebnis: ".$ergebnis."<br>";
    //  ... und geben diese Datenmenge aus
    /*  um an die Datensätze zu gelangen, müssen wir diese
     * nacheinander aus der Datenmenge auslesen
     * mysql_fetch_array(ResourceID, Ergebnistyp)
     * -->  Ergebnistyp legt fest, was für eine Art Array entstehen soll
     * -->  MYSQL_NUM:      indiziertes Array
     * -->  MYSQL_ASSOC:    assoziiertes Array
     * -->  MYSQL_BOTH:     beide Varianten (Standard)
     */
    /*  1. und 2. Datensatz */
    $feld = mysql_fetch_array($ergebnis, MYSQL_NUM);
    $feld = mysql_fetch_array($ergebnis, MYSQL_NUM);
    
    /*  3. und 4. Datensatz */
    $feld = mysql_fetch_array($ergebnis, MYSQL_ASSOC);
    $feld = mysql_fetch_array($ergebnis, MYSQL_ASSOC);
    
    /*  5. und 6. Datensatz */
    $feld = mysql_fetch_array($ergebnis, MYSQL_ASSOC);
    $feld = mysql_fetch_array($ergebnis, MYSQL_ASSOC);
    
    /*  7. und 8. Datensatz */
    $feld = mysql_fetch_array($ergebnis, MYSQL_BOTH);
    $feld = mysql_fetch_array($ergebnis, MYSQL_BOTH);
    
    /*  9. und 10. Datensatz */
    $feld = mysql_fetch_array($ergebnis);
    $feld = mysql_fetch_array($ergebnis);
    
    //var_dump($feld);
    
    /*  11. Datensatz  führt zu einem Fehler: false */
    //$feld = mysql_fetch_array($ergebnis);
    //var_dump($feld = false);
    
    /*  "spule" auf den Anfang der Ressource zurück */
    mysql_data_seek($ergebnis, 0);
    
    //  ... und damit kann eine Schleife gesteuert werden
    while ($feld = mysql_fetch_array($ergebnis, MYSQL_NUM)) {
        $i = 0;
        // ... verarbeite den Datensatz
        for($i = 0; $i < sizeof($feld); $i++) {
            echo $feld[$i]."<br>";
        }
    }
    
} else {
    echo "Kein Ergebnis vorhanden: ".mysql_error()."<br>";
}