<?php 
    include "../../clases/Auth.php";

    $nombre = $_POST['nombre'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $correo = $_POST['email'];
    $telefono = $_POST['telefono'];

    $claseDirectorio = __DIR__;

    $rutaImg = realpath(dirname(dirname(dirname($claseDirectorio)))) . '/img/';

    $rutaImagenes = $rutaImg . 'logos/';


    $base64_image = $_POST['logo'];
    $img = str_replace('data:image/jpeg;base64,', '', $base64_image);
    $img = base64_decode($img);
    $nuevoNombreImagen = uniqid() . '.png';
    $rutaImagen = $rutaImagenes . $nuevoNombreImagen;
    file_put_contents($rutaImagen, $img);


    $Auth = new Auth();

    if ($Auth->registrar($nombre, $correo, $telefono, $password, $nuevoNombreImagen)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>