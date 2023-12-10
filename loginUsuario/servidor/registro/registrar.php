<?php 
    include "../../clases/Auth.php";

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $Auth = new Auth();

    if ($Auth->registrar($email, $password)) {
        header("location:../../indexUsuario.php");
    } else {
        echo "No se pudo registrar";
    }

?>