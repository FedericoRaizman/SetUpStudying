<?php
include ("conexion.php");

//echo  $usuario." ".$contrasenia;

$sql="INSERT INTO usuarios (USUARIO,CONTRASENIA,NOMBRE,APELLIDO) VALUES ('".$_REQUEST['mail']."','".$_REQUEST['pass']."','".$_REQUEST['Nombre']."','".$_REQUEST['Apellido']."')";

//echo $sql;

$datos=$conexion->query($sql);

header("Location: ../html/pantallaprincipal.html");

$conexion->close();

?>