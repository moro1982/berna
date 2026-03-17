<main class="container d-flex flex-column text-center">
    <h1> Actualizar Servicio </h1>

    <?php
        include_once __DIR__ . '/../templates/barra.php';
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <legend> Modifica los valores del formulario </legend>
        <?php include_once __DIR__ . '/../templates/form-blog.php'; ?>
        <input type="submit" class="boton-verde mb-4" value="Guardar">
    </form>

    <a href="/admin" class="boton-amarillo my-3"> Volver </a>

</main>
