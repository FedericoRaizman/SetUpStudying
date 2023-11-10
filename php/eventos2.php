<?php
include("conexion.php");

$sql = "INSERT INTO eventos (IDUSUARIO,title,descripcion,end) VALUES (".$_SESSION['IDUSUARIO'].",'".$_REQUEST["txtTitulo"]."','".$_REQUEST["txtHora"]."','".$_REQUEST["txtDescripcion"]."')";
$datos = $conexion->query($sql);

var_dump($datos);

?>