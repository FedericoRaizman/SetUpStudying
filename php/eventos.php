<?php

session_start();
include("conexion.php");


$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
switch($accion){

          case 'agregar' :
            $sentenciaSQL= $pdo->prepare("INSERT INTO 
            eventos(title,descripcion,color,textColor,inicio,final)
            VALUES(:title,:descripcion,:color,:textColor,:start,:end)");

            $respuesta=$sentenciaSQL->execute(array(
                "title" => $_POST['title'],
                "descripcion" => $_POST['descripcion'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "inicio" => $_POST['inicio'],
                "final" => $_POST['final']
            ));
            echo json_encode ($respuesta);
            break;
            case 'eliminar':
                echo "Instruccion eliminar";
                $respuesta=false;
                if(isset($_POST['Id'])){

                    $sentenciaSQL= $pdo-> prepare("DELETE FROM eventos WHERE ID=:ID");
                    $respuesta= $sentenciaSQL->execute(array("ID"=>$_POST['id']));

                }
                echo json_encode($respuesta);


                break;
            case 'modificar':

                echo "Instruccion modificar";
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