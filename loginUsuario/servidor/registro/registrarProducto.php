<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $nombre = $datos['nombre'];
    $descripcion = $datos['descripcion'];
    $precio = $datos['precio'];
    $proveedor = $datos['proveedor'];
    $categoria1 = $datos['categoria1'];
    $categoria2 = $datos['categoria2'];
    $existencias = $datos['existencias'];
    $fecha = $datos['fecha'];

    $claseDirectorio = __DIR__;

    $rutaImg = realpath(dirname(dirname(dirname($claseDirectorio)))) . '/img/productos/';

    $img = $datos['imagen'];
    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = base64_decode($img);
    $nombreImagen = uniqid() . '.png';
    $ruta = $rutaImg . $nombreImagen;

    echo $ruta;
    
    file_put_contents($ruta, $img);

    $Auth = new Auth();

    if ($Auth->nuevoProducto($_SESSION['id'], $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $fecha, $precio, $nombreImagen)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>