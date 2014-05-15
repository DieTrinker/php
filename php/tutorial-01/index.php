<html>
    <head>
        <title>Template-Technik</title>
        <!-- CSS für das Projekt -->
        <link rel="stylesheet" href="css/main.css" type="text/css" />
    </head>
    
    <body>
    
        <div id="header">
            Hier ist Platz für aufdringliche Bannerwerbung
        </div>
        
        <div id="menue">
            <div id="navcontainer">
                <ul>
                    <li><a href="index.php?seite=1">Menu 1</a></li>
                    <li><a href="index.php?seite=2">Menu 2</a></li>
                    <li><a href="index.php?seite=3">Menu 3</a></li>
                    <li><a href="index.php?seite=4">Menu 4</a></li>
                </ul>
            </div>
        </div>
    
        <div id="content">
            <!--  hier werden dynamisch Inhalt eingebunden -->
            <?php 
                // kommt noch
                
                // prüft, ob $_GET['seite'] existiert
                if( isset( $_GET['seite']))
                    // ... und verwendet diesen Wert dann für die Auswahl
                    $auswahl = $_GET['seite'];
                else 
                    // ansonsten wird die Auswahl auf die leere Zeichenkette festgelegt
                    $auswahl = ' ';
                
                switch( $auswahl )
                {
                    default:
                    case '1':
                        include 'php/seite-01.php';
                        break;

                    case '2':
                        include 'php/seite-02.php';
                        break;

                    case '3':
                        include 'php/seite-03.php';
                        break;
                    
                    case '4':
                        include 'php/seite-04.php';
                        break;
                }
            ?>
        </div>
    
    </body>
</html>
