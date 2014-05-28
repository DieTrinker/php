<?php
	if ($_SESSION['angemeldet'] != true) {
		die("Sie müssen angemeldet sein, um diese Funktion nutzen zu können!");
	}

	include 'scripte/mysql.inc.php';
	
	if (isset($_POST['upload'])) {
		//var_dump($_FILES);
		if ($_FILES['userfile']['error'] == 0){
			
			//	Dateinamen übernehmen
			//	Hashwerte der Dateien
			$datei = sha1_file($_FILES['userfile']['tmp_name'])."_".$_FILES['userfile']['name'];
			
			//	Datensatz vorbereiten
			$bildID = sha1_file($_FILES['userfile']['tmp_name']);
			$accountID = $_SESSION['benutzer'];
			$dateiname = $datei;
			$pfad = "upload";
			$ip = $_SERVER['REMOTE_ADDR'];

			//	die Datei in das Verzeichnis "uploads" verschieben
			if(move_uploaded_file($_FILES['userfile']['tmp_name'], "upload/".$datei)){
				echo "Datei wurde hochgeladen!<br>";
				
				//	Eintrag in die Datenbank vornehmen
				include 'scripte/mysql.inc.php';
				
				$abfrage = "
						INSERT INTO
							bild
						VALUES
						(
							'".$bildID."',
							'".$accountID."',
							'".$dateiname."',
							'".$pfad."',
							now(),
							'".$ip."'
						)
						";
				echo $abfrage;
				mysql_query($abfrage);
			}else {
				echo "Datei konnte nicht hochgeladen werden!<br>";
			}
		}
	}
?>
<h1>Bild hochladen</h1>

<!-- Formular zum Hochladen von Dateien
		siehe docs/uploads.txt -->
<form action="" method="post" enctype="multipart/form-data">
	<label for="userfile">Bild auswählen:
		<input type="file" name="userfile" id="userfile" accept="image/*" />
	</label>
	<br>
	<br>
	<input type="submit" name="upload" id="upload" value="hochladen" />
</form>