<?php
include("conexion.php");

$sql = "INSERT INTO eventos (IDUSUARIO,title,descripcion,start,end) VALUES (".$_SESSION['id_usuario'].",'".$_REQUEST["titulo"]."','start','end','descripcion')
$datos = $conexion->query($sql);

var_dump($datos);

?>
