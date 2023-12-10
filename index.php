<?php include("template\cabecera.php") ?>

<?php

$Auth = new Auth();

$salones = $Auth->conseguirSalones();

## print_r($salones);

if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
} else {
    $userEmail = null;
}

$departamentos = [
    'Ahuachapán', 'Cabañas', 'Chalatenango', 'Cuscatlán', 'La Libertad', 'Morazán', 'La Paz', 'Santa Ana', 'San Miguel', 'San Salvador', 'San Vicente', 'Sonsonate', 'La Unión', 'Usulután'
];

$municipios = [
    ["Ahuachapán", "Apaneca", "Atiquizaya", "Concepción de Ataco", "El Refugio", "Guaymango", "Jujutla", "San Francisco Menéndez", "San Lorenzo", "San Pedro Puxtla", "Tacuba", "Turín"],
    ["Cinquera", "Dolores", "Guacotecti", "Ilobasco", "Jutiapa", "San Isidro", "Sensuntepeque", "Tejutepeque", "Victoria"],
    ["Agua Caliente", "Arcatao", "Azacualpa", "Chalatenango", "Citalá", "Comalapa", "Concepción Quezaltepeque", "Dulce Nombre de María", "El Carrizal", "El Paraíso", "La Laguna", "La Palma", "La Reina", "Las Flores", "Las Vueltas", "Nombre de Jesús", "Nueva Concepción", "Nueva Trinidad", "Ojos de Agua", "Potonico", "San Antonio de la Cruz", "San Antonio Los Ranchos", "San Fernando", "San Francisco Lempa", "San Francisco Morazán", "San Ignacio", "San Isidro Labrador", "San José Cancasque", "San José Las Flores", "San Luis del Carmen", "San Miguel de Mercedes", "San Rafael", "Santa Rita", "Tejutla"],
    ["Candelaria", "Cojutepeque", "El Carmen", "El Rosario", "Monte San Juan", "Oratorio de Concepción", "San Bartolomé Perulapía", "San Cristóbal", "San José Guayabal", "San Pedro Perulapán", "San Rafael Cedros", "San Ramón", "Santa Cruz Analquito", "Santa Cruz Michapa", "Suchitoto", "Tenancingo"],
    ["Antiguo Cuscatlán", "Chiltiupán", "Ciudad Arce", "Colón", "Comasagua", "Huizúcar", "Jayaque", "Jicalapa", "La Libertad", "Nuevo Cuscatlán", "Quezaltepeque", "San José Villanueva", "San Matías", "San Pablo Tacachico", "Talnique", "Tamanique", "Teotepeque", "Tepecoyo", "Zaragoza"],
    ["Arambala", "Cacaopera", "Chilanga", "Corinto", "Delicias de Concepción", "El Divisadero", "El Rosario", "Gualococti", "Guatajiagua", "Joateca", "Jocoaitique", "Jocoro", "Lolotique", "Meanguera", "Osicala", "Perquín", "San Carlos", "San Fernando", "San Francisco Gotera", "San Isidro", "San Simón", "Sensembra", "Sociedad", "Torola", "Yamabal", "Yoloaiquín"],
    ["Cuyultitán", "El Rosario", "Jerusalén", "Mercedes La Ceiba", "Olocuilta", "Paraíso de Osorio", "San Antonio Masahuat", "San Emigdio", "San Francisco Chinameca", "San Juan Nonualco", "San Juan Talpa", "San Juan Tepezontes", "San Luis Talpa", "San Luis La Herradura", "San Miguel Tepezontes", "San Pedro Masahuat", "San Pedro Nonualco", "San Rafael Obrajuelo", "Santa María Ostuma", "Santiago Nonualco", "Tapalhuaca", "Zacatecoluca"],
    ["Candelaria de la Frontera", "Chalchuapa", "Coatepeque", "El Congo", "El Porvenir", "Masahuat", "Metapán", "San Antonio Pajonal", "San Sebastián Salitrillo", "Santa Ana", "Santa Rosa Guachipilín", "Santiago de la Frontera", "Texistepeque"],
    ["Carolina", "Chapeltique", "Chinameca", "Chirilagua", "Ciudad Barrios", "Comacarán", "El Tránsito", "Lolotique", "Moncagua", "Nueva Guadalupe", "Nuevo Edén de San Juan", "Quelepa", "San Antonio", "San Gerardo", "San Jorge", "San Luis de la Reina", "San Miguel", "San Rafael Oriente", "Sesori", "Uluazapa"],
    ["Aguilares", "Apopa", "Ayutuxtepeque", "Cuscatancingo", "Delgado", "El Paisnal", "Guazapa", "Ilopango", "Mejicanos", "Nejapa", "Panchimalco", "Rosario de Mora", "San Marcos", "San Martín", "San Salvador", "Santiago Texacuangos", "Santo Tomás", "Soyapango", "Tonacatepeque"],
    ["Apastepeque", "Guadalupe", "San Cayetano Istepeque", "San Esteban Catarina", "San Ildefonso", "San Lorenzo", "San Sebastián", "San Vicente", "Santa Clara", "Santo Domingo", "Tecoluca", "Tepetitán", "Verapaz"],
    ["Acajutla", "Armenia", "Caluco", "Cuisnahuat", "Izalco", "Juayúa", "Nahuizalco", "Nahulingo", "Salcoatitán", "San Antonio del Monte", "San Julián", "Santa Catarina Masahuat", "Santa Isabel Ishuatán", "Santo Domingo de Guzmán", "Sonsonate", "Sonzacate"],
    ["Anamorós", "Bolívar", "Concepción de Oriente", "Conchagua", "El Carmen", "El Sauce", "Intipucá", "La Unión", "Lislique", "Meanguera del Golfo", "Nueva Esparta", "Pasaquina", "Polorós", "San Alejo", "San José", "Santa Rosa de Lima", "Yayantique", "Yucuaiquín"],
    ["Alegría", "Berlín", "California", "Concepción Batres", "El Triunfo", "Ereguayquín", "Estanzuelas", "Jiquilisco", "Jucuapa", "Jucuarán", "Mercedes Umaña", "Nueva Granada", "Ozatlán", "Puerto El Triunfo", "San Agustín", "San Buenaventura", "San Dionisio", "San Francisco Javier", "Santa Elena", "Santa María", "Santiago de María", "Tecapán", "Usulután"]
];

?>

<form class="d-flex" role="search" id="searchForm">

    <input class="form-control me-2" type="search" placeholder="Buscar salon" aria-label="Search" id="searchInput">
    <button class="btn btn-outline-success" type="submit"><em class="fa-solid fa-magnifying-glass"></em> buscar</button>
    <br>
</form>
<br>
<br>
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
<?php if (!count($salones) == 0) {
    foreach ($salones as $salon) : ?>
        <div class="col-md-3" data-search="<?php echo $salon['nombre'] ?>">
            <br>
            <div class="card">
                <img alt="logo" class="card-img-top" src="img/logos/<?php echo $salon['logos'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $salon['nombre'] ?></h5>
                    <em class="fa fa-star"></em>
                    <em class="fa fa-star"></em>
                    <em class="fa fa-star"></em>
                    <em class="fa fa-star"></em>
                    <em class="fa fa-star"></em>
                    <br>
                    <h2></h2>
                    <em style="float: left;" class="fa fa-location-dot">
                        <p style="color: black;">
                            <h7> <?php echo $departamentos[$salon['departamento']] ?>, <?php echo $municipios[$salon['departamento']][$salon['municipio']] ?></h7>
                        </p>
                    </em>
                    <br>
                    <h2></h2>
                    <a name="" id="<?php echo $salon['id'] ?>" class="btn btn-primary" href="Perfil_Salon.php?id=<?php echo $salon['id'] ?>" role="button">Visitar</a>
                </div>
            </div>
        </div>
<?php endforeach;
} ?>
<div class="col-12 d-none flex-column justify-content-center align-items-center" id="404">
    <img src="images/lupa.png" alt="No hay salones" class="p-2 pt-5" style="width: 6rem;">
    <div class="m-auto p-2 pb-5">El salon que buscas no existe</div>
</div>

<h2></h2>
<h2></h2>

<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let salonesEncontrados = false;

        const searchTerm = document.getElementById('searchInput').value.toLowerCase();

        const salonCards = document.querySelectorAll('[data-search]');

        salonCards.forEach(function(card) {
            const cardName = card.getAttribute('data-search').toLowerCase();
            if (cardName.includes(searchTerm)) {
                card.style.display = 'block';
                salonesEncontrados = true;
            } else {
                card.style.display = 'none';
            }

            const noSalonesDiv = document.getElementById('404');
            if (salonesEncontrados) {
                noSalonesDiv.classList.add('d-none');
                noSalonesDiv.classList.remove('d-flex');
            } else {
                noSalonesDiv.classList.remove('d-none');
                noSalonesDiv.classList.add('d-flex');
            }
        });
    });
</script>
<?php include("template\pie.php") ?>