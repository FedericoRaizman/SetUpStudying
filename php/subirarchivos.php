<?php
include("../html/archivos.html");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;

   
    if (file_exists($targetFile)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFile)) {
            echo "El archivo " . basename($_FILES["archivo"]["name"]) . " Se subio correctamente ";
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>
