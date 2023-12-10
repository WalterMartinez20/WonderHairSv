<?php include("template\cabecera.php") ?>
<?php include("template\perfil.php") ?>


<div class="contactUs">
    <div class="box">
        <div class="contacto form">

            <form>
                <div class="formBox">

                    <div class="row100">
                        <span id="Publi">PUBLICACIONES</span>
                        <div id="div_file" method="post">
                            <a name="" class="btn btn-primary" role="button">Publicar</a>
                            <input type="file" id="btn_agregar1" name="file">
                        </div>
                        <div id="preview1" class="styleimage">
                        </div>
                    </div>

                    <div style="width: 100%; display: flex; flex-direction: column; gap: 10px;">
                        <?php
                        if (isset($_GET['id'])) {
                            $publicaciones = $salon['imagenes'];
                            if (strpos($publicaciones, ',') !== false) {
                                $imagenes = explode(',', $publicaciones);

                                foreach ($imagenes as $imagen) {
                                    echo  "<img src='img/imagenes/" . $imagen . "' style='width: 100%'> <br>";
                                }
                            } else {
                                echo "<img src='img/imagenes/" . $publicaciones . "' style='width: 100%'> <br>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <style>
            .card-header{
                margin-top: 5px;
            }
        </style>
        <div class="contacto info">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button style="font-size: 20px;" class="btn btn-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <em class="fa-regular fa-clock"></em> Horario de atencion
                                </button>
                                <ul style="" class="dropdown-menu dropdown-menu-dark">
                                    <div style="margin-left: 10px; margin-right: 20px;" class="god">
                                        <div class="card-header  text-white">
                                            Lunes    10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            Martes   10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            miercoles 10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            Jueves 10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            Viernes 10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            Sabado 10:00 AM - 6:00 PM
                                        </div>
                                        <div class="card-header  text-white">
                                            Domingo 10:00 AM - 6:00 PM
                                        </div>

                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h3>Desripcion</h3>
            <p>
                <?php if (isset($_GET['id'])) {
                    echo $salon['descripcion'];
                } ?>
            </p>
            <h3>Informacion de contacto</h3>
            <div class="infoBox">
                <div>
                    <span><em class="fa-solid fa-location-dot"></em></span>
                    <p> <?php if (isset($_GET['id'])) {
                            echo $departamentos[$salon['departamento']];
                        } ?> - <?php if (isset($_GET['id'])) {
                                                                                                                echo $municipios[$salon['departamento']][$salon['municipio']];
                                                                                                            } ?> </p>
                </div>
                <div>
                    <span>
                        <em class="fa-regular fa-envelope"></em>
                    </span>
                    <a href="#"><?php if (isset($_GET['id'])) {
                                    echo $salon['correo'];
                                } ?></a>

                </div>
                <div>
                    <span>
                        <em class="fa-brands fa-whatsapp"></em>
                    </span>
                    <a href="#"><?php if (isset($_GET['id'])) {
                                    echo $salon['telefono'];
                                } ?></a>
                </div>

            </div>
        </div>
        <div class="map">
            <?php
            if (isset($_GET['id'])) {
                echo $salon['direccion'];
            }
            ?>
        </div>

    </div>


</div>
<?php include("template\pie.php") ?>