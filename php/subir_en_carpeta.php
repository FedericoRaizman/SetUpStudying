<?php 
session_start();
include("conexion.php");

if (isset($_POST['archivo'])){
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
}else{

if (isset ($_FILES['file'])){
    $directorio = __DIR__ . DIRECTORY_SEPARATOR . "../uploads/".$_SESSION['Usu']."/".$_POST['folder_name'];
    # Lo imprimo solo para depurar
    echo $directorio;
    // if (!file_exists($directorio)) {
    // mkdir($directorio);
    // listadoDirectorio("../uploads/".$_SESSION['Usu']);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetDir = $directorio . "/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo $targetFile;
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        $uploadOk = 1;
    
       
        if (file_exists($targetFile)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }
    
        
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
        
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "<script>alert(El archivo " . basename($_FILES["file"]["name"]) . " Se subio correctamente);</script>";
            } else {
                echo "<script>alert(Lo siento, hubo un error al subir tu archivo);</script>";
            }
        }
    }
    
    echo $directorio;
    echo "<script>window.location = 'carpeta2.php?carpeta=".$_POST['folder_name']."'</script>";

}
}
?>