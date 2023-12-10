<?php include("../template/cabecera.php"); ?>
<?php

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

echo $txtID . "<br/>";
echo $txtNombre . "<br/>";
echo $txtImagen . "<br/>";
echo $accion . "<br/>";

switch ($accion) {

    case "Agregar":
        echo "Presionando el boton agregar";
        break;
    case "Modificar":
        echo "Presionando el boton modificar";
        break;
    case "Cancelar":
        echo "Presionando el boton cancelar";
        break;
}
?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de los salones
        </div>

        <div class="card-body">
            <form method?="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del salon">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen:</label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen del salon">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="button" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <br>
                    <button type="button" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <br>
                    <button type="button" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>

    </div>


</div>
<div class="col-md-7">

    <table aria-label="" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <td scope="col">Acciones</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Salon la belleza</td>
                <td>Imagen.png</td>
                <td>Seleccionar - Borrar</td>
            </tr>

        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>