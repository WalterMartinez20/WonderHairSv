<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $servicio = $datos['servicio'];

    $Auth = new Auth();

    if ($Auth->nuevoServicio($_SESSION['id'], $servicio)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>