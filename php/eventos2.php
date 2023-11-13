<?php
session_start();
include("conexion.php");

$sql = "INSERT INTO eventos (IDUSUARIO,title,descripcion,inicio,final) VALUES (".$_SESSION['Usu'].",'".$_REQUEST["txtTitulo"]."','".$_REQUEST["Descripcion"]."','".$_REQUEST["horainicio"]."','".$_REQUEST["horafinal"]."')";
//echo $sql;
$datos = $conexion->query($sql);
echo "OK";

$conexion->close();
//var_dump($datos);

?>