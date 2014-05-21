<?php
$link = mysql_connect('localhost', 'benutzer', 'benutzer');

if (! $link) {
    // wir lassen das Script sterben
    die("Keine Verbindung zum DB-Server möglich!");
}

$db = mysql_select_db('db_gbook');

if (! $db) {
    // wir lassen das Script sterben
    die("Kann die Db nicht verwenden!");
}

//  Einstellung des Verbindungszeichensatzes
mysql_set_charset('utf8', $link);