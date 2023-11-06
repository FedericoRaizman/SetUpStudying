<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folder_name = $_POST['folder_name'];
    $user_folder_path = 'uploads/user_folders/' . $folder_name;
    
    if (!file_exists($user_folder_path)) {
        if (mkdir($user_folder_path, 0777, true)) {
            echo 'Carpeta creada exitosamente.';
        } else {
            echo 'Error al crear la carpeta.';
        }
    } else {
        echo 'La carpeta ya existe.';
    }
}
?>