<html>
	<head>
		<title>PHP Uploads verarbeiten</title>
		<link rel="stylesheet" href="css(main.css" type="txt/css" />
	</head>
	<body>
		<div id="header"></div>
		<div id="navigation">
			<ul id="horizmenue">
				<li><a href="index.php?seite=1">Home</a></li>
				<li><a href="index.php?seite=2">Galerie</a></li>
			</ul>
		</div>
		
		<div id="main">
			<?php
			$seite = "";
            if ( isset( $_GET [ 'seite' ] ) ) {
                $seite = $_GET [ 'seite' ];
            }

            switch ( $seite )
                {
                    default:
                    case '1':
                        include 'scripte/seite1.php';
                        break;
                    case '2':
                        include 'scripte/seite2.php';
                        break;
                    case '3':
                        include 'scripte/seite3.php';
                        break;
                }
			?>
		</div>
	</body>
</html>