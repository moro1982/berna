<main class="container d-flex flex-column text-center">
    <h1> Borrar Comentario </h1>
    <h2> ¿Realmente desea Borrar el Comentario realizado por "<?php echo $comentario->nickname; ?>"? </h2>
    <h3> Esta acción lo eliminará irreversiblemente del Artículo. </h3>

    <form action="/blog/confirmar-borrado" method="POST" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?php echo $comentario->id; ?>" >
        <input type="submit" value="Eliminar" class="boton-rojo">
    </form>

    <a href="/admin" class="boton-amarillo my-3"> Cancelar </a>

</main>