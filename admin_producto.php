<?php include("template\cabecera.php") ?>
<?php include("template\perfil.php") ?>
<style>
    .boton-modal label {
        padding: 10px 15px;
        background-color: #5488a3;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 300ms ease;
    }

    .boton-modal label:hover {
        background-color: #18E583;
    }

    #btn-modal {
        display: none;
    }

    .contenedor-modal {
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(144, 148, 150, 0.8);
        display: none;

        align-items: center;
        z-index: 100;
    }

    #btn-modal:checked~.contenedor-modal {
        display: flex;
    }

    .contenedor-modal .content-modal {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        background-color: #fff;
        border-radius: 4px;
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
<h2></h2>
<h2></h2>
<!--Boton naval-->

<?php
if (isset($_GET['id'])) {
    if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id']) {
?>
        <div class="boton-modal">
            <label for="btn-modal">
                <em class="fa-solid fa-plus"></em> Agregar productos
            </label>
        </div>
<?php
    }
}
?>
<!--fin del boton-->
<!--ventananaval-->
<input type="checkbox" id="btn-modal">
<div class="contenedor-modal">
    <div style="border-radius:30px;" class="content-modal">
        <div class="card">
            <div class="card-header">
                Datos de productos
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" data-action="insert" id="product-form">
                    <div style="display:none;" class="form-group">
                        <label for="txtID">ID:</label>
                        <input disabled type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                    </div>

                    <div class="form-group">
                        <label for="txtNombre">Nombre:</label>
                        <input required type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
                    </div>

                    <div class="form-group">
                        <label for="txtDescripcion">Descripcion:</label>
                        <input required type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion del producto">
                    </div>
                    <div class="form-group">
                        <label for="txtproveedor">Nombre del proveedor:</label>
                        <input required type="text" class="form-control" name="txtproveedor" id="txtproveedor" placeholder="proveedor">
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <label for="categoria1">Seleccione la categoria:</label>
                    </div>
                    <div class="d-flex justify-content-evenly align-items-center">
                        <div class="form-group " style="flex-basis: 45%">
                            <select style="padding:2px 1px 2px 5px; border-radius: 5px; color:grey;" class="col-12 spacign-2" name="categoria1" id="categoria1" required>
                                <option value="">Categoria</option>
                                <option value="Accesorios">Accesorios</option>
                                <option value="Cabello">Cabello</option>
                                <option value="Herramientas">Herramientas</option>
                                <option value="Manos y pies">Manos y pies</option>
                                <option value="Piel">Piel</option>
                                <option value="Maquillaje">Maquillaje</option>
                                <option value="Fragancias">Fragancias</option>
                            </select>
                        </div>
                        <div class="align-self-center text-center" style="flex-basis:10%">/</div>
                        <div class="form-group" style="flex-basis: 45%">
                            <select style="padding:2px 1px 2px 5px; border-radius: 5px; color:grey;" class="col-12" name="categoria2" id="categoria2" required disabled>
                                <option value="">Categoria</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly align-items-center">
                        <div class="form-group " style="flex-basis: 50%">
                            <div style="margin-right:10px;" class="form-group">
                                <label for="txtexistencias">Existencias del producto:</label>
                                <input required type="number" class="form-control" name="txtexistencias" id="txtexistencias" placeholder="Existencias">
                            </div>
                        </div>
                        <div class="form-group" style="flex-basis: 50%">
                            <div class="form-group">
                                <label for="txtfecha">Fecha de publicacion</label>
                                <input required type="date" class="form-control" name="txtfecha" id="txtfecha">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="txtPrecio">Precio:</label>
                        <input required type="text" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio del producto">
                    </div>

                    <div class="form-group">
                        <label for="txtimagen">Imagen o foto del producto:</label>
                        <input required type="file" class="form-control" name="txtimagen" id="txtimagen" placeholder="">
                    </div>

                    <div style="margin-top: 10px;" class="btn-group" role="group" aria-label="">
                        <button style="margin-right: 15px;" type="submit" name="accion" value="Agregar" id="btnAgregar" class="btn btn-success">Agregar</button>
                        <button disabled style="margin-right: 15px;" type="submit" name="accion" value="Modificar" id="btnActualizar" class="btn btn-warning">Modificar</button>
                        <button type="button" name="accion" value="Cancelar" id="btnLimpiar" class="btn btn-info">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="btn-cerrar">
            <label for="btn-modal">cerrar</label>
        </div>
    </div>
    <div style="border: none; background: white; height: 550px; max-height: 550px; overflow: auto; width: 700px; margin-left: 10px; margin-top: 20px;" class="card col-sm-5 p-3">
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
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" style="width: 14rem; display: block;">Proveedor | Categoria</th>
                    <th scope="col">Existencias</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<!--fin de ventana naval-->
<form class="d-flex" role="search" id="searchForm">
    <input class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search" id="buscar" name="buscar">
    <button id="btnbuscar" class="btn btn-outline-success" type="button"><em class="fa-solid fa-magnifying-glass"></em> buscar</button>
    <br>
</form>
<style>
    .card-img-top {
        border-radius: 50px;
        padding: 20px;
        height: 250px;
        width: 250px;
    }

    .card {
        border-radius: 30px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
    }
</style>
<h2></h2>
<div id="product-cards-container" class="row"></div>



<script>
    const form = document.getElementById('product-form');
    const btnAgregar = document.getElementById('btnAgregar');
    const btnActualizar = document.getElementById('btnActualizar');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const txtBuscar = document.getElementById('txtBuscar');
    const cbxCategoria1 = document.getElementById('categoria1');
    const cbxCategoria2 = document.getElementById('categoria2');
    let action = 'insert';
    let formulario = {
        id: document.getElementById('txtID').value,
        nombre: document.getElementById('txtNombre').value,
        descripcion: document.getElementById('txtDescripcion').value,
        precio: document.getElementById('txtPrecio').value,
        categoria1: document.getElementById('categoria1').value,
        categoria2: document.getElementById('categoria2').value,
        existencia: document.getElementById('txtexistencias').value,
        fecha: document.getElementById('txtfecha').value,
        imagen: null
    };
    let subCategorias = {
        "Accesorios": [
            "Manicure Y Pedicure",
            "Sacapuntas",
            "Repujador Facial",
            "Bowl Para Manicure",
            "Bowl Para Tine",
            "Medidor",
            "Decoración Para Uñas",
            "Capa Para Tinte",
            "Pincel Para Acrílico",
            "Pinza Para Pestañas",
            "Equipo",
            "Espejos",
            "Tijeras",
            "Corta Tips",
            "Afeitadoras",
            "Peines",
            "Capa Para Corte",
            "Gorro Para Mechas",
            "Brochas De Maquillaje"
        ],
        "Cabello": [
            "Shampoo",
            "Acondicionador",
            "Terminación",
            "Tintes",
            "Peroxidos",
            "Tratamiento",
            "Ampolletas",
            "Kit",
            "Duo Shampoo Más Acondicionador",
            "Cepillos",
            "Decolorantes",
            "Proteínas",
            "Protector Térmico",
            "Crema Para Peinar",
            "Alisado",
            "Tínico de Caídas",
            "Peine de Carbon",
            "Bálsamo",
            "Pasta"
        ],
        "Herramientas": [
            "Planchas",
            "Secadoras",
            "Maquina De Corte",
            "Maquina Para Perfilar",
            "Afeitadoras",
            "Tijeras",
            "Kit Secadora y Plancha",
            "Tenazas",
            "Tinas Para Pies",
            "Cepillo Secador"
        ],
        "Manos y pies": [
            "Acetona",
            "Gel Constuctor",
            "Exfoliantes",
            "Acrílico",
            "Esmalte Permanente",
            "Esmalte Normal",
            "Mascarillas",
            "Crema De Manos",
            "Kit",
            "Sal De Baño",
            "Parafina",
            "Crema Para Pies",
            "Tina Para Pies"
        ],
        "Piel": [
            "Ceras Depilatorias",
            "Ceras Depilatorias y Equipo",
            "Ceras Depilatorias Kit",
            "Jabones",
            "Tratamiento Facial",
            "Desodorante",
            "Crema Corporal",
            "Protector Solar",
            "Bronceador",
            "Crema Depilatoria",
            "Barba"
        ],
        "Equipo Salon": [
            "Lampara de Uñas",
            "Lampara De Barbería",
            "Sillas Hidraulicas",
            "Lavacabezas",
            "Auxiliares",
            "Dremel Para Uñas",
            "Soporte Para Secadora"
        ],
        "Maquillaje": [
            "Lámpara De Maquillaje",
            "Pestañas"
        ],
        "Fragancias": [
            "SPLASH",
            "Fragancia Para Caballeros",
            "Fragancia Para Damas"
        ],
        "Cuidado de bebé": [
            "Shampoo Para Bebé",
            "Colonia Para Bebé",
            "Terminación Para Bebé",
            "Jabón Para Bebé"
        ]
    };

    cbxCategoria1.addEventListener('change', (e) => {
        if (subCategorias[e.target.value]) {
            cbxCategoria2.innerHTML = "";
            var opcionDefault = document.createElement("option");
            opcionDefault.text = "Categoria";
            opcionDefault.value = "";
            cbxCategoria2.add(opcionDefault);
            subCategorias[e.target.value].forEach((item) => {
                var opt = document.createElement("option");
                opt.text = item;
                opt.value = item;
                cbxCategoria2.add(opt);
            });
            cbxCategoria2.disabled = false;
        } else {
            cbxCategoria2.disabled = true;
            cbxCategoria2.innerHTML = "";
            var opcionDefault = document.createElement("option");
            opcionDefault.text = "Categoria";
            opcionDefault.value = "";
            cbxCategoria2.add(opcionDefault);
        }

    });

    document.getElementById('txtimagen').onchange = function(e) {
        let reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function() {
            formulario.imagen = reader.result;
            if (action == 'update') {
                formulario.nuevaImagen = true;
            }
        }
    }

    function imprimirProductosTabla(products) {
        const tableBody = document.querySelector('#product-table tbody');
        tableBody.innerHTML = '';

        products.forEach(product => {
            const row = document.createElement('tr');

            const idCell = document.createElement('td');
            idCell.textContent = product.id;
            row.appendChild(idCell);

            const nombreCell = document.createElement('td');
            nombreCell.textContent = product.nombre;
            row.appendChild(nombreCell);

            const descripcionCell = document.createElement('td');
            descripcionCell.textContent = product.descripcion;
            row.appendChild(descripcionCell);

            const proveedorCell = document.createElement('td');
            proveedorCell.textContent = `${product.proveedor} / ${product.categoria1} / ${product.categoria2}`;
            row.appendChild(proveedorCell);

            const exixtenciasCell = document.createElement('td');
            exixtenciasCell.textContent = product.existencias;
            row.appendChild(exixtenciasCell);

            const precioCell = document.createElement('td');
            precioCell.textContent = `$${product.precio}`;
            row.appendChild(precioCell);

            const imagenCell = document.createElement('td');
            const imagen = document.createElement('img');
            imagen.src = `img/productos/${product.imagen}`;
            imagen.alt = 'Product Image';
            imagen.style.width = '100px';
            imagen.style.height = '100px';
            imagenCell.appendChild(imagen);
            row.appendChild(imagenCell);
            tableBody.appendChild(row);

            const accionesCell = document.createElement('td');
            const btnSeleccionar = document.createElement('button');
            btnSeleccionar.classList.add('btn', 'btn-warning');
            btnSeleccionar.textContent = 'Seleccionar';
            btnSeleccionar.addEventListener('click', () => {
                seleccionarProducto(product);
            });
            accionesCell.appendChild(btnSeleccionar);

            const btnEliminar = document.createElement('button');
            btnEliminar.classList.add('btn', 'btn-danger');
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.addEventListener('click', () => {
                eliminarProducto(product);
            });
            accionesCell.appendChild(btnEliminar);

            row.appendChild(accionesCell);
        });
    }

    function seleccionarProducto(product) {
        console.log(product);
        action = 'update';

        formulario = {
            id: product.id,
            nombre: product.nombre,
            descripcion: product.descripcion,
            proveedor: product.proveedor,
            categoria1: product.categoria1,
            categoria2: product.categoria2,
            existencias: product.existencias,
            fecha: product.creacion,
            precio: product.precio,
            imagenActual: product.imagen,
            imagen: null,
            nuevaImagen: false,
        };

        document.getElementById('txtID').value = product.id;
        document.getElementById('txtNombre').value = product.nombre;
        document.getElementById('txtDescripcion').value = product.descripcion;
        document.getElementById('txtproveedor').value = product.proveedor;
        document.getElementById('categoria1').value = product.categoria1;
        cbxCategoria2.innerHTML = "";
        var opcionDefault = document.createElement("option");
        opcionDefault.text = "Categoria";
        opcionDefault.value = "";
        cbxCategoria2.add(opcionDefault);
        subCategorias[product.categoria1].forEach((item) => {
            var opt = document.createElement("option");
            opt.text = item;
            opt.value = item;
            cbxCategoria2.add(opt);
        });
        document.getElementById('categoria2').value = product.categoria2;
        document.getElementById('txtexistencias').value = product.existencias;
        document.getElementById('txtfecha').value = product.creacion;
        document.getElementById('txtfecha').disabled = true;
        document.getElementById('txtPrecio').value = product.precio;
        document.getElementById('txtimagen').required = false;

        btnAgregar.disabled = true;
        btnActualizar.disabled = false;
    }

    function eliminarProducto(product) {
        if (window.confirm("Quieres eliminar " + product.nombre + " de la lista de productos?")) {
            formulario = {
                id: product.id
            }
            fetch("loginUsuario/servidor/registro/eliminarProducto.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formulario),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        actualizarListas();
                        resetForm();
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

    function imprimirProductosCard(products) {
        const container = document.getElementById('product-cards-container');
        container.innerHTML = '';

        products.forEach(product => {
            const cardDiv = document.createElement('div');
            cardDiv.className = 'col-md-3 producto';

            cardDiv.innerHTML = `
                <div class="card">
                    <img src="img/productos/${product.imagen}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">${product.nombre}</h5>
                        <p style="font-weight: 600; font-size: 15px" class="card-text text-black">${product.proveedor}/${product.categoria1}/${product.categoria2}</p>
                        <p class="card-text text-black">Precio: $${product.precio}</p>
                        <a href="detalle.php?id=${product.id}" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            `;

            container.appendChild(cardDiv);
        });
    }

    function resetForm() {
        action = 'insert';
        form.reset();

        formulario = {
            id: document.getElementById('txtID').value,
            nombre: document.getElementById('txtNombre').value,
            descripcion: document.getElementById('txtDescripcion').value,
            categoria1: document.getElementById('categoria1').value,
            categoria2: document.getElementById('categoria2').value,
            existencias: document.getElementById('txtexistencias').value,
            fecha: document.getElementById('txtfecha').value,
            precio: document.getElementById('txtPrecio').value,
            imagen: null
        };
        document.getElementById('txtimagen').required = true;
        document.getElementById('txtfecha').disabled = false;

        btnAgregar.disabled = false;
        btnActualizar.disabled = true;
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        console.log(action);

        if (action == 'insert') {
            formulario = {
                id: document.getElementById('txtID').value,
                nombre: document.getElementById('txtNombre').value,
                descripcion: document.getElementById('txtDescripcion').value,
                proveedor: document.getElementById('txtproveedor').value,
                categoria1: document.getElementById('categoria1').value,
                categoria2: document.getElementById('categoria2').value,
                existencias: document.getElementById('txtexistencias').value,
                fecha: document.getElementById('txtfecha').value,
                precio: document.getElementById('txtPrecio').value,
                imagen: formulario.imagen,
            };
        } else {
            formulario.id = document.getElementById('txtID').value;
            formulario.nombre = document.getElementById('txtNombre').value;
            formulario.descripcion = document.getElementById('txtDescripcion').value;
            formulario.proveedor = document.getElementById('txtproveedor').value;
            formulario.categoria1 = document.getElementById('categoria1').value;
            formulario.categoria2 = document.getElementById('categoria2').value;
            formulario.existencias = document.getElementById('txtexistencias').value;
            formulario.fecha = document.getElementById('txtfecha').value;
            formulario.precio = document.getElementById('txtPrecio').value;
        }

        if (action == 'insert') {
            fetch("loginUsuario/servidor/registro/registrarProducto.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formulario),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        actualizarListas();
                        resetForm();
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        } else if (action == 'update') {
            fetch("loginUsuario/servidor/registro/actualizarProducto.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formulario),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        actualizarListas();
                        resetForm();
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });

    btnLimpiar.addEventListener("click", (e) => {
        resetForm();
    });

    function actualizarListas() {
        fetch("loginUsuario/servidor/productos.php?id=<?php echo $_GET['id'] ?>", {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.info) {
                        imprimirProductosTabla(data.info);
                        imprimirProductosCard(data.info);
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    txtBuscar.addEventListener('input', () => {
        const searchTerm = txtBuscar.value.toLowerCase().trim();
        const rows = document.querySelectorAll('#product-table tbody tr');

        rows.forEach(row => {
            const idCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const nameCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const descriptionCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const priceCell = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const shouldShowRow = idCell.includes(searchTerm) || nameCell.includes(searchTerm) || descriptionCell.includes(searchTerm) || priceCell.includes(searchTerm);

            row.style.display = shouldShowRow ? 'table-row' : 'none';
        });
    });

    const buscar = document.getElementById('buscar');
    const btnBuscar = document.getElementById('btnbuscar');

    btnBuscar.addEventListener('click', () => {
        const busqueda = buscar.value.toLowerCase().trim();
        buscarProductos(busqueda);
    });

    function buscarProductos(busqueda) {
        const cards = document.querySelectorAll('.producto');

        cards.forEach(card => {
            console.log(card);
            const nombreProducto = card.querySelector('.card-title').textContent.toLowerCase();
            const proveedorCategoria = card.querySelector('.card-text.text-black').textContent.toLowerCase();

            const shouldShowCard = nombreProducto.includes(busqueda) || proveedorCategoria.includes(busqueda);

            card.style.display = shouldShowCard ? 'block' : 'none';
        });
    }

    actualizarListas();
</script>
<?php include("template\pie.php") ?>