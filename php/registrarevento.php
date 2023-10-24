<?php
session_start();
include ("conexion.php");

//echo  $usuario." ".$contrasenia;

$sql="INSERT INTO calendario (IDUSUARIO,Fecha,Evento,Tema) VALUES (".$_SESSION['Usu'].",'".$_REQUEST['FechaEvento']."','".$_REQUEST['NombreEvento']."','".$_REQUEST['Tema']."')";

//echo $sql;

$datos=$conexion->query($sql);

echo "";// mostrar el evento en el calendario;

$conexion->close();

?>