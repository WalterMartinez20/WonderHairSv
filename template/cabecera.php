<?php
session_start();
?>
<?php include("loginUsuario/clases/Auth.php") ?>
<?php
$AuthHead = new Auth();

if (isset($_SESSION['carrito'])) {
  $carrito = $_SESSION['carrito'];
  $productos = array();

  foreach ($carrito as $producto_id) {
    $producto = $AuthHead->productoPorID($producto_id);

    $productos[] = $producto;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
    if (isset($_GET['id'])) {
      ?>
      <meta property="og:url" content="http://wonderhairsv.test/wonderhairsv/detalle.php?id=<?php echo $_GET['id']; ?>">
      <meta property="og:type" content="website">
      <meta property="og:title" content="¡Mira el siguiente producto!">
      <meta property="og:description" content="Entra a este enlace y observa los productos que tenemos en Wonderhair SV.">
      <?php
    }
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local Wonder Hair</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/cabezera.css">
  <link rel="stylesheet" href="css/fondo.css">
  <link rel="stylesheet" href="css/Perfilsalon.css">
  <link rel="stylesheet" href="css/detalle.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
  <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
  <script>
    const socket = io('http://127.0.0.1:3000');
    if (Notification.permission !== 'granted') {
      Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
          console.log('Permiso de notificación otorgado');
        } else {
          console.log('Permiso de notificación denegado');
        }
      });
    }

    function mostrarNotificacion(titulo, cuerpo) {
      console.log('Notificar');
      if (Notification.permission === 'granted') {
        const options = {
          body: cuerpo,
        };

        const notification = new Notification(titulo, options);
      }
    }

    socket.on('messageToClient', (data) => {
      <?php if (isset($_SESSION['id'])) { ?>
        if (data.to === <?php echo $_SESSION['id']; ?>) {
          mostrarNotificacion(`Nuevo mensaje de ${data.nombre}`, data.msg);
        }
      <?php } ?>
    });
  </script>

</head>

<body class="fondo">
  <!--------top bar----------->
  <section class="bg-primary">
    <div class="container">
      <div class="row top-bar" style="padding-bottom: 3px;">
        <div class="col text-right">
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <em class="fa-brands fa-facebook-f"></em>
          </span>
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <em class="fa-brands fa-instagram"></em>
          </span>
          <span class="text-white" style=" font-size: 12px; padding: 1px 5px;">
            <!----Iconos de redes sociales---->
            <em class="fa-brands fa-twitter"></em>
          </span>
        </div>
        <div class="col text-right">
          <span class="text-white">
            <em class="fa fa-phone"></em>
            +(503)7978-2920
          </span>
          <span class="col text-white">
            |
          </span>
          <span class="text-white">
            <em class="fa-regular fa-envelope"></em>
            localwonder@gmail.com
          </span>
        </div>
      </div>
    </div>
  </section>
  <!--------top bar----------->

  <!-------add nav------ bereeee----->
  <section class="bg-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand p-0" href="#">
            <!---logooooo---->
            <img alt="logo" src="img/Logo.png" style="height: 60px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <?php
              if (!(isset($_SESSION['id']))) {
              ?>
                <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                  <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 20px;">Salones</a>
                </li>
              <?php
              }
              ?>
              <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                <a class="nav-link" href="productos.php" style="font-size: 20px;">Productos</a>
              </li>
              <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                <a class="nav-link" href="cursos.php" style="font-size: 20px;">Cursos</a>
              </li>
              <!--MIS MARCADORES DESABILITADO-->
              <!--<li class="nav-item" style="font-weight: 600; margin: 6px; ">
                <!-- Button trigger modal -->
                <!--<button style=" font-size: 20px;" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <em class="fa fa-bookmark"></em> Mis marcadores
                </button>

                <!-- Modal -->
                <!--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><em class="fa fa-bookmark"></em> Mis Marcadores</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <?php
                        if (isset($_SESSION['carrito'])) {
                          foreach ($productos as $producto) {
                        ?>
                            <div class="card mb-3" style="max-width: 500px;">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <img style="padding: 25px;" src="img/productos/<?php echo $producto['imagen']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-5">
                                  <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                  </div>
                                  <a href="detalle.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary" style="float: left; margin-right: 4px;">comprar</a>
                                  <!-- <a type="#" class="btn btn-secondary">quitar</a> -->
                                  <form method="GET" action="loginUsuario/servidor/registro/eliminarCarrito.php">
                                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                    <button type="submit" class="btn btn-secondary">quitar</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                <!--</div>
              </li>-->
              <li class="nav-item dropdown" style="font-weight: 600; margin: 6px; ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px;">
                  Mas...
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="contacto.php"><em class="fa-solid fa-address-book"></em> Contacto</a></li>
                  <li><a class="dropdown-item" href="#">Acerca de.</a></li>
                </ul>
              </li>
              
              <!--INICIO DE VENTANA DUEÑO DEL SALON-->
              <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                <!-- Button trigger modal -->
                  <button style=" font-size: 20px;" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#Modalsalon">
                    Ventana U
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="Modalsalon" tabindex="-1" aria-labelledby="ModalLabelsalon" aria-hidden="true">
                    <div class="modal-dialog">
                      <div style="background-color: rgba(0, 0, 0, 0.6); color: #ffffff; margin-left: 400px;" class="modal-content">
                        <div class="modal-header">
                          <a class="navbar-brand p-0" href="#">
                           <img src="images/personal.png" style="height: 70px; border: 2px solid #fff; border-radius: 50%;">
                          </a>
                          <a style="margin-right: 150px; padding-top: 9px;">
                            <h5>Dina Esperanza</h5>
                            <p>Dinaezperanza@gmail.com</p>
                          </a>
                        </div>
                        <div class="modal-body">
                           <!-- Button Mis Citas reservadas -->
                          <button style="color: #fff; background: transparent; border:none;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <h5><i class="fa fa-scissors"></i> Mis Citas Reservadas</h5>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <!-- Button Mis marcadores -->
                          <button style="color: #fff; background: transparent; border:none; margin-right: 299px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             <h5><em class="fa fa-bookmark"></em> Mis Marcadores</h5>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <!-- Button Cerrar sesion -->
                          <button style="color: #fff; background: transparent; border:none; margin-right: 320px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <h5><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesion</h5>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <!--FIN DE VENTANA DUEÑO DEL SALON-->
                      
              <!--INCIO DE VENTANA USUARIO-->
              <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                 <!-- Button trigger modal -->
                 <button style=" font-size: 20px;" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#Modalusuario">
                    Ventana D
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="Modalusuario" tabindex="-1" aria-labelledby="ModalLabelusuario" aria-hidden="true">
                    <div class="modal-dialog">
                      <div style="background-color: rgba(0, 0, 0, 0.6); color: #ffffff; margin-left: 400px;" class="modal-content">
                        <div class="modal-header">
                          <a class="navbar-brand p-0" href="#">
                           <img src="images/personal.png" style="height: 70px; border: 2px solid #fff; border-radius: 50%;">
                          </a>
                          <a style="margin-right: 150px; padding-top: 9px;">
                            <h5>Roxy Salon & Boutique</h5>
                            <p>Roxysalon@gmail.com</p>
                          </a>
                        </div>
                        <div class="modal-body">
                           <!-- Button Cerrar sesion -->
                          <button style="color: #fff; background: transparent; border:none;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <h5><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesion</h5>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <!--FIN DE VENTANA USUARIO-->
            </ul>
          </div>
          <a style="position: fixed; z-index: 999; bottom: 20px; right: 25px; transition: ease 0.3s; background-color: #3285EE;
            border: 1px solid #ffff;
            border-radius: 50%;" class="navbar-brand p-0" href="chat-wonder/chat.php">
            <!---logooooo---->
            <img alt="burbujaChat" src="images/burbuja-de-chat.png" style="height: 80px;
            padding: 5px;
            transition: ease 1s;">
          </a>
          <a class="navbar-brand p-0" href="<?php if (isset($_SESSION['id']) && $_SESSION['id'] !== 0) { ?> Perfil_Salon.php?id=<?php echo $_SESSION['id'] ?> <?php } else { ?>  loginUsuario/doblelogin.php <?php } ?>">
          <a class="navbar-brand p-0" href="<?php if (isset($_SESSION['id']) && $_SESSION['id'] == 0) { ?> loginUsuario/servidor/login/logout.php <?php } else { ?>  loginUsuario/doblelogin.php <?php } ?>">
            <!---logooooo---->
            <?php
            if (isset($_SESSION['logo'])) {
              echo '<img src="img/logos/' . $_SESSION['logo'] . '" alt="Logo" style="height: 70px; border: 2px solid #000; border-radius: 50%;">';
            } else {
              echo '<img src="images/personal.png" style="height: 70px; border: 2px solid #000; border-radius: 50%;">';
            }
            ?>

            <!-- <li><a class="dropdown-item" href="loginUsuario/servidor/login/logout.php">Salir del sistema</a></li> -->
          </a>

        </div>
      </nav>
    </div>
  </section>
  <!-------add nav------ bereeee----->

  <div class="container">
    <br />
    <div class="row">