<?php include("template/cabecera.php") ?>
<?php
$Auth = new Auth();

if (isset($_GET['id'])) {
    $producto = $Auth->productoPorID($_GET['id']);
}

?>

<div class="main-wrapper">
    <div class="container">
        <div class="product-div">
            <div class="product-div-left">
                <div class="img-container">
                    <img src="img/productos/<?php echo $producto['imagen']; ?>" alt="watch">
                </div>
                <div class="hover-container">
                    <!-- <div><img src = "image/shoes_images/shoe_2.jpg"></div>
                    <div><img src = "image/shoes_images/shoe_3.jpg"></div>
                    <div><img src = "image/shoes_images/shoe_4.jpg"></div> -->

                </div>
            </div>
            <div class="product-div-right">
                <span class="product-name"><?php echo $producto['nombre']; ?></span>
                <span class="product-price">$ <?php echo $producto['precio']; ?></span>
                <span style="font-weight: 400; font-size: 20px; opacity: 0.9; " class="product-category"><?php echo $producto['proveedor']; ?>/<?php echo $producto['categoria1']; ?>/<?php echo $producto['categoria2']; ?></span>

                <p class="product-description"><?php echo $producto['descripcion']; ?></p>
                <span style="font-weight: 400; font-size: 20px; opacity: 0.9; "><em class="fa-solid fa-server"></em> Existencias: <?php echo $producto['existencias']; ?></span>
                <div class="btn-groups">
                    <form method="POST" id="save-form" style="float: left;" action="loginUsuario/servidor/registro/carrito.php">
                        <input type="hidden" id="product-id" name="product-id" value="<?php echo $producto['id']; ?>">
                        <button type="submit" class="add-cart-btn"><em class="fa fa-bookmark"></em> Guardar</button>
                    </form>
                    <button type="button" class="buy-now-btn"><em class="fas fa-wallet"></em>Solicitar</button>
                </div>
                <h2></h2>

                <div class="social-links">
                    <p style="color: black;">Compartir en: </p>
                    <h2></h2>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://wonderhairsv.test/wonderhairsv/detalle.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                        <em class="fab fa-facebook-f"></em>
                    </a>

                    <a href="#">
                        <em class="fab fa-instagram"></em>
                    </a>
                    <a href="https://wa.me/?text=¡Echa un vistazo a este increíble producto! <?php echo $producto['nombre']; ?> en http://wonderhairsv.test/wonderhairsv/detalle.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                        <em class="fab fa-whatsapp"></em>
                    </a>

                </div>
            </div>

        </div>

    </div>

</div>
<h2></h2>
<h2></h2>
<?php include("template/pie.php") ?>

<script src="script.js"></script>