<?php
include ("conexion.php");

$usuario=$_POST['mail'];
$contrasenia=$_POST['pass'];

//echo  $usuario." ".$contrasenia;

$sql="SELECT IDUSUARIO,NOMBRE,APELLIDO FROM USUARIOS WHERE USUARIO='".$usuario."' and CONTRASENIA='".$contrasenia."'";

//echo $sql;

$datos=$conexion->query($sql);

if($datos->num_rows>0){
    $datousuario=$datos->fetch_assoc();
    //echo "Bienvenido ".$datousuario['NOMBRE']." ".$datousuario['APELLIDO'];´
    session_start();
    $_SESSION['Nombre']=$datousuario['NOMBRE']." ".$datousuario['APELLIDO'];
    $_SESSION['Usu']=$datousuario['IDUSUARIO'];
    header("Location: ../php/pantallaprincipal.php");

}else{
    //echo "No existe usuario";
    header("Location: ../html/iniciodesesion.html");
}

$conexion->close();

?>