<!-- Abgrenzen PHP vom Rest des Dokuments (HTML) und Kommentare in HTML-->

<?php
// Diese Abgrenzung ist XHTML- bzw. XML-konform

// Hier finden wir jetzt PHP
echo "Hallo Welt!";

?>

<p>
    Das ist ein HTML-Absatz.
</p>

<?php 

    echo "Hier ist weider PHP";
?>

<div>
    <p>und noch ein Absatz in einem DIV-Bereich</p>    
</div>


<table border="1">
    <tr>
        <td><?php echo "Huhu";?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo "Hallo";?></td>
        <td></td>
    </tr>
</table>

<?php
    /* Ich bin ein Bereichskommentar,
     * und darf über mehrere 
     * Zeilen notiert werden
     * 
     * Eclipse kennzeichnet die Zeilen eines Bereichskommentars
     * durch Sternchen
     * 
     */
    
    // bis zum Ende der Datei wird alles als PHP betrachtet...
    // und muss dann nicht mit geschlossen werden!
    
echo "Ich bin wirklich noch ein PHP-Bereich!";
    