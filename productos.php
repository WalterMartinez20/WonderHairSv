<?php include("template/cabecera.php") ?>
<?php
$Auth = new Auth();

if (isset($_GET['buscar'])) {
    $productos = $Auth->conseguirProductos($_GET['buscar']);
} else {
    $productos = $Auth->conseguirProductos(null);
}

$masBuscados = $Auth->masBuscados();
$masRelevantes = $Auth->masRelevantes();
?>

<form class="d-flex" role="search" id="searchForm">

    <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar producto" aria-label="Search" id="searchInput">
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

    header {
        width: 98%;
        height: 60px;
        margin: 0 auto;

        display: flex;
        align-items: center;
        padding: 20px;
        justify-content: space-between;
        border-bottom: 2px solid #ddd;
    }

    .wrapper {
        position: relative;
    }

    .wrapper .carousel {
        grid-auto-flow: column;
        grid-auto-colums: cal((100% / 4) - 12px);
        transform: translateX(-20px);
        overflow: hidden;
    }

    ul {
        display: flex;

    }

    .wrapper em,
    .glide__arrows button em {
        height: 50px;
        width: 50px;
        background: #fff;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        top: 50%;
        font-size: 1.25rem;
        transform: translateY(-50%);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .wrapper em:first-child {
        left: -22px;
    }

    .wrapper em:last-child {
        right: -22px;
    }

    .glide__arrows {
        width: 95%;
        position: relative;
        display: flex;
        bottom: 50%;
        justify-content: space-between;
        align-items: center;
    }

    /* .glide__slides {
        width: 5453px !important;
    } */
    .card-title {
        font-size: 15px;
    }

    @media screen and (max-width: 900px) {

        .wrapper .carusel {
            grid-auto-colums: cal((100% / 2) - 9px);
        }

    }

    @media screen and (max-width: 600px) {

        .wrapper .carusel {
            grid-auto-colums: 100%;
        }

    }

    .card {
        text-decoration: none;
    }
</style>
<header id="HE">
    <h1>Lo mas destacado</h1>
</header>
<div class="row col-12 m-2" style="overflow: hidden;">
    <div class="glide__2">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ($masRelevantes as $producto) { ?>
                    <li class="glide__slide">
                        <a class="card" href="detalle.php?id=<?php echo $producto['id']; ?>">
                            <img src="img/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p style="font-weight: 600; font-size: 15px" class="card-text text-black"><?php echo $producto['proveedor']; ?>/<?php echo $producto['categoria1']; ?>/<?php echo $producto['categoria2']; ?></p>
                                <p style="font-weight: 500;" class="card-text text-black">Precio: $<?php echo $producto['precio']; ?></p>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button data-glide-dir="<"><em class="fa-solid fa-angle-left"></em></button>
            <button data-glide-dir=">"><em class="fa-solid fa-angle-right"></em></button>
        </div>
    </div>
</div>
<header id="HE">
    <h1>Lo mas buscado</h1>
</header>
<div class="row col-12 m-2" style="overflow: hidden;">
    <?php if (empty($masBuscados)) { ?>
        <p style="color: black;">No hay productos buscados recientes</p>

        <div class="glide" style="display: none !important">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                    </li>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($masBuscados as $producto) { ?>
                        <li class="glide__slide">
                            <a class="card" href="detalle.php?id=<?php echo $producto['id']; ?>">
                                <img src="img/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                    <p style="font-weight: 600; font-size: 15px" class="card-text text-black"><?php echo $producto['proveedor']; ?>/<?php echo $producto['categoria1']; ?>/<?php echo $producto['categoria2']; ?></p>
                                    <p style="font-weight: 500;" class="card-text text-black">Precio: $<?php echo $producto['precio']; ?></p>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button data-glide-dir="<"><em class="fa-solid fa-angle-left"></em></button>
                <button data-glide-dir=">"><em class="fa-solid fa-angle-right"></em></button>
            </div>
        </div>
    <?php } ?>
</div>
<header id="HE">
    <h1>Todos</h1>
</header>

<div class="row">
    <?php foreach ($productos as $producto) { ?>
        <div style="margin-top: 10px;" class="col-md-3">
            <a class="card" href="detalle.php?id=<?php echo $producto['id']; ?>">
                <img src="img/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                    <p style="font-weight: 600; font-size: 15px" class="card-text text-black"><?php echo $producto['proveedor']; ?>/<?php echo $producto['categoria1']; ?>/<?php echo $producto['categoria2']; ?></p>
                    <p style="font-weight: 500;" class="card-text text-black">Precio: $<?php echo $producto['precio']; ?></p>
                </div>
            </a>
        </div>
    <?php } ?>
</div>


<h2></h2>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    new Glide('.glide__2', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        perTouch: 3,
    }).mount();

    <?php if (empty($masBuscados)) { ?>

        new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            perView: 1,
            perTouch: 0,
        }).mount();

    <?php } else { ?>

        new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            perView: 4,
            perTouch: 3,
        }).mount();

    <?php } ?>
</script>
<?php include("template/pie.php") ?>