<?php
	if (isset($_POST['upload'])) {
		//var_dump($_FILES);
		if ($_FILES['userfile']['error'] == 0){
			
			//	Dateinamen übernehmen (Umbenennung: TODO)
			$datei = $_FILES['userfile']['name'];
			
			//	Hashwerte der Dateien
			$datei = sha1_file($_FILES['userfile']['tmp_name'])."_".$_FILES['userfile']['name'];
			
			//	die Datei in das Verzeichnis "uploads" verschieben
			if(move_uploaded_file($_FILES['userfile']['tmp_name'], "upload/".$datei)){
				echo "Datei wurde hochgeladen!<br>";
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