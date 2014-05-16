<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta
	http-equiv="Content-Type"
	content="text/html; charset=UTF-8">
<title>Tutorial - Gästebuch</title>
<link
	rel="stylesheet"
	href="css/main.css"
	type="txt/css" />
</head>
<body>
	<!-- ***************    Haeder  *************** -->
	<div id="header">
		<h1>Header</h1>

	</div>

	<!-- ***************    Navigation  *************** -->
	<div id="menue">
		<h1>Navigation</h1>
		<ul>
			<li><a href="index.php?seite=1">Home</a></li>
			<li><a href="index.php?seite=2">Gästebuch</a></li>
		</ul>
	</div>

	<!-- ***************    Main  *************** -->
	<div id="main">
        <?php
        $seite = "";
        if (isset($_GET['seite'])) {
            $seite = $_GET['seite'];
        }
        
        switch ($seite) {
            
            default:
            case '1':
                include 'php/seite1.php';
                break;
            case '2':
                include 'php/seite2.php';
                break;
            case '3':
                include 'php/seite3.php';
                break;
        }
        
        ?>
    </div>
</body>
</html>