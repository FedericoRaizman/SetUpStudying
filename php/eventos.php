<?php

session_start();
include("conexion.php");


$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
switch($accion){

          case 'agregar' :

            break;
            case 'eliminar':

                break;
            case 'modificar':

                break;
        default:

        $sql = "SELECT * FROM eventos WHERE IDUSUARIO=".$_SESSION['Usu']."";
        //echo $sql;
        $datos = $conexion->query($sql);
        
        if($datos->num_rows>0){
            while($row[]=$datos->fetch_assoc()){
            }
        }
        
        echo json_encode($row);
        $conexion->close();

        break;

}




?>