<?php
include ("conexion.php");

$usuario=$_POST['username'];
$contrasenia=$_POST['password'];

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
    header("Location: ../html/pantallaprincipal.html");

}else{
    //echo "No existe usuario";
    header("Location: ../html/iniciarsesion.html");
}

$conexion->close();

?>