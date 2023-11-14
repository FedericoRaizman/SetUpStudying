<?php
header ('Content-Type: application/json');
$pdo=pdo=new PDO (:"mysql:dbname=sistema;host=127.0.0.1","root","");

$sentenciaSQL = $pdo->prepare("SELECT * FROM eventos");
$sentenciaSQL->execute();

$resultado= $sentenciaSQL->fetchALL(PDO: :FETCH_ASSOC)
'['.json_encode($resultado).']';

?>