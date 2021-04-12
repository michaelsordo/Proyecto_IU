<?php

header('Content-Type: application/json');

$conexion = new PDO ("mysql:dbname=ET1; host=127.0.0.1","pma","iu");


$respuesta =$conexion->prepare("SELECT RECURSO.NOMBRE_RECURSO as title, HORARIO.ID_RECURSO as id, CONCAT(HORARIO.FECHA_HORARIO, ' ', HORARIO.HORA_INICIO_HORARIO) as start, CONCAT(HORARIO.FECHA_HORARIO, ' ', HORARIO.HORA_FIN_HORARIO) as end
FROM RECURSO,HORARIO
WHERE RECURSO.ID_RECURSO=HORARIO.ID_RECURSO AND HORARIO.ES_RECHAZADA='NO';");

$respuesta->execute();

$resultado= $respuesta->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);


   