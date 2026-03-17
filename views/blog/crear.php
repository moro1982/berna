<main class="container d-flex flex-column text-center">
    <h1> Nuevo Artículo </h1>
    
    <?php
        include_once __DIR__ . '/../templates/barra.php';
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    
    <form class="container formulario" method="POST" action="/blog/crear" enctype="multipart/form-data">
        <legend> Llena todos los campos para añadir un nuevo artículo </legend>
        <?php include_once __DIR__ . '/../templates/form-blog.php'; ?>
        <input type="submit" class="boton-verde mb-4" value="Guardar">
    </form>
    
    <a href="/admin" class="boton-amarillo my-3"> Volver </a>
</main>