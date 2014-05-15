<html>
    <head>
        <title>Formulardaten verarbeiten</title>
        
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        
    </head>
    
    <body>
    
        <!-- Template für das Tutorialprojekt -->
    
        <div id="header">
        
        </div>
    
        <div id="menue">
        
            <ul>
                <li> <a href="index.php?seite=1">Home</a> </li>
                <li> <a href="index.php?seite=2">Formular</a> </li>
                <li> <a href="index.php?seite=3">das andere Formular</a> </li>
            </ul>
            
        </div>
    
        
        <div id="main">
     
            <?php 
            
                if( isset($_GET["seite"]))
                    $seite = $_GET["seite"];
                
                switch( $seite ) {
                    
                    // das ist die Startseite
                    default:
                    case "1":
                        include 'php/seite-01.php';
                        break;

                    // das wäre das Formular
                    case "2":
                        include 'php/seite-02.php';
                        break;
                    
                    // das wäre auch ein Formular
                    case "3":
                        include 'php/seite-03.php';
                        break;
                }                        
                
            ?>
        
        </div>
        
    
    
    </body>
</html>
