<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login de email</title>
</head>

<body style=" padding: 30px 35px 30px 35px;">
  <div class="container" style="display:block;">
    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <!--<div class="d-none d-md-flex">
      <p  id="Rgistro">Hola!</p>
      <p id="rgistro">Quieres publicar tu salon de belleza?</p>
      <div>
        <a href="../RegistroSalon.php" style="position: absolute; top: 40%; left: 130px; text-decoration: none; background-color: Skyblue;
          padding: 0.75rem 1rem; letter-spacing: 0.05rem; font-weight: 600; font-size: 20px; color: white; border-radius: 20px;"><img src="../img/barbershop.png" style="height: 30px;"> PUBLICAR SALON</a>
      </div>
    </div>----->
    <!-- Button trigger modal -->


    <div class="col-md-8 col-lg-5" style="box-shadow: 0 0 20px rgba(0, 0, 0.2);
      border-radius: 25px; width:50%; margin-inline: auto;">
      <div class="login d-flex align-items-center py-5">
        <div class="container ">
          <div class="row" style="justify-content: center;">
            <div class="col-md-9 col-lg-8 align-items-center justify-content-center">
              <h3 class="login-heading mb-4">Iniciar Sesión</h3>

              <!-- Sign In Form -->
              <form action="servidor/login/logear.php" method="post">

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="email" id="email" placeholder="email">
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="contra" placeholder="Password">
                  <label for="password">Password</label>
                  <span class="ojos" style="left: 90%; position: absolute; top: 25%; right: 10px; font-size: 20px; color: skyblue;" onclick="mostrarContraseña()">
                    <em id="mostrar" style="cursor: pointer" class="fa fa-eye" title="mostrarcontraseña"></em>
                    <em id="ocultar" style="display: none;" class="fa fa-eye-slash" title="ocultarcontraseña"></em>
                  </span>
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
                </div>
                <span style="color: red;" id="login-error"></span>
                <h2></h2>
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Entrar</button>
                  <div class="text-center">
                    <a class="small" href="../RegistroSalon.php">Registrate aqui!</a>
                    <a class="small" id="separo" href="../index.php">Volver al menú principal</a>
                  </div>

                </div>


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    let form = document.querySelector('form');
    let loginError = document.querySelector('#login-error');

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
  </script>

</body>

</html>