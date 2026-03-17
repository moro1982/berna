<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berna</title>
    <!-- Bootstrap (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos -->
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <!-- Encabezado -->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="hero-overlay">
            <!-- Barra de navegacion -->
            <nav class="navbar navbar-dark navbar-expand-md p-0">
                <div class="container-fluid align-items-center">
                    <a class="navbar-brand p-0" href="/">
                        <img class="img-fluid" width="125px" src="/build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia.png" alt="Logo_Header">
                    </a>
                    <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-md-0 d-flex gap-1 gap-md-3 fs-4 fw-bold text-center">
                            <li class="nav-item">
                                <a id="home" class="nav-link text-uppercase" href="/"> Home </a>
                            </li>
                            <li class="nav-item">
                                <a id="portfolio" class="nav-link text-uppercase" href="/portfolio"> Portfolio </a>
                            </li>
                            <li class="nav-item">
                                <a id="blog" class="nav-link text-uppercase" href="/blog"> Blog </a>
                            </li>
                            <li class="nav-item">
                                <a id="login" class="nav-link text-uppercase bg-black" href="/login"> Login </a>
                            </li>
                            <li class="nav-item">
                                <a id="contacto" class="nav-link text-uppercase bg-black" href="/contacto"> Contacto </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php if($inicio): ?>
                <!-- BANNER o HERO PPAL  -->
                <section class="d-flex flex-column align-items-center">
                    <img class="img-fluid" width="325px" src="/build/img/Berna_Logo-tiza-Mesa_de_trabajo_1-copia_3.png" alt="Logo_Header">
                    <p class="container hero-text text-light"> 
                        El branding es más que un logo elegante; es la esencia que define tu identidad empresarial. Construye una conexión emocional 
                        <span id="display-hidden" onclick="mostrarTextoOculto()" class="activador"> ... << Leer más >></span> 
                        <span id="hidden-text" class="texto-oculto"> con tu audiencia, deja una impresión duradera y destaca en un mercado saturado. Con el branding adecuado, no solo vendes productos, ¡vendes una experiencia! ¡Haz que tu marca sea inolvidable y marca la diferencia en la mente de tus clientes! </span> 
                        <span id="hide-text" onclick="ocultarTexto()" class="activador texto-oculto"> ... << Ocultar Texto >> </span> 
                    </p>
                    <div class="d-flex justify-content-center w-75 w-md-50 mb-5">
                        <a href="/cuestionario" class="boton-blanco fs-4"> HACÉ TU PROPIO DIAGNÓSTICO </a>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </header>