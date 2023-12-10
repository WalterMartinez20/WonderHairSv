<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];
    
    $targetDir = '../files/';
    $originalFileName = basename($uploadedFile['name']);
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '_' . $originalFileName;
    $targetPath = $targetDir . $newFileName;

    if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
        $response = array(
            'file' => $newFileName,
            'name' => $originalFileName,
            'extension' => $extension
        );
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'Error al guardar el archivo.'));
    }
} else {
    echo json_encode(array('error' => 'No se ha proporcionado un archivo.'));
}
?>

