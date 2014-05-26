<?php

	$lebenszeit = 120;
	session_set_cookie_params($lebenszeit);
	session_start();
	setcookie(session_name(), session_id(), time() + $lebenszeit);
	
	echo "alles gut - index.php<br>";
	
	echo "eigentlich abgemeldet: ? ==> ".$_SESSION['angemeldet']."<br>";
?>
<html>
<head>
<title>Gästebuch</title>
<link rel="stylesheet" href="css/main.css" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<body>

<div id="header">

</div>


<div id="nav">
<ul>
<?php
	if ($_SESSION['angemeldet'] == false){
?>
<li> <a href="index.php?seite=1">Home</a> </li>
<li> <a href="index.php?seite=2">Gästebuch</a> </li>
<li> <a href="index.php?seite=4">Zäsur</a> </li>
<?php
}
		if ($_SESSION['angemeldet'] == true){
echo "immer noch angemeldet<br>";
?>
<li> <a href="index.php?seite=1">Home</a> </li>
<li> <a href="index.php?seite=2">Gästebuch</a> </li>
<li> <a href="index.php?seite=4">Zäsur</a> </li>
<li> <a href="php/_logout.php">Abmelden Zäsur</a> </li>
<?php } ?>
</ul>
</div>


<div id="main">

<?php

$seite = "";
if( isset( $_GET['seite'] ) )
$seite = $_GET['seite'];

switch( $seite ) {

default:
case '1':	// Startseite/Home
include 'php/seite1.php';
break;

case '2':	// Gästebuch anzeigen
include 'php/seite2.php';
break;

case '3':	// Formular für das Gästebuch
include 'php/seite3.php';
break;

case '4':	// Formular für die Zensur
include 'php/seite4.php';
break;
}

?>
</div>
</body>
</html>