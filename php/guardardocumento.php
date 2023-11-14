<?php
session_start();
include("conexion.php");

$nombredoc= basename($_FILES["file"]["name"]);
$directorio = "../uploads/".$_SESSION['Usu']."/".$_GET["carpeta"];

$sql="INSERT INTO documentos (ID,IDCARPETA,nombre) VALUES ('".$_REQUEST[$nombredoc]."','".$_REQUEST[$directorio]."')";
 echo $sql;
?>