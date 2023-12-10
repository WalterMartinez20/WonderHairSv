<?php 
    session_start();
    include "../../clases/Auth.php";

    $jsonData = file_get_contents("php://input");

    $datos = json_decode($jsonData, true);

    $id = $datos['id'];
    $nombre = $datos['nombre'];
    $descripcion = $datos['descripcion'];
    $proveedor = $datos['proveedor'];
    $categoria1 = $datos['categoria1'];
    $categoria2 = $datos['categoria2'];
    $existencias = $datos['existencias'];
    $precio = $datos['precio'];

    if ($datos['imagen'] !== null) {
        $claseDirectorio = __DIR__;

        $rutaImg = realpath(dirname(dirname(dirname($claseDirectorio)))) . '/img/productos/';

        $img = $datos['imagen'];
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = base64_decode($img);
        $nombreImagen = uniqid() . '.png';
        $ruta = $rutaImg . $nombreImagen;
        file_put_contents($ruta, $img);
    } else {
        $nombreImagen = $datos['imagenActual'];
    }

    $Auth = new Auth();

    if ($Auth->actualizarProducto($id, $nombre, $descripcion, $proveedor, $categoria1, $categoria2, $existencias, $precio, $nombreImagen)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
?>