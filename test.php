<?php session_start();
    include "loginUsuario//clases/Auth.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Auth = new Auth();

    $salones = $Auth->conseguirSalones();

    var_dump($salones);
?>