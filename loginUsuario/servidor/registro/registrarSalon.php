<?php 
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $email = $datos['email'];
    $password = password_hash($datos['password'], PASSWORD_DEFAULT);
    $nombre = $datos['nombre'];
    $eslogan = $datos['eslogan'];
    $correo = $datos['correo'];
    $descripcion = $datos['descripcion'];
    $departamento = $datos['departamento'];
    $municipio = $datos['municipio'];
    $telefono = $datos['telefono'];
    $direccion = $datos['direccion'];
    $servicios = implode(",", $datos['servicios']);

    $claseDirectorio = __DIR__;

    $rutaImg = realpath(dirname(dirname(dirname($claseDirectorio)))) . '/img/';

    $rutaLogos = $rutaImg . 'logos/';
    $rutaImagenes = $rutaImg . 'imagenes/';

    $nombresLogos = array();
    $nombresImagenes = array();

    foreach ($datos['logo'] as $logoBase64) {
        $img = $logoBase64;
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = base64_decode($img);
        $nuevoNombreLogo = uniqid() . '.png';
        $rutaLogo = $rutaLogos . $nuevoNombreLogo;
        file_put_contents($rutaLogo, $img);
        $nombresLogos[] = $nuevoNombreLogo;
    }

    foreach ($datos['imagenes'] as $imagenBase64) {
        $img = $imagenBase64;
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = base64_decode($img);
        $nuevoNombreImagen = uniqid() . '.png';
        $rutaImagen = $rutaImagenes . $nuevoNombreImagen;
        file_put_contents($rutaImagen, $img);
        $nombresImagenes[] = $nuevoNombreImagen;
    }

    $logos = implode(",", $nombresLogos);
    $imagenes = implode(",", $nombresImagenes);


    $Auth = new Auth();

    if ($Auth->nuevoSalon($email, $password, $nombre, $eslogan, $correo, $descripcion, $departamento, $municipio, $telefono, $direccion, $logos, $imagenes, $servicios)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>