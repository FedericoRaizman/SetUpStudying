<?php
include ("conexion.php");

//echo  $usuario." ".$contrasenia;

$sql="INSERT INTO eventos (USUARIO,CONTRASENIA,NOMBRE,APELLIDO) VALUES ('".$_REQUEST['mail']."','".$_REQUEST['pass']."','".$_REQUEST['Nombre']."','".$_REQUEST['Apellido']."')";

//echo $sql;

$datos=$conexion->query($sql);

echo "Se ingreso correctamente";

$conexion->close();

?>