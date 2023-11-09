<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=sus;host= 127.0.0.1,"root", "rootroot")

$setenciaSQL= $pdo->prepare("SELECT * FROM eventos"); 
$setenciaSQL ->execute();

$resultado=$setenciaSQL-> fetchALL(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>
