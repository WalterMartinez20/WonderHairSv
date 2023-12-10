<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="contenedor">
        <div style=" margin: 0; padding: 0; position: absolute; transform: translate(-20%, 60%);">
            <a href="./loginUsuario/doblelogin.php" style="text-decoration: none;
            padding: 10px; color: black; background-color: #CACCD9; border-radius: 10px;"><em class="fa-solid fa-arrow-left"></em></a>
        </div>
        <header>Local Wonder SV</header>
        <div class="progress-bar">
            <div class="paso">
                <div class="num">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="paso">
                <div class="num">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="paso">
                <div class="num">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="paso">
                <div class="num">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="paso">
                <div class="num">
                    <span>5</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>

        </div>
        <div class="form-princ">
            <form action="#" id="nuevoSalon">
                <!--Pagina 1-->
                <div class="pagina movPag">

                    <div class="titulo">Registrate</div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="correo1-error"></strong>
                        <input type="email" name="email" id="correo1" placeholder="Correo" required>
                        <img class="input-icon" src="images/email.png" alt="email-icono">
                    </div>
                    <div class="campo">

                        <input type="password" name="password" id="contra" placeholder="Contraseña" required>
                        <span class="ojos" onclick="mostrarContraseña()">
                            <em id="mostrar" class="fa fa-eye" title="mostrarcontraseña"></em>
                            <em id="ocultar" class="fa fa-eye-slash" title="ocultarcontraseña"></em>
                        </span>
                        <img class="input-icon" src="images/password.png" alt="password-icono">
                        <strong class="error" id="contra-error" style="margin: 10px 0px; width: 100%;">
                            Tu contraseña debe contener obligatoriamente:
                            <br>
                            <span id="chars">✖</span> Entre 8 y 20 caracteres.
                            <br>
                            <span id="espec">✖</span> Al menos un caracter especial.
                            <br>
                            <span id="mays">✖</span> Al menos una mayúscula.
                            <br>
                            <span id="mins">✖</span> Al menos una minúscula.
                            <br>
                            <span id="nums">✖</span> Al menos un número.
                        </strong>

                    </div>


                    <div class="campo btns sigPag">
                        <button class="btn">Siguiente</button>
                    </div>

                </div>

                <!--Pagina 2-->
                <div class="pagina">
                    <div class="titulo">Datos</div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="nombre-error"></strong>

                        <input type="text" name="nombre" id="nombre" placeholder="Nombre del salon" required>

                    </div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="eslogan-error"></strong>
                        <input type="text" id="eslogan" name="eslogan" placeholder="Eslogan del salon" required>
                    </div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="correo-error"></strong>
                        <input type="text" id="correo" name="correo" placeholder="Igrese correo personal o del negocio" required>
                    </div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="descripcion-error"></strong>
                        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion del salon" required>
                    </div>

                    <div class="campo btns">
                        <button class="volver-pag1 volver">Anterior</button>
                        <button class="adelante-pag3 adelante">Siguiente</button>
                    </div>
                </div>

                <!--Pagina 3-->
                <style>
                    .boton-modal label {
                        background-color: #40cfff;
                        color: #fff;
                        border-radius: 4px;
                        cursor: pointer;
                        transition: all 300ms ease;
                    }

                    .boton-modal label:hover {
                        background-color: black;
                    }

                    #btn-modal {
                        display: none;
                    }

                    .container-modal {
                        width: 100%;
                        height: 100vh;
                        position: fixed;
                        top: 0;
                        left: 0;
                        background-color: rgba(144, 148, 150, 0.8);
                        display: none;
                        justify-content: center;
                        align-items: center;
                        z-index: 100;
                    }

                    #btn-modal:checked~.container-modal {
                        display: flex;
                    }

                    .container-modal .content-modal {
                        width: 100%;
                        max-width: 500px;
                        padding: 40px;
                        background-color: #fff;
                        border-radius: 4px;
                        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
                    }

                    .content-modal h2 {
                        margin-bottom: 15px;
                    }

                    .content-modal p {
                        color: black;
                        padding: 15px 0px;
                        border-top: 1px solid #dbdbdb;
                        border-bottom: 1px solid #dbdbdb;
                    }

                    .content-modal .btn-cerrar {
                        width: 100%;
                        margin-top: 15px;
                        display: flex;
                        justify-content: flex-end
                    }

                    .content-modal .btn-cerrar label {
                        padding: 7px 10px;
                        background-color: #5488a3;
                        color: #fff;
                        border-radius: 4px;
                        cursor: pointer;
                        transition: all 300ms ease;
                    }

                    .content-modal .btn-cerrar label:hover {
                        background-color: #18E583;
                    }
                </style>
                <div class="pagina">
                    <div class="titulo">Ubicacion</div>
                    <div class="campo">
                        <strong class="error" id="departamento-error"></strong>
                        <select name="departamento" id="departamento">
                            <option value="">Seleccione un departamento</option>
                            <option value="0">Ahuachapán</option>
                            <option value="1">Cabañas</option>
                            <option value="2">Chalatenango</option>
                            <option value="3">Cuscatlán</option>
                            <option value="4">La Libertad</option>
                            <option value="5">Morazán</option>
                            <option value="6">La Paz</option>
                            <option value="7">Santa Ana</option>
                            <option value="8">San Miguel</option>
                            <option value="9">San Salvador</option>
                            <option value="10">San Vicente</option>
                            <option value="11">Sonsonate</option>
                            <option value="12">La Unión</option>
                            <option value="13">Usulután</option>
                        </select>

                    </div>
                    <div class="campo">
                        <strong class="error" id="municipio-error"></strong>
                        <select name="municipio" id="municipio" disabled>
                            <option value="">Seleccione un municipio</option>
                        </select>
                    </div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="telefono-error"></strong>
                        <input type="text" name="telefono" id="telefono" placeholder="Telefono del negocio o personal" required>
                    </div>
                    <div class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="direccion-error"></strong>
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion" required>

                        <a class="mapa" href="https://maps.google.com" target="_blank">
                            <em class="fa fa-map-location-dot" alt="https://maps.google.com"></li></em>
                        </a>
                    </div>
                    <!--botonmodal-->
                    <div class="boton-modal">
                        <label style="padding: 2px 20px; " for="btn-modal">Tutorial de como poner la direccion</label>
                    </div>
                    <!--ventanamodal-->
                    <input type="checkbox" id="btn-modal">
                    <div class="container-modal">
                        <div class="content-modal">
                            <video style="width:500px; height: 400px;" controls>
                                <source src="videotutorial/ubicacion.mp4" type="video/mp4">
                            </video>
                            <div class="btn-cerrar">
                                <label for="btn-modal">cerrar</label>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 15px;" class="campo btns">
                        <button class="volver-pag2 volver">Anterior</button>
                        <button class="adelante-pag4 adelante">Siguiente</button>
                    </div>
                </div>

                <!--Pagina 4-->
                <div class="pagina">
                    <div class="titulo">Imagenes</div>
                    <div class="campo" id="mover">
                        <div class="cambio">Logotipo del salon <strong class="error" id="btn_agregar-error"></strong></div>
                        <div id="div_file" method="post">
                            <p id="text">Agregar</p>
                            <input type="file" id="btn_agregar" name="logo" accept="image/*">
                        </div>
                        <div id="preview" class="styleimage"></div>
                    </div>
                    <div class="campo" id="mover">
                        <div class="cambio">Publicar imagenes(maximo 2) <strong class="error" id="btn_agregar1-error"></strong></div>
                        <div id="div_file" method="post">
                            <p id="text">Agregar</p>
                            <input type="file" id="btn_agregar1" name="imagenes" accept="image/*">
                        </div>
                        <div id="preview1" class="styleimage"></div>
                    </div>

                    <div class="campo btns">
                        <button class="volver-pag3 volver">Anterior</button>
                        <button class="adelante-pag5 adelante">Siguiente</button>
                    </div>
                </div>

                <!--Pagina 5-->
                <div class="pagina">
                    <div class="titulo">Seleccionar su horario de atencion</div>
                    <div class="col">
                        <strong class="error" id="input-1-error" style="float: left;"></strong>
                        <br>
                        <div class="section">
                            <input type="checkbox" name="servicios" value="Cuidado de cabello" id="input-1" class="check-input">
                            <label for="input-1" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Cuidado del cabello</span>
                        </div>
                        <div class="section">

                            <input type="checkbox" name="servicios" value="Cuidado de uñas" id="input-2" class="check-input">
                            <label for="input-2" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Cuidado de uñas</span>
                        </div>
                        <div class="section">

                            <input type="checkbox" name="servicios" value="Cuidado de piel" id="input-3" class="check-input">
                            <label for="input-3" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Cuidado de piel</span>
                        </div>
                        <div class="section">
                            <input type="checkbox" name="servicios" value="Depilación" id="input-4" class="check-input">
                            <label for="input-4" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Depilación</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="section">
                            <input type="checkbox" name="servicios" value="Maquillaje" id="input-5" class="check-input">
                            <label for="input-5" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Maquillaje</span>
                        </div>

                        <div class="section">
                            <input type="checkbox" name="servicios" value="Maquillaje de pestañas" id="input-6" class="check-input">
                            <label for="input-6" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Extensiones de pestañas</span>
                        </div>
                        <div class="section">
                            <input type="checkbox" name="servicios" value="Barbería" id="input-7" class="check-input">
                            <label for="input-7" class="checkbox">
                                <svg viewBox="0 0 22 16" fill="none">
                                    <path d="M1 6.85L8.09677 14L21 1" />
                                </svg>
                            </label>
                            <span>Barbería</span>
                        </div>

                    </div>
                    <div class="campo btns">
                        <button class="volver-pag4 volver">Anterior</button>
                        <button class="fin adelante" type="submit">PUBLICAR</button>
                    </div>

                </div>


            </form>
        </div>
    </div>

    <script>
        function mostrarContraseña() {
            var x = document.getElementById("contra");
            var y = document.getElementById("ocultar");
            var z = document.getElementById("mostrar");

            if (x.type == 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";

            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";

            }

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="JS/botonfile.js"></script>
    <script src="JS/desplazo.js"></script>
    <script src="JS/municipios.js"></script>

</body>

</html>