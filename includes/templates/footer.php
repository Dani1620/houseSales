<?php

if (!isset($_SESSION)) {
    session_start();
}

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

$auth = $_SESSION['login'] ?? false;

// var_dump($auth);
?>

<footer class="footer">
    <div class="contenedor contenido-footer">
        <div class="barra">
            <a href="/houseSales/index.php">
                <h1 class="logo">House<span class="bold">Sales</span></h1>
            </a>

            <div class="mobile-menu">
                <img src="/houseSales/build/img/barras.svg" alt="icono menu responsive" />
            </div>

            <div class="derecha">
                <img
                    class="dark-mode-boton"
                    src="/houseSales/build/img/dark-mode.svg"
                    alt="boton dark mode" />

                <nav class="navegacion">
                    <!-- htmlentities: codifica las entidades html, y evita que un hacker 
                            intente agregar codigo malicioso al sitio web -->
                    <?php $page = htmlentities($_SERVER['PHP_SELF']); ?> <!--PHP_SELF: Muestra la ruta actual de un arhivo-->

                    <a href="/houseSales/nosotros.php" class="<?php echo $page === '/houseSales/nosotros.php' ? 'active' : ''; ?>">Nosotros</a>
                    <a href="/houseSales/anuncios.php" class="<?php echo $page === '/houseSales/anuncios.php' ? 'active' : ''; ?>">Propiedades</a>
                    <a href="/houseSales/blog.php" class="<?php echo $page === '/houseSales/blog.php' ? 'active' : ''; ?>">Blog</a>
                    <a href="/houseSales/contacto.php" class="<?php echo $page === '/houseSales/contacto.php' ? 'active' : ''; ?>">Contacto</a>

                    <?php if ($auth && $page !== '/houseSales/admin/index.php') : ?>
                        <a href="/houseSales/admin/index.php">Admin</a>
                    <?php endif; ?>

                    <?php if (!$auth && $page !== '/houseSales/login.php') : ?>
                        <a href="/houseSales/login.php">Login</a>
                    <?php endif; ?>

                    <?php if ($auth) : ?>
                        <a href="/houseSales/cerrar-sesion.php">Logout</a>
                    <?php endif; ?>
                </nav>
            </div>
            <!-- .derecha -->
        </div>
    </div>

    <p class="copyright">Todos los derechos reservados -> Grupo #1 CS-01 <?php echo date('Y') ?> &copy;</p>
</footer>

<script src="/houseSales/build/js/bundle.min.js"></script>
</body>

</html>