<h1>Bitte Das Formular ausfüllen</h1>

<?php
// prüfen, ob wir auswerten müssen
// (Eintraege-Button gedrückt)?
if (isset($_POST['eintragen'])) {
    // auswerten und Fehler(?) festellen
    
    // Auswertung: Name
    if (! empty($_POST['benutzer'])) {
        $name = trim($_POST['benutzer']);
    }
    
    if (! (isset($name) && $name != "")) {
        $error['name'] = "Name muss eingegeben werden!";
    }
    
    // Auswertung: Kommentar
    if (! empty($_POST['eintrag'])) {
        $eintrag = trim($_POST['eintrag']);
    }
    
    if (! (isset($name) && $eintrag != "")) {
        $error['eintrag'] = "Kommentar muss eingegeben werden!";
    }
    
    // Auswertung: Email
    // Funktion: http://php.net/manual/de/function.filter-var.php
    if (! empty($_POST['email'])) {
        $email = trim($_POST['email']);
    }
    
    if (! (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $error['email'] = "Bitte die Email-Adresse prüfen!";
    }
    
    // Auswertun: URL (eigene Homepage)
    $url = trim($_POST['url']);
    
    // Falls die URL nicht leer ist, muss sie in einem gültigen Format vorliegen
    // gültiges Format: <Protokoll>://<Adresse>
    if ($url != "" && ! filter_var($url, FILTER_VALIDATE_URL)) {
        $error['url'] = "Bitte die URL-Adresse prüfen!";
    }
    
    /*
     * Test der Funktion filter_var() var_dump(filter_var('h.kluschke@gmx.de',
     * FILTER_VALIDATE_EMAIL)); var_dump(filter_var('nonsens',
     * FILTER_VALIDATE_EMAIL));
     */
    
    // testen der Validierung
    if (isset($error)) {
        echo "<hr>";
        var_dump($error);
        echo "<hr>";
    }
    
    // Falls bis hier hin alles in Ordnung ist, dann können wir etwas in die DB
    // eintragen
    if (! isset($error)) {
        // Verbindung zum DB-Server herstellen
        $link = mysql_connect('localhost', 'benutzer', 'benutzer');
        
        if (! $link) {
            // wir lassen das Script sterben
            die("Keine Verbindung zum DB-Server möglich!");
        }
        
        // DB auswählen
        $db = mysql_select_db('db_gbook');
        
        if (! $link) {
            // wir lassen das Script sterben
            die("Kann die Db nicht verwenden!");
        }
        
        // DB-Abfrage formulieren und zum Server senden
        $abfrage = "
                INSERT INTO
                    eintraege
                (
                name,
                datum,
                eintrag,
                email,
                url,
                ip
                )
                VALUES
                (
                '" . $name . "',
                '" . $email . "',
                '".$url."',
                '".$_SERVER['REMOTE_ADDR']."'
                )
                ";
    }
}

// prüfen, ob wir das Formular anzeigen müssen
// 1. prüfe, ob der Eintrage-Button noch nicht gedrückt wurde
// ODER
// 2. ob Fehler bei der Eingabe bemerkt wurden
if (! isset($_POST['eintragen']) || isset($error)) {
    ;
    ?>

<form
	action="index.php?seite=3"
	method="post">

	<label for="benutzer">Name: <br> <input
		type="text"
		name="benutzer"
		id="benutzer"
		maxlength="80" />
	</label> <br> <br> <label for="eintrag">Kommentar: <br> <textarea
			name="eintrag"
			id="eintrag"
			rows="8"
			cols="30"></textarea>
	</label> <br> <br> <label for="email">Email <br> <input
		type="text"
		name="email"
		id="email"
		maxlength="120" />
	</label> <br> <br> <label for="url">Eigene Homepage: <br> <input
		type="text"
		name="url"
		id="url"
		maxlength="120" />
	</label> <br> <br> <input
		type="submit"
		name="eintragen"
		id="eintragen"
		value="eintragen" />
</form>

<?php
}
?>