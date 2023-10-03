<?php
include ("conexion.php");

//echo  $usuario." ".$contrasenia;

$sql="INSERT INTO eventos (IDCalendario,IDUSUARIO,Fecha,Evento,Tema) VALUES ('".$_REQUEST['Evento']."','".$_REQUEST['Fecha']."','".$_REQUEST['Tema']."')";

//echo $sql;

$datos=$conexion->query($sql);

echo // mostrar el evento en el calendario;

$conexion->close();

?>