<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

// var_dump($auth);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/houseSales/build/img/anuncio1.webp" type="image/x-icon" />
    <link rel="stylesheet" href="/houseSales/build/css/app.css" />
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="bg-color">

            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="/houseSales/index.php">
                        <h1 class="logo">House<span class="bold">Sales</span></h1>
                    </a>

                    <div class="mobile-menu">
                        <img src="/houseSales/build/img/barras.svg" alt="icono menu responsive" />
                    </div>

                    <div class="derecha">
                        <img class="dark-mode-boton" src="/houseSales/build/img/dark-mode.svg" alt="icono para dark mode" />

                        <nav class="navegacion">
                            <!-- htmlentities: codifica las entidades html, y evita que un hacker 
                            intente agregar codigo malicioso al sitio web -->
                            <?php $page = htmlentities($_SERVER['PHP_SELF']); ?> <!--PHP_SELF: Muestra la ruta actual de un arhivo-->

                            <a href="/houseSales/nosotros.php" class="<?php echo $page === '/houseSales/nosotros.php' ? 'active' : ''; ?>">Nosotros</a>
                            <a href="/houseSales/anuncios.php" class="<?php echo $page === '/houseSales/anuncios.php' ? 'active' : ''; ?>">Propiedades</a>
                            <a href="/houseSales/blog.php" class="<?php echo $page === '/houseSales/blog.php' ? 'active' : ''; ?>">Blog</a>
                            <a href="/houseSales/contacto.php" class="<?php echo $page === '/houseSales/contacto.php' ? 'active' : ''; ?>">Contacto</a>

                            <?php if (!$auth && $page != '/houseSales/login.php') : ?>
                                <a href="/houseSales/login.php">Login</a>
                            <?php endif; ?>

                            <?php if ($auth && $page != '/houseSales/admin/index.php') : ?>
                                <a href="/houseSales/admin/index.php">Admin</a>
                            <?php endif; ?>

                            <?php if ($auth) : ?>
                                <a href="/houseSales/cerrar-sesion.php">Logout</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
                <!--.barra-->

                <?php echo $inicio ? '<h2>Here you can Get your Ideal Dream House</h2>' : '' ?>
            </div>
            <!-- .bg-color -->
        </div>
        <!--.contenido-header-->
    </header>