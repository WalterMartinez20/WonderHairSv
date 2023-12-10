<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

function agregarAlCarrito($productID) {
    if (!in_array($productID, $_SESSION['carrito'])) {
        $_SESSION['carrito'][] = $productID;
    }
}

if (isset($_POST['product-id'])) {
    $productID = $_POST['product-id'];
    agregarAlCarrito($productID);
}

header('Location: ../../../detalle.php?id='.$_POST['product-id']);
?>