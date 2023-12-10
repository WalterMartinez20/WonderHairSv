<?php session_start();
    include "../../clases/Auth.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if ($Auth->logear($email, $password)) {
        // $info = $Auth->loginInfo($email, $password);
        $response = array("success" => true);
        // header("location:../../../");
    } else {
        $response = array("success" => false);
    }
    // if ($Auth->logear($email, $password)) {
    //     header("location:../../inicio.php");
    // } else {
    //     echo "No se pudo logear";
    // }

    echo json_encode($response);
?>