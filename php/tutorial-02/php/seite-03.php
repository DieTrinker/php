<h1>Formular mit vielen Checkboxen und Multi-Select</h1>

<?php 

    // var_dump( $_POST );
    
    // weil die Pizzaextras jetzt in einem Array versammelt sind,
    // können die Extras durch eine Schleife ohne große Mühe verarbeitet werden
    foreach( $_POST["pizzaextras"] as $extra) {
        
        echo $extra . " <br />" . PHP_EOL;
    }

?>

<form action="index.php?seite=3" method="post">

    <fieldset>
        <legend>Pizza-Extras</legend>
        
        <!-- 
           * Alle Pizza-Optionen (die Checkboxen) haben den Namen pizzaextras[]
           * die eckigen Klammern im Namen deuten auf einen Feldindex hin
           * Hinweis: HTML ist das "egal", aber PHP bastelt uns daraus ein >>ARRAY<<
         -->
        <input type="checkbox" id="chkbox1" name="pizzaextras[]" value="extra Käse"/>
        <label for="chkbox1">Option 1: extra Käse</label>
        
        <br />
        <input type="checkbox" id="chkbox2" name="pizzaextras[]" value="extra Salami"/>
        <label for="chkbox2">Option 2: extra Salami</label>
        
        <br />
        <input type="checkbox" id="chkbox3" name="pizzaextras[]" value="extra Schinken"/>
        <label for="chkbox3">Option 3: extra Schinken</label>
        
        <br />
        <input type="checkbox" id="chkbox4" name="pizzaextras[]" value="extra Ananas"/>
        <label for="chkbox4">Option 4: extra Ananas</label>
        
        <br />
        <input type="checkbox" id="chkbox5" name="pizzaextras[]" value="extra Bacon"/>
        <label for="chkbox5">Option 5: extra Bacon</label>
        
        <br />
        <input type="checkbox" id="chkbox6" name="pizzaextras[]" value="extra Sixpack Bier - Becks"/>
        <label for="chkbox6">Option 6: extra Sixpack Bier - Becks</label>
    
        <br />
        <input type="checkbox" id="chkbox7" name="pizzaextras[]" value="extra Wein Montes Alpha - Jg. 2007"/>
        <label for="chkbox7">Option 7: extra Wein "Montes Alpha - Jg. 2007"</label>
        
    </fieldset>
    
    <input type="submit" name="bestellen" id="bestellen" value="Bestellung abschicken" />
    
</form>
