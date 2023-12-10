<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>LOGIN</title>
</head>
<body>
    <style>
        div#contenedor1{
            background-image: url(../image/belleza2.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size:cover;
            display: flex;
            justify-content:center;
            align-items: center;
            height: 95vh;
            width: 70%;
            margin: 0 auto;
            border-radius: 10px;
            padding: 30px;
            margin-top: 20px;
        }
        .btn-group{
            display: flex; /* Establece el contenedor como un flex container */
            justify-content: space-between;
            width: 60%;
            height: 50px;
            position: absolute;
            top: 25px;
        }
        .button{
            color: black;
            font-size: 300;
        }
        div#contenedor2{
            display: flex;
            justify-content:center;
            align-items: center;
            height: 95%;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            margin-top: 25px;
            overflow: hidden;
        }
        .container-form {
            width: 100%;
            height: 90vh;
            display: flex;
            justify-content: space-around;
            transition:  all .5s ease-out;
            
        }
        .containerform {
            display: flex;
            left: 85%;
            height: 90vh;
            justify-content: space-around;
            transition:  all .5s ease-out;
        }

        .welcome-back {
            display: flex;
            align-items: center;
            text-align: center;
            margin-left: 50px;
        }
        .message {
            padding: 1rem;
            color: #fff;
            margin-top: 10px;
        }
        .btn-registro{
            width: 122%;
            height: calc(100% + 5px);
            padding: 20px;
            background: #40cfff;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 14 px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .message h2 {
            font-size: 1.7rem;
            padding: 1rem 0;
            color: #fff;
        }

        .message button {
            padding: 1rem;
            font-weight: 400;
            background-color: #4a4aee;
            border-radius: 2rem;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: .9rem;
            margin-top: 2rem;
            transition: all .3s ease-in;
            color: #fff;
        }
        .message button:hover {
            background-color: #6464f8;
        }

        .formulario {
            width: 400px;
            padding: 1rem;
            margin: 2rem;
            background-color: rgb(51, 51, 51, 0.602);
            text-align: center;
        }

        .create-account {
            padding: 2.7rem 0;
            font-size: 1.7rem;
            color: #fff;
        }
        .formulario input {
            color: #0d0d0d;
            padding: 15px 15px 20px 50px;
            width: 100%;
            border-radius: 10px;
            border: 0;
            outline: none;
            font-size: 14px;
        }
        .formulario input[type="button"] {
            width: 60%;
            margin: auto;
            border: solid thin white;
            padding: .7rem;
            border-radius: 2rem;
            background-color: white;
            font-weight: 600;
            margin-top: 3rem;
            font-size: .8rem;
            cursor: pointer;
            color: #222;
        }
        input#botonsito{
            color: #fff;
            background-color: #5F5FEB;
            padding: 20px 15px 20px 30px;
            width: 100%;
            border-radius: 15px;
            border: 0;
            outline: none;
            font-size: 14px;
            margin-top: 30px;
        }
        input#botonsito:hover{
            background-color: rgb(51, 51, 51, 0.602);
            transition: 0.3s ease;
        }
        .sign-in {
            position: absolute;
            
        }
        .ojos {
            position: absolute;
            top: 47%;
            right: 10%;
            width: 7px;
            font-size: 20px;
            color: skyblue;
            display: block;
        }
        .ojos2 {
            position: absolute;
            top: 47%;
            right: 12%;
            width: 7px;
            font-size: 20px;
            color: skyblue;
            display: block;
        }
        .input-icon {
            position: absolute;
            height: 40px;
            width: 40px;
            left: 415px;
            top: 33%;
        }
        .input-iconuser{
            position: absolute;
            height: 40px;
            width: 40px;
            left: 385px;
            top: 33%;
        }
        .input-icon2 {
            position: absolute;
            height: 40px;
            width: 40px;
            left: 415px;
            top: 46%;
        }
        .input-iconpassd{
            position: absolute;
            height: 40px;
            width: 40px;
            left: 385px;
            top: 46%;
        }
        #ocultar {
         display: none;
        }

        #mostrar {
         cursor: pointer;
        }
        #ocultar2 {
         display: none;
        }

        #mostrar2 {
         cursor: pointer;
        }

    </style>
    <div id="contenedor1" class="container">
        <div style=" margin: 0; padding: 0; position: absolute; transform: translate(-1300%, -1050%);">
            <a href="../index.php" style="text-decoration: none;
            padding: 10px; color: #fff; background-color: #97346A; border-radius: 10px;"><em class="fa-solid fa-arrow-left"></em></a>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary btn_usuario" id="btnSalon">CLIENTE SALON</button>
            <button type="button" class="btn btn-warning" id="btnUsuario">USUARIO</button>
       </div>
       <div style="width: 91%; margin-top: 45px; position: relative; overflow: hidden; height: 90%; box-shadow: 0 0 20px rgba(0 ,0 ,0 ,0.4);">
        <div id="contenedor2" class="contenedor">
            <div class="container-form sign-in">
                <div class="welcome-back">
                    <div style="margin-right: 30px;" class="message">
                        <h2>¡HOLA!</h2>
                        <p style="font-weight: 500;">Quieres publicar tu salon de belleza?</p>
                        <button class="btn-registro" id="publicarSalonButton"><i class="fa-solid fa-shop"></i> PUBLICAR SALON</button>
                    </div>
                </div>
                <form class="formulario" id="formulario">
                    <h2 class="create-account">INICIAR SESION</h2>
                    <div style="margin-bottom: 15px;" class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="correo1-error"></strong>
                        <input type="email" name="email" id="correo4" placeholder="Correo" required>
                        <img class="input-icon" src="../images/email.png" alt="email-icono"> 
                    </div>
                    <div class="campo">
                        <input type="password" name="password" id="contra" placeholder="Contraseña" required>
                        <span class="ojos" onclick="mostrarContraseña()">
                            <em id="mostrar" class="fa fa-eye" title="mostrarcontraseña"></em>
                            <em id="ocultar" class="fa fa-eye-slash" title="ocultarcontraseña"></em>
                        </span>
                         <img class="input-icon2" src="../images/password.png" alt="password-icono">
                    </div>
                    <span style="color: red;" id="login-error"></span>
                    <input id="botonsito" class="botonsito" type="submit" value="ENTRAR">
                </form>
            </div>
            
            <!---------------------------SEGUNDO LOGIN-------------------->


            <div class="container-form sign-in" style="transform: translateX(120%);">
                <div class="welcome-back">
                    <div class="message">
                        <h2>¡HOLA!</h2>
                        <p style="font-weight: 500;">¿Aún no te as registrado?</p>
                        <button class="btn-registro" id="registraruserButton">REGISTRARME</button>
                    </div>
                </div>
                <form class="formulario" id="usuario-form">
                    <h2 class="create-account">INICIAR SESION</h2>
                    <div style="margin-bottom: 15px;" class="campo">
                        <strong style="margin-bottom: 10px;" class="error" id="correo1-error"></strong>
                        <input type="email" name="emailusuario" id="emailusuario" placeholder="Correo" required>
                         <img class="input-iconuser" src="../images/email.png" alt="email-icono">
                    </div>
                    <div class="campo">
                        <input type="password" name="passwordusuario" id="contra2" placeholder="Contraseña" required>
                        <span class="ojos2" onclick="mostrarContraseña2()">
                            <em id="mostrar2" class="fa fa-eye" title="mostrarcontraseña"></em>
                            <em id="ocultar2" class="fa fa-eye-slash" title="ocultarcontraseña"></em>
                        </span>
                        <img class="input-iconpassd" src="../images/password.png" alt="password-icono"> 
                    </div>
                    <span style="color: red;" id="login-error-u"></span>
                    <input id="botonsito" class="botonsito" type="submit" value="ENTRAR">
                </form>
            </div>
            
            
        </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const btnSalon = document.getElementById('btnSalon');
        const btnUsuario = document.getElementById('btnUsuario');
        const containerForm1 = document.querySelectorAll('.container-form')[0];
        const containerForm2 = document.querySelectorAll('.container-form')[1];

        // containerForm2.style.display = 'none';
        containerForm2.style.transform = 'translateX(100%)';

        btnSalon.addEventListener('click', () => {
            // containerForm1.style.display = 'flex';
            containerForm1.style.transform = 'translateX(0)';
            // containerForm2.style.display = 'none';
            containerForm2.style.transform = 'translateX(120%)';
        });

        btnUsuario.addEventListener('click', () => {
            // containerForm1.style.display = 'none';
            containerForm1.style.transform = 'translateX(-120%)';
            // containerForm2.style.display = 'flex';
            containerForm2.style.transform = 'translateX(0)';
        });

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
        function mostrarContraseña2() {
            var x = document.getElementById("contra2");
            var y = document.getElementById("ocultar2");
            var z = document.getElementById("mostrar2");

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

        let form = document.querySelector('#formulario');
        let formusuario = document.querySelector('#usuario-form');
        let loginError = document.querySelector('#login-error');
        let loginErrorU = document.querySelector('#login-error-u');

        form.addEventListener("submit", function(e) {
        e.preventDefault();

        let loginForm = new FormData();
        loginForm.append('email', document.querySelector('input[name="email"]').value);
        loginForm.append('password', document.querySelector('input[name="password"]').value);

        fetch("servidor/login/logear.php", {
            method: 'POST',
            body: loginForm,
            })
            .then(response => response.json())
            .then(data => {
            if (data.success) {

                Swal.fire({
                title: '<h2 style="color: #2873ba;">Bienvenido!</h2>',
                html: 'Hola, ' + data.info[0] + '<br>' +
                    '<img src="../img/logos/' + data.info[1] + '" class="login-img">',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                stopKeydownPropagation: false,
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../servicios.php?id=${data.info[2]}`;
                }
                });
            } else {
                console.log('No se pudo ingresar');
                loginError.innerHTML = 'El correo o contraseña es incorrecta, Por favor vuelve a intentarlo';
            }
            })

        });

        formusuario.addEventListener("submit", function(e) {
        e.preventDefault();

        let loginForm = new FormData();
        loginForm.append('email', document.querySelector('input[name="emailusuario"]').value);
        loginForm.append('password', document.querySelector('input[name="passwordusuario"]').value);

        fetch("servidor/login/usuario.php", {
            method: 'POST',
            body: loginForm,
            })
            .then(response => response.json())
            .then(data => {
            if (data.success) {

                Swal.fire({
                title: '<h2 style="color: #2873ba;">¡Bienvenido de nuevo!</h2>',
                html: 'Sesión iniciada',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                stopKeydownPropagation: false,
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../index.php`;
                }
                });
            } else {
                console.log('No se pudo ingresar');
                loginErrorU.innerHTML = 'El correo o contraseña es incorrecta, Por favor vuelve a intentarlo';
            }
            })

        });

        const publicarSalonButton = document.getElementById('publicarSalonButton');

        publicarSalonButton.addEventListener('click', function() {
            window.location.href = '../RegistroSalon.php';
        });

       const registraruserButton = document.getElementById('registraruserButton');

       registraruserButton.addEventListener('click', function() {
            window.location.href = 'registrouser.php';
        });
    </script>
</body>
</html>