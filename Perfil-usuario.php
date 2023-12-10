<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/perfiluser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="perfil-usuario">
        <div class="contenedor-perfil">
            <div class="portada-perfil" style="background-image: url('https://img2.hulu.com/user/v3/artwork/1a195a35-e19c-4e36-b609-3b1c451f6ce4?base_image_bucket_name=image_manager&base_image=3efaaad8-bb15-4970-a57b-3ec97e1344d5&region=US&format=jpeg&size=952x536');">

                <div class="avatar-perfil">
                    <img alt="avatar" src="images/PCXP-50834.jpg">

                </div>
                <div class="datos-perfil">
                    <h4 class="titulo-usuario">Nombre de usuario</h4>
                    <p class="bio-usuario">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                    <ul class="lista-perfil">
                        <em class="fa fa-star"></em>
                        <em class="fa fa-star"></em>
                        <em class="fa fa-star"></em>
                        <em class="fa fa-star"></em>
                        <em class="fa fa-star"></em>
                    </ul>
                </div>
                <div class="opcciones-perfil1">
                    <button type="">Mensaje <em class="fa-regular fa-paper-plane"></em></button>
                    <button type="">Guardar <em class="fa-regular fa-bookmark"></em></button>
                </div>
            </div>
            <div class="menu-perfil">
                <ul>
                    <li><a href="#" title=""> Servicios</a></li>
                    <li><a href="#" title=""> Productos</a></li>
                    <li><a href="#" title=""> Cursos</a></li>

                </ul>
            </div>
        </div>
        </div>
    </section>
    <div class="contactUs">
        <div class="box">
            <div class="contacto form">

                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">

                                <select name="Horario" id="horario">

                                    <option value="">Horarios de atencion</option>
                                    <option value="ahuachapan">Sabado ----------- 8:00 a 12:00</option>
                                    <option value="cabana">Domingo --------- cerrado </option>
                                    <option value="chalatenango">Lunes ------------- 8:00 a 3:00</option>
                                    <option value="cuscatlan">Martes ------------ 8:00 a 3:00</option>
                                    <option value="lalibertad">Miercoles--------- 8:00 a 3:00</option>
                                    <option value="lalibertad">Jueves ----------- 8:00 a 3:00</option>
                                    <option value="lalibertad">Viernes ---------- 8:00 a 3:00</option>

                                </select>
                            </div>

                        </div>
                        <div class="row50">
                            <div class="inputBox">

                                <select name="Horario" id="horario">
                                    <option value="">Servicios que ofrece</option>
                                    <option value="ahuachapan">Cuidado de uñas</option>
                                    <option value="cabana">Cuidado de piel</option>
                                    <option value="chalatenango">Depilación</option>
                                    <option value="cuscatlan">Maquillaje</option>

                                </select>
                            </div>

                        </div>

                        <div class="row100">
                            <span id="Publi">PUBLICACIONES</span>

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
            <div class="contacto info">
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
</body>

</html>