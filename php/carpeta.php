<?php
$carpeta = 'carpeta';

if (!file_exists($carpeta)) {
    if (mkdir($carpeta, 0777)) { 
        echo "La carpeta $carpeta se ha creado correctamente.";
    } else {
        echo "Hubo un problema al crear la carpeta $carpeta.";
    }
} else {
    echo "La carpeta $carpeta ya existe.";
}
?>