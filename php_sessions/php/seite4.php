<?php

// wir bauen in diese Seite einen Wächter ein (guard)
if( $_SESSION['angemeldet'] != true )
die("Sie müssen angemeldet sein, um die Seite sehen zu können");
?>
<h1>Das ist der geheime Bereich</h1>

<p>Die NSA sind Verbrecher!</p>