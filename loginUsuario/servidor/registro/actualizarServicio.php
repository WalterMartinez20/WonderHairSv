<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $salon = $datos['id'];
    $servicio = $datos['servicio'];
    $anterior = $datos['anterior'];
    
    $Auth = new Auth();

    if ($Auth->actualizarServicio($salon, $servicio, $anterior)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>