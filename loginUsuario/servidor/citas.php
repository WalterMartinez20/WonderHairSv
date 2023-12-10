<?php session_start();
    include "../clases/Auth.php";

    $Auth = new Auth();

    $info = $Auth->conseguirCitas($_GET['id']);

    if ($info) {
        $response = array("success" => true, "info" => $info);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>