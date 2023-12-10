<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $id = $datos['id'];

    $Auth = new Auth();

    if ($Auth->retomarCita($id)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>