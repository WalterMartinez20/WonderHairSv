<?php include("template\cabecera.php") ?>

<section class="content about">

  <h2 class="titulo">Contacta con nosotros</h2>
  <p>Rellena el formulario o envíanos un mensaje a través de nuestro email o redes sociales. Nuestro equipo estará encantado de atenderte..
  </p>
</section>


<script src="https://kit.fontawesome.com/a75248a9a3.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/contacto.css">

<body>
  <div class="contactUs">
    <div class="title">
      <h2>Contactanos</h2>

    </div>
    <div class="box">
      <div class="contacto form">
        <h3>Enviar un mensaje</h3>
        <form>
          <div class="formBox">
            <div class="row50">
              <div class="inputBox">
                <span>Nombre</span>
                <input type="text" placeholder="escribe tu nombre">
              </div>
              <div class="inputBox">
                <span>Apellido</span>
                <input type="text" placeholder="escribe tu apellido">
              </div>
            </div>
            <div class="row50">
              <div class="inputBox">
                <span>Correo electronico</span>
                <input type="text" placeholder="escribe tu correo">
              </div>
              <div class="inputBox">
                <span>Telefono</span>
                <input type="text" placeholder="escribe tu numero telefonico">
              </div>
            </div>

            <div class="row100">
              <div class="inputBox">
                <span>Mensaje</span>
                <textarea placeholder="Escribe tu mensaje"></textarea>
              </div>
            </div>
            <div class="row100">
              <div class="inputBox">
                <input type="submit" value="Enviar">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="contacto info">
        <h3>Informacion de contacto</h3>
        <div class="infoBox">

          <div>
            <span>
              <em class="fa-regular fa-envelope"></em>
            </span>
            <a href="#">localwonder@gmail.com</a>

          </div>
          <div>
            <span>
              <em class="fa fa-phone"></em>
            </span>
            <a href="#">7986-2910</a>
          </div>
          <ul class="sci">
            <li><a href="#"><em class="fa-brands fa-facebook"></em></a></li>
            <li><a href="#"><em class="fa-brands fa-instagram"></em></a></li>

          </ul>
        </div>
      </div>


    </div>


  </div>
</body>

<?php include("template\pie.php") ?>