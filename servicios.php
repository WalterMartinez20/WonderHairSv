<?php include("template\cabecera.php") ?>
<?php include("template\perfil.php") ?>
<style>
    .direccion {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .boton-flotante label {
        padding: 10px 15px;
        background-color: #5488a3;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 300ms ease;
        margin-right: 140px;
    }

    .boton-flote label {
        padding: 10px 15px;
        background-color: #5488a3;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 300ms ease;
        margin-right: 140px;
    }

    .boton-flotante label:hover {
        background-color: #18E583;
    }

    .boton-flote label:hover {
        background-color: #18E583;
    }

    #btn-flotante {
        display: none;
    }

    #btn-flote {
        display: none;
    }

    .contenedor-flotante {
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

    .contenedor-flote {
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

    #btn-flotante:checked~.contenedor-flotante {
        display: flex;
    }

    #btn-flote:checked~.contenedor-flote {
        display: flex;
    }

    .contenedor-flotante .content-flotante {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        background-color: #fff;
        border-radius: 4px;
    }

    .contenedor-flote .content-flote {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        background-color: #fff;
        border-radius: 4px;
    }

    .content-flotante h2 {
        margin-bottom: 15px;
    }

    .content-flote h2 {
        margin-bottom: 15px;
    }

    .content-flote p {
        color: black;
        padding: 15px 0px;
        border-top: 1px solid #dbdbdb;
        border-bottom: 1px solid #dbdbdb;

    }

    .content-flotante .btn-cerrar {
        width: 100%;
        margin-top: 15px;
        display: flex;
        justify-content: flex-end
    }

    .content-flote .btn-Cerrar {
        width: 100%;
        margin-top: 15px;
        display: flex;
        justify-content: flex-end
    }

    .content-flotante .btn-cerrar label {
        padding: 7px 10px;
        background-color: #5488a3;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 300ms ease;
    }

    .content-flote .btn-Cerrar label {
        padding: 7px 10px;
        background-color: #5488a3;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 300ms ease;
    }

    .content-flotante .btn-cerrar label:hover {
        background-color: #18E583;
    }

    .content-flote .btn-Cerrar label:hover {
        background-color: #18E583;
    }

    .card-img-top {
        border-radius: 30px;
        padding: 20px;
        height: auto;
        width: 100%;
    }

    .card {
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
    .campo1 {
        position: relative;
        width: 305px;
        margin-bottom: 15px;
    }

    .cambio1 {
        flex: 1;
        text-align: left;
        color: #000;
    }
    div#div_file1 {
        position: relative;
        margin: 2px;
        padding: 2px;
        width: 70px;
        background-color: #2499e3;
        border-radius: 10px;
        align-items: center;
        margin-left: auto;
        right: 60px
    }
    p#text {
        text-align: center;
        color: white;
        font-weight: 200;
        margin-top: 10px;
    }
    input#btns_agregar {
        position: absolute;
        top: 1px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
</style>
<div class="direccion">
    <!--Boton flotante-->
    <?php
    if (isset($_GET['id'])) {
        if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id']) {
    ?>
            <div class="boton-flote">
                <label for="btn-flote">
                    Citas reservadas
                </label>
            </div>
    <?php
        }
    }
    ?>

    <input type="checkbox" id="btn-flote">
    <div class="contenedor-flote">
        <div style="max-width: 750px;" class="content-flote">
            <h2 style="margin: 0px 230px"> <em>Citas reservadas</em></h2>
            <div style="border: none; background: white; height: 550px; max-height: 330px; overflow: auto; width: 700px; margin-left: 10px; margin-top: 20px;" class="card col-sm-5 p-3">
                <table class="table table-bordered" id="product-table">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th scope="col">BUSCAR:</th>
                            <th scope="col" colspan="14">
                                <input id="txtBuscar" style="background: transparent;" type="text" class="form-control" placeholder="Buscar por nombre">
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Servicio</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Comentario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="citas-tabla">
                    </tbody>
                </table>
            </div>
            <div class="btn-Cerrar">
                <label for="btn-flote">Cerrar</label>
            </div>
        </div>
    </div>

    <!--Boton flotante2-->
    <?php
    if (isset($_GET['id'])) {
        if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id']) {
    ?>
            <div class="boton-flotante">
                <label for="btn-flotante">
                    <em class="fa-solid fa-plus"></em> Agregar servicios de belleza
                </label>
            </div>
    <?php
        }
    }
    ?>

    <input type="checkbox" id="btn-flotante">
    <div class="contenedor-flotante">
        <div class="content-flotante">
            <H2>Servicios de belleza</H2>
            <div class="form-group">
                <label for="txtServicio">Nombre:</label>
                <input required type="text" class="form-control" name="txtServicio" id="txtServicio" placeholder="Nombre del Servicio">
            </div>
            <div class="campo1" id="mover2">
                <div class="cambio1">Imagen o foto de perfil <strong class="error" id="btn_agregar-error"></strong></div>
                <div id="div_file1" method="post">
                 <p id="text">Agregar</p>
                 <input type="file" id="btns_agregar" name="logo" accept="image/*">
                </div>
                <div id="previewimgs" class="styleimage"></div>
            </div>

            <div style="margin-top:10px;" class="btn-group" role="group" aria-label="">
                <button style="margin-right: 15px;" type="submit" name="accion" value="Agregar" id="btnAgregar" class="btn btn-success">Agregar</button>
                <button disabled style="margin-right: 15px;" type="submit" name="accion" value="Modificar" id="btnActualizar" class="btn btn-warning">Modificar</button>
                <button type="button" name="accion" value="Cancelar" id="btnLimpiar" class="btn btn-info">Cancelar</button>
            </div>
            <div class="btn-cerrar">
                <label for="btn-flotante">Cerrar</label>
            </div>
        </div>
        <div style="border: none; background: white; height: 550px; max-height: 330px;  overflow: auto; width: 700px; margin-left: 10px; margin-top: 20px;" class="card col-sm-5 p-3">
            <table class="table table-bordered" id="services-table">
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="servicios-tabla">
                </tbody>
            </table>
        </div>
    </div>
</div>
<h2></h2>
<h2></h2>
<style>
    .cambiar-photo {
        position: absolute;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: rgba(0, 0, 0, .5);
        height: 50%;
        color: #fff;
        text-decoration: none;
        transform: translateY(50%);
        opacity: 0;
        transition: all ease-in 300ms;
    }

    .cambiar-photo em {
        margin-bottom: .5rem;
        font-size: 2rem;
    }

    .card:hover .cambiar-photo {
        transform: translateY(30%);
        opacity: 1;
        color: #fff;
    }

    .servicios-cards {
        width: 100%;
        position: relative;
        display: flex;
        flex-wrap: wrap;
    }
</style>
<div class="servicios-cards"></div>

<h2></h2>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const serviciosContainer = document.querySelector('#servicios-tabla');
    const citasContainer = document.querySelector('#citas-tabla');
    const serviciosCard = document.querySelector('.servicios-cards');
    const txtServicio = document.querySelector('#txtServicio');
    const btnAgregar = document.querySelector('#btnAgregar');
    const btnActualizar = document.querySelector('#btnActualizar');
    const btnLimpiar = document.querySelector('#btnLimpiar');
    const txtBuscar = document.querySelector('#txtBuscar');
    let servicioAnterior = "";
    let now = new Date();
    let timestamp = now.toJSON();

    btnActualizar.addEventListener('click', (e) => {
        if (txtServicio.value !== "" && servicioAnterior !== "") {
            servicio = {
                servicio: txtServicio.value,
                id: <?php echo $_GET['id'] ?>,
                anterior: servicioAnterior,
            };

            fetch("loginUsuario/servidor/registro/actualizarServicio.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(servicio),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        txtServicio.value = "";
                        servicioAnterior = "";
                        conseguirServicios();

                        btnAgregar.disabled = false;
                        btnActualizar.disabled = true;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });

    btnAgregar.addEventListener('click', (e) => {
        if (txtServicio.value !== "") {
            servicio = {
                servicio: txtServicio.value,
                id: <?php echo $_GET['id'] ?>,
            };

            fetch("loginUsuario/servidor/registro/registrarServicios.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(servicio),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        txtServicio.value = "";
                        conseguirServicios();

                        btnAgregar.disabled = false;
                        btnActualizar.disabled = true;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });

    function eliminarServicio(servicio) {
        fetch("loginUsuario/servidor/registro/eliminarServicio.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    servicio
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    txtServicio.value = "";
                    conseguirServicios();

                    btnAgregar.disabled = false;
                    btnActualizar.disabled = true;
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    function conseguirServicios() {
        fetch("loginUsuario/servidor/servicios.php?id=<?php echo $_GET['id'] ?>", {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.info) {
                        serviciosContainer.innerHTML = "";
                        serviciosCard.innerHTML = "";

                        data.info.forEach((servicio, index) => {
                            actualizarTablaServicios(servicio);
                            actualizarCardServicio(servicio, index);
                        })
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    function conseguirCitas() {
        fetch("loginUsuario/servidor/citas.php?id=<?php echo $_GET['id'] ?>", {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.info) {
                        console.log(data.info);
                        citasContainer.innerHTML = "";

                        data.info.forEach((citas, index) => {
                            actualizarCitas(citas, index);
                        })
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    function actualizarCitas(cita) {
        let tr = document.createElement('tr');

        let servicio = document.createElement('td');
        servicio.innerText = cita.servicio; // Cambia "Maquillaje" por el valor del servicio de la cita.

        let nombre = document.createElement('td');
        nombre.innerText = cita.nombre;

        let telefono = document.createElement('td');
        telefono.innerText = cita.telefono;

        let correo = document.createElement('td');
        correo.innerText = cita.correo;

        let fecha = document.createElement('td');
        fecha.innerText = cita.fecha;

        let hora = document.createElement('td');
        hora.innerText = cita.hora;

        let comentario = document.createElement('td');
        comentario.innerText = cita.mensaje;

        let acciones = document.createElement('td');
        acciones.style.display = "flex";

        let completada = document.createElement('button');
        completada.classList = "btn btn-success";
        completada.innerText = "Completada";
        completada.disabled = false;

        let cancelada = document.createElement('button');
        cancelada.classList = "btn btn-danger";
        cancelada.innerText = "Cancelada";
        cancelada.disabled = false;

        let retomar = document.createElement('button');
        retomar.classList = "btn btn-warning";
        retomar.innerText = "Retomar";
        retomar.disabled = true;

        if (cita.estado === "activo") {
            retomar.disabled = true;
            cancelada.disabled = false;
            completada.disabled = false;
        } else if (cita.estado === "cancelado") {
            retomar.disabled = false;
            cancelada.disabled = true;
            completada.disabled = true;
        } else if (cita.estado === "completo") {
            retomar.disabled = true;
            cancelada.disabled = true;
            completada.disabled = true;
        }

        completada.addEventListener('click', (e) => {
            let formulario = {
                id: cita.id
            }
            fetch("loginUsuario/servidor/registro/completarCita.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formulario),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        retomar.disabled = true;
                        cancelada.disabled = true;
                        completada.disabled = true;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
        cancelada.addEventListener('click', (e) => {
            if (window.confirm("¿Quieres cancelar la cita?")) {
                formulario = {
                    id: cita.id
                }
                fetch("loginUsuario/servidor/registro/cancelarCita.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(formulario),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            retomar.disabled = false;
                            cancelada.disabled = true;
                            completada.disabled = true;
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
        retomar.addEventListener('click', (e) => {
            let formulario = {
                id: cita.id
            }
            fetch("loginUsuario/servidor/registro/retomarCita.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formulario),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        retomar.disabled = true;
                        cancelada.disabled = false;
                        completada.disabled = false;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });

        acciones.appendChild(completada);
        acciones.appendChild(cancelada);
        acciones.appendChild(retomar);

        tr.appendChild(servicio);
        tr.appendChild(nombre);
        tr.appendChild(telefono);
        tr.appendChild(correo);
        tr.appendChild(fecha);
        tr.appendChild(hora);
        tr.appendChild(comentario);
        tr.appendChild(acciones);

        citasContainer.appendChild(tr);
    }

    function actualizarTablaServicios(servicio) {
        let tr = document.createElement('tr');
        let nombre = document.createElement('td');
        nombre.innerText = servicio;
        let acciones = document.createElement('td');
        let seleccionar = document.createElement('button');
        seleccionar.classList = "btn btn-primary";
        seleccionar.innerText = "Seleccionar";
        seleccionar.addEventListener('click', (e) => {
            txtServicio.value = servicio;
            servicioAnterior = servicio;

            btnAgregar.disabled = true;
            btnActualizar.disabled = false;
        });

        let eliminar = document.createElement('button');
        eliminar.classList = "btn btn-warning";
        eliminar.innerText = "Eliminar";
        eliminar.addEventListener('click', (e) => {
            if (window.confirm("¿Quieres eliminar el servicio " + servicio + "?")) {
                eliminarServicio(servicio);
            }
        });

        tr.appendChild(nombre);
        tr.appendChild(acciones);
        acciones.appendChild(seleccionar);
        acciones.appendChild(eliminar);
        serviciosContainer.appendChild(tr);
    }

    function actualizarCardServicio(servicio, index) {
        const div = document.createElement('div');
        div.style.marginTop = '10px';
        div.style.padding = '.5rem';
        div.classList.add('col-md-3');

        const card = document.createElement('div');
        card.classList.add('card');

        card.innerHTML = `
        <img src="image/photo.jpg" class="card-img-top" alt="...">
        <?php
        if (isset($_GET['id'])) {
            if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id']) {
        ?>
            <a href="#" class="cambiar-photo">
                <em class="fa-regular fa-image"></em> 
                <span>Cambiar foto</span>
            </a>
        <?php
            }
        }
        ?>
        <div class="card-body">
            <h3 class="card-title"><em>${servicio}</em></h3>
            <!-- Button trigger modal -->
            <?php
            if (!(isset($_SESSION['id']))) {
            ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal${index}">
                Reservar cita
                </button>
            <?php
            }
            ?>
        `;

        const modal = document.createElement('div');
        modal.classList = "modal fade";
        modal.id = `exampleModal${index}`;
        modal.tabindex = "-1";
        modal.ariaLabelledby = "exampleModalLabel";
        modal.ariaHidden = "true";

        const dialog = document.createElement('div');
        dialog.classList = "modal-dialog";

        const content = document.createElement('div');
        content.classList = "modal-content";

        const header = document.createElement('div');
        header.classList = "modal-header";
        header.innerHTML = `
        <h1 class="modal-title fs-5" id="exampleModalLabel">${servicio}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        `;

        const form = document.createElement('form');
        form.action = "";
        form.method = "POST";
        form.id = "servicio" + index + "<?php echo $_GET['id'] ?>";
        form.classList = 'modal-body';

        const nombreLabel = document.createElement('label');
        nombreLabel.setAttribute('for', 'txtnombre');
        nombreLabel.innerText = 'Nombre:';

        const nombreInput = document.createElement('input');
        nombreInput.setAttribute('type', 'text');
        nombreInput.setAttribute('class', 'form-control');
        nombreInput.setAttribute('name', 'txtnombre');
        nombreInput.setAttribute('id', 'txtnombre');
        nombreInput.setAttribute('placeholder', 'Escriba su nombre completo');
        nombreInput.setAttribute('required', 'required');

        const telefonoLabel = document.createElement('label');
        telefonoLabel.setAttribute('for', 'txtelefono');
        telefonoLabel.innerText = 'Telefono:';

        const telefonoInput = document.createElement('input');
        telefonoInput.setAttribute('type', 'text');
        telefonoInput.setAttribute('class', 'form-control');
        telefonoInput.setAttribute('name', 'txtelefono');
        telefonoInput.setAttribute('id', 'txtelefono');
        telefonoInput.setAttribute('placeholder', 'Escriba su numero de telefono');
        telefonoInput.setAttribute('required', 'required');

        const correoLabel = document.createElement('label');
        correoLabel.setAttribute('for', 'txtcorreo');
        correoLabel.innerText = 'Correo:';

        const correoInput = document.createElement('input');
        correoInput.setAttribute('type', 'text');
        correoInput.setAttribute('class', 'form-control');
        correoInput.setAttribute('name', 'txtcorreo');
        correoInput.setAttribute('id', 'txtcorreo');
        correoInput.setAttribute('placeholder', 'Escriba su correo electronico');
        correoInput.setAttribute('required', 'required');

        const fechaLabel = document.createElement('label');
        fechaLabel.setAttribute('for', 'txtfecha');
        fechaLabel.innerText = 'Seleccione la fecha de su cita:';

        const fechaInput = document.createElement('input');
        fechaInput.setAttribute('type', 'date');
        fechaInput.setAttribute('class', 'form-control');
        fechaInput.setAttribute('name', 'txtfecha');
        fechaInput.setAttribute('id', 'txtfecha');
        fechaInput.setAttribute('required', 'required');
        fechaInput.setAttribute('min', '<?php echo date('Y-m-d'); ?>');

        const horaLabel = document.createElement('label');
        horaLabel.setAttribute('for', 'txthora');
        horaLabel.innerText = 'Seleccione la hora de su cita:';

        const horaSelect = document.createElement('select');
        horaSelect.setAttribute('class', 'form-control');
        horaSelect.setAttribute('name', 'txthora');
        horaSelect.setAttribute('id', 'txthora');
        horaSelect.setAttribute('required', 'required');

        const horaInicio = new Date("2023-01-01T07:00:00");
        const horaFin = new Date("2023-01-01T18:00:00");
        const intervalo = 15;

        while (horaInicio <= horaFin) {
            const option = document.createElement("option");
            option.value = horaInicio.toLocaleString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
            option.innerText = horaInicio.toLocaleString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
            horaSelect.appendChild(option);

            horaInicio.setMinutes(horaInicio.getMinutes() + intervalo);

            if (horaInicio.getHours() === 12) {
                horaInicio.setHours(13);
            }
        }


        const mensajeLabel = document.createElement('label');
        mensajeLabel.setAttribute('for', 'txtmensaje');
        mensajeLabel.innerText = 'Mensaje adicional (opcional):';

        const mensajeInput = document.createElement('input');
        mensajeInput.setAttribute('type', 'text');
        mensajeInput.setAttribute('class', 'form-control');
        mensajeInput.setAttribute('name', 'txtmensaje');
        mensajeInput.setAttribute('id', 'txtmensaje');
        mensajeInput.setAttribute('placeholder', 'Escriba su mensaje o especificación');

        const enviarButton = document.createElement('button');
        enviarButton.setAttribute('type', 'submit');
        enviarButton.setAttribute('class', 'btn btn-primary');
        enviarButton.innerText = 'Enviar';

        form.appendChild(nombreLabel);
        form.appendChild(nombreInput);
        form.appendChild(telefonoLabel);
        form.appendChild(telefonoInput);
        form.appendChild(correoLabel);
        form.appendChild(correoInput);
        form.appendChild(fechaLabel);
        form.appendChild(fechaInput);
        form.appendChild(horaLabel);
        form.appendChild(horaSelect);
        form.appendChild(mensajeLabel);
        form.appendChild(mensajeInput);

        form.appendChild(enviarButton);

        content.appendChild(header);
        content.appendChild(form);
        dialog.appendChild(content);
        modal.appendChild(dialog);


        card.appendChild(modal);

        card.innerHTML += `
        </div>
        </div>
        `

        div.appendChild(card);

        serviciosCard.appendChild(div);

        document.querySelector(`#servicio${index}<?php echo $_GET['id'] ?>`).addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            console.log(e.target);


            // let now = new Date();
            // let timestamp = now.toJSON();
            console.log(timestamp);

            const formDataJSON = {};
            formData.forEach((value, key) => {
                formDataJSON[key] = value;
            });

            formDataJSON.id = <?php echo $_GET['id'] ?>;
            formDataJSON.servicio = servicio;
            formDataJSON.timestamp = timestamp;
            formDataJSON.salon = "<?php echo $salon['nombre'] ?>";

            fetch('loginUsuario/servidor/registro/registrarCita.php', {
                    method: 'POST',
                    body: JSON.stringify(formDataJSON),
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status == "success") {
                        Swal.fire({
                            title: '<h2 style="color: #2873ba;">Cita realizada con exito!</h2>',
                            html: '<b style="color: black;">¡Su cita ha sido confirmada!<b><br>' +
                                '<p style="color: black;">El Salon:</p> <b style="color: black;">' + data.datos.salon + '<b><br>' +
                                '<p style="color: black; font-weight: 400;">Lo espera el día' + data.datos.txtfecha +
                                ' Hora: ' + data.datos.txthora + '<br>' +
                                'Para más información puede contactar con el salón</p>',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: '<em class="fa fa-thumbs-up"></em> ACEPTAR',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            stopKeydownPropagation: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else if (data.status == "exist_date_time") {
                        Swal.fire({
                            title: '<h2 style="color: #2873ba;">¡No se ha podido registrar tu cita!</h2>',
                            html: 'La fecha y hora seleccionadas ya han sido registradas anteriormente.',
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            stopKeydownPropagation: false,
                        }).then((result) => {

                        });
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });

    }

    txtBuscar.addEventListener('input', () => {
        const busqueda = txtBuscar.value.toLowerCase().trim();

        const rows = document.querySelectorAll('#citas-tabla tr');

        rows.forEach(row => {
            const idCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const nombreCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const telefonoCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const correoCell = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const fechaCell = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
            const horaCell = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
            const shouldShowRow = idCell.includes(busqueda) || nombreCell.includes(busqueda) || telefonoCell.includes(busqueda) || correoCell.includes(busqueda) || fechaCell.includes(busqueda) || horaCell.includes(busqueda);

            row.style.display = shouldShowRow ? 'table-row' : 'none';
        });
    });

    conseguirServicios();
    conseguirCitas();
</script>

<?php include("template/pie.php") ?>