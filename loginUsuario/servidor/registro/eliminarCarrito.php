<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

function eliminarDelCarrito($productID) {
    if (($key = array_search($productID, $_SESSION['carrito'])) !== false) {
        unset($_SESSION['carrito'][$key]);
    }
}

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    eliminarDelCarrito($productID);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>