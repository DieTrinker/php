<h1>Viel Spaß mit dem Formular</h1>

<?php 
    // hier will ich die Formulardaten verarbeiten

    // Die Formulardaten werden je nach verwendeter Methode in dem 
    // superglobalen Array $_GET oder $_POST bereitgestellt
    
    // hier möchte ich eigentlich entscheiden, ob ich Formulardaten
    // auswerten muss oder nicht
    
    // wenn in dem Array $_POST der assoziative Index "abschicken" existiert
    // dann wurde das Formular abgeschickt und wir müssen auswerten
    if( isset($_POST["abschicken"] ) ) {
        
        // wir werten die Anrede aus
        // s.a. http://de2.php.net/manual/de/function.ucfirst.php
        $anrede = ucfirst( $_POST["anrede"] );
        
        // wir werten den Vornamen aus
        if( !empty($_POST["vorname"] ) ) {
            
            // http://de2.php.net/manual/de/function.trim.php
            $vorname = trim( $_POST["vorname"] ); 
        }
        else {
        
            // wir merken uns, dass die Eingabe des Vornamens fehlt
            $error["vorname"] = "Eingabe fehlt!";
        }
        
        // wir werten den Nachnamen aus
        if( !empty( $_POST["nachname"] ) ) {
            
            $nachname = trim( $_POST["nachname"] );
        }
        else {
        
            // Wir merken uns, dass die Eingabe des Nachnamens fehlt
            $error["nachname"] = "Eingabe fehlt!";
        }
        
        // wir werten das Bundesland aus
        $bundesland = $_POST["bundesland"];
        
        // wir merken uns, dass die Eingabe des Bundeslands fehlt
        if ( $bundesland == 0)
             $error["bundesland"] = "Eingabe fehlt!";
        
        // wir werten die Checkbox AGB aus
        if ( isset( $_POST["agb"] ) ) {
             
            $agb = "checked";
        } 
        else {
            
            $error["agb"] = "Eingabe fehlt!";
        }
        
        // wir werten die Checkbox Newsletter aus (otional)
        if ( isset( $_POST["newsletter"] ) ) {
            
             $newsletter = "checked";
        }
        
        // wir werten die Textarea aus
        if( !empty( $_POST["kommentar"] ) ) {
            
            $kommentar = trim( $_POST["kommentar"] );
        }
        
        // Falls Fehler bemerkt worden sind: kurzer Hinweis dazu über dem Formular
        
        if( isset($error) ) {
            echo "<p class=\"error-highlight\">Ihre Formulareingaben sind fehlerhaft! Bitte prüfen Sie die Eingaben! </p>";
        }
        // gib die erfolgreich eingegebenen Daten aus
        else {
            
            echo "<p>Sie haben eingegeben: </p>";
            
            echo "<p>Anrede: " . $anrede . "</p>";
            
            echo "<p>Vorname: " . $vorname . "</p>";
            echo "<p>Nachname: " . $nachname . "</p>";
            
            echo "<p>Bundesland: " . $bundesland . "</p>";
            
            echo "<p>AGB: " . $agb . "</p>";
            echo "<p>Newsletter: " . $newsletter . "</p>";
            
            echo "<p>Kommentar: " . $kommentar . "</p>";
        }
    }
    
?>

<?php 
    // ich darf das Formular anzeigen, wenn es erforderlich ist
    // Beginn if-Blocks Formular: anzeigen ja/nein!!!
    if ( !isset($_POST["abschicken"] ) || isset($error) ) 
    {
?>

<!-- es soll ein kleines Registrierungsformular entwickelt werden -->
<!-- http://www.einfach-fuer-alle.de/artikel/barrierefreie-formulare/html-css/ -->

<form action="index.php?seite=2" method="post" >
    
    <!-- Eingabeelemente werden mittels <label> beschriftet -->
    
    <!-- <label> hier als explizites Label -->
    <input  type="radio" 
            name="anrede" 
            id="frau" 
            value="frau" 
            <?php 
                if( !isset($anrede) || (isset($anrede) && $anrede == "Frau" ) )
                    echo "checked =\"checked\"";
            ?>
    />
    
    <label for="frau">Frau</label>
    
    <!-- <label> hier als implizites Label -->
    <label>
        <input  type="radio" 
                name="anrede" 
                id="herr" 
                value="herr" 
            <?php 
            if ( isset($anrede) && $anrede == "Herr" )
                 echo "checked=\"checked\"";
            ?>
        /> Herr
           
    </label>
    
    <!-- Fehlerhinweise anzeigen, falls notwendig -->
    <br />
    <br />
    <label for="vorname">Vorname:</label>
    <br />
    <input  type="text" 
            name="vorname" 
            id="vorname" 
            size="30"
            value="<?php 
                if( isset($vorname) )
                    echo $vorname;
            ?>" 
    />
    <?php 
        if( isset( $error["vorname"] ) ) {

            echo "<p class=\"error\">" . $error["vorname"] . "</p>";
        }
    ?>
    
    <!-- Fehlerhinweise anzeigen, falls notwendig -->
    <br />
    <br />
    <label for="nachname">Nachname:</label>
    <br />
    <input  type="text" 
            name="nachname" 
            id="nachname" 
            size="30" 
            value="<?php 
                if( isset($nachname) )
                    echo $nachname;
            ?>"
    />
    <?php 
        if( isset( $error["nachname"] ) ) {

            echo "<p class=\"error\">" . $error["nachname"] . "</p>";
        }
    ?>
        
    <!-- Fehlerhinweise anzeigen, falls notwendig -->
    <br />
    <br />
    <label for="bundesland">Bundesland:</label>
    <br />
    <select name="bundesland" id="bundesland">
        <option value="0">---Bitte auswählen---</option>
        <option value="1" <?php if( isset($bundesland) && $bundesland == 1) echo "selected=\"selected\""?>>Baden-Würtenberg</option>
        
        <option value="2" <?php if( isset($bundesland) && $bundesland == 2) echo "selected=\"selected\""?>>Bayern</option>
        <option value="3" <?php if( isset($bundesland) && $bundesland == 3) echo "selected=\"selected\""?>>Berlin</option>
        <option value="4" <?php if( isset($bundesland) && $bundesland == 4) echo "selected=\"selected\""?>>Brandenburg</option>
        <option value="5" <?php if( isset($bundesland) && $bundesland == 5) echo "selected=\"selected\""?>>Bremen</option>
        <option value="6" <?php if( isset($bundesland) && $bundesland == 6) echo "selected=\"selected\""?>>Hamburg</option>
        <option value="7" <?php if( isset($bundesland) && $bundesland == 7) echo "selected=\"selected\""?>>Hessen</option>
        <option value="8" <?php if( isset($bundesland) && $bundesland == 8) echo "selected=\"selected\""?>>Mecklenburg-Vorpommern</option>
        <option value="9" <?php if( isset($bundesland) && $bundesland == 9) echo "selected=\"selected\""?>>Niedersachsen</option>
        <option value="10" <?php if( isset($bundesland) && $bundesland == 10) echo "selected=\"selected\""?>>Nordrhein-Westfalen</option>
        <option value="11" <?php if( isset($bundesland) && $bundesland == 11) echo "selected=\"selected\""?>>Rheinland-Pfalz</option>
        <option value="12" <?php if( isset($bundesland) && $bundesland == 12) echo "selected=\"selected\""?>>Saarland</option>
        <option value="13" <?php if( isset($bundesland) && $bundesland == 13) echo "selected=\"selected\""?>>Sachsen</option>
        <option value="14" <?php if( isset($bundesland) && $bundesland == 14) echo "selected=\"selected\""?>>Sachsen-Anhalt</option>
        <option value="15" <?php if( isset($bundesland) && $bundesland == 15) echo "selected=\"selected\""?>>Schleswig-Holzstein</option>
        <option value="16" <?php if( isset($bundesland) && $bundesland == 16) echo "selected=\"selected\""?>>Thüringen</option>
    </select>
    <?php 
        if( isset( $error["bundesland"] ) ) {

            echo "<p class=\"error\">" . $error["bundesland"] . "</p>";
        }
    ?>
    
    <!-- Fehlerhinweis anzeigen, falls notwendig -->    
    <br />
    <br />
    <label>
        <input  type="checkbox" 
                name="agb" 
                id="agb" 
                value="agb" 
                <?php 
                    if( isset($agb) && $agb=="checked" )
                        echo "checked=\"checked\"";
                ?>
        /> AGB gelesen und akzeptiert
    </label>
    <?php 
        if( isset( $error["agb"] ) ) {
    
            echo "<p class=\"error\">" . $error["agb"] . "</p>";
        }
    ?>

    
    <br />
    <br />
    <label>
        <input  type="checkbox" 
                name="newsletter" 
                id="newsletter" 
                value="newsletter" 
                <?php 
                    if( isset($newsletter) && $newsletter=="checked" )
                        echo "checked=\"checked\"";
                ?>
        /> Newsletter bestellen
    </label>
    
    <br />
    <br />
    <label for="kommentar">Anmerkungen:</label>
    <br />
    <textarea name="kommentar" cols="40" rows="5"><?php 
        
        if( isset($kommentar) )
            echo $kommentar;
        
    ?></textarea>
    
    
    <br />
    <br />    
    <input type="submit" name="abschicken" id="abschicken" value="senden" />
</form>
<?php 
    }    // Ende des if-Blocks: Formular anzeigen ja/nein!!!
?>
