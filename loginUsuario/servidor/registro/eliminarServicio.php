<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $nombre = $datos['servicio'];

    $Auth = new Auth();

    if ($Auth->eliminarServicio($_SESSION['id'], $nombre)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>