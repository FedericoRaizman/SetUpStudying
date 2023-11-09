<?php
session_start();
include ("conexion.php");

//echo  $usuario." ".$contrasenia;

$sql="INSERT INTO eventos (IDEVENTO,IDUSUARIO,title,descripcion,start,end)< VALUES (".$_SESSION['Usu'].",'".$_REQUEST['FechaEvento']."','".$_REQUEST['NombreEvento']."','".$_REQUEST['Tema']."')";

//echo $sql;

$datos=$conexion->query($sql);

echo "";// mostrar el evento en el calendario;

$conexion->close();

?>