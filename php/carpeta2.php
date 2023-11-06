

<form action="carpeta2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="text" name="folder_name"  value="<?php echo $_GET["carpeta"]; ?>" hidden>
    <input type="submit" value="Subir archivo">
</form>


<?php
session_start();
//include ("conexion.php");
$directorio = "../uploads/".$_SESSION['Usu']."/".$_GET["carpeta"];

listadoDirectorio($directorio);

var_dump($_FILES);

if (isset ($_FILES['file'])){
    $directorio = __DIR__ . DIRECTORY_SEPARATOR . "../uploads/".$_SESSION['Usu']."/".$_POST['folder_name'];
    # Lo imprimo solo para depurar
    //echo $directorio;
    if (!file_exists($directorio)) {
        // mkdir($directorio);
        // listadoDirectorio("../uploads/".$_SESSION['Usu']);
        // Guardar el archivo
        echo $directorio;
    }

}


function listadoDirectorio($directorio){
    $listado = scandir($directorio);	    
    unset($listado[array_search('.', $listado, true)]);    
    unset($listado[array_search('..', $listado, true)]);
    if (count($listado) < 1) {
        return;
    }
    foreach($listado as $elemento){
        if(!is_dir($directorio.'/'.$elemento)) {
            echo "<li>- <a href='$directorio/$elemento'>$elemento</a></li>";
        }
        if(is_dir($directorio.'/'.$elemento)) {
            echo '<li class="open-dropdown">+ '.$elemento.'</li>';
            echo '<ul class="dropdown d-none">';
                listadoDirectorio($directorio.'/'.$elemento);
            echo '</ul>';
        }
    }
}
//listadoDirectorio('nombre_carpeta');



?>