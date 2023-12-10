<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $salonID = $datos['id'];
    $servicio = $datos['servicio'];
    $nombre = $datos['txtnombre'];
    $telefono = $datos['txtelefono'];
    $correo = $datos['txtcorreo'];
    $fecha = $datos['txtfecha'];
    $hora = $datos['txthora'];
    $mensaje = $datos['txtmensaje'];
    $timestamp = $datos['timestamp'];

    $Auth = new Auth();

    $response = $Auth->nuevaCita($salonID, $servicio, $nombre, $telefono, $correo, $fecha, $hora, $mensaje, $timestamp);

    if ($response === "success") {
        echo json_encode(array("status" => "success", "datos" => $datos));
    } elseif ($response === "exist_timestamp") {
        echo json_encode(array("status" => "exist_timestamp"));
    } elseif ($response === "exist_date_time") {
        echo json_encode(array("status" => "exist_date_time"));
    } else {
        echo json_encode(array("status" => "fail"));
    }
?>