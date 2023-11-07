

<form action="carpeta.php" method="post">
    <input type="text" name="folder_name" placeholder="Nombre de la carpeta">
    <input type="submit" value="Crear carpeta">
</form>


<?php
session_start();
//include ("conexion.php");
$directorio = "../uploads/".$_SESSION['Usu'];
listadoDirectorio($directorio);

if (isset ($_SESSION['Usu'])){
    $directorio = __DIR__ . DIRECTORY_SEPARATOR . "../uploads/".$_SESSION['Usu'];
    # Lo imprimo solo para depurar
    //echo $directorio;
    if (!file_exists($directorio)) {
        mkdir($directorio);
    }
}


if (isset ($_POST['folder_name'])){
    $directorio = __DIR__ . DIRECTORY_SEPARATOR . "../uploads/".$_SESSION['Usu']."/".$_POST['folder_name'];
    # Lo imprimo solo para depurar
    //echo $directorio;
    if (!file_exists($directorio)) {
        mkdir($directorio);
        header("Location: carpeta.php");
        //listadoDirectorio("../uploads/".$_SESSION['Usu']);
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
            
            echo '<li class="open-dropdown"><a href="carpeta2.php?carpeta='.$elemento.'">+ '.$elemento.'</a></li>';
           //echo '<ul class="dropdown d-none">';
               // listadoDirectorio($directorio.'/'.$elemento);
            //echo '</ul>';
        }
    }
}
//listadoDirectorio('nombre_carpeta');



?>