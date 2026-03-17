<main class="container d-flex flex-column text-center">
    <h1> Eliminar Artículo </h1>
    <h2> ¿Realmente desea Eliminar el Artículo "<?php echo $post->title; ?>"? </h2>
    <h3> Esta acción lo eliminará irreversiblemente del Blog. </h3>

    <form action="/blog/confirmar-eliminado" method="POST" class="d-flex justify-content-center">
        <input type="hidden" name="id" value="<?php echo $post->id; ?>" >
        <input type="submit" value="Eliminar" class="boton-rojo">
    </form>

    <a href="/admin" class="boton-amarillo my-3"> Cancelar </a>

</main>