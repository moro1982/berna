<main>
    <?php if ($resultado):
        $mensaje = mostrarNotificacion( intval($resultado) );
        if ($mensaje) : ?>
            <p class="alerta exito container mt-4 "><?php echo sanitizar($mensaje) ?></p>
            <?php endif;
    endif; ?>
    
    <div class="container encabezado border-bottom">
        <h1>Administrador de Berna Blog</h1>
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>
    </div>
    
    <div class="container admin-contenedor">
        <h2 class="text-center my-4"> Posts </h2>
        <!-- AQUI se deben renderizar los datos de los posts (para actualizar y eliminar) -->
        <?php foreach ($posts as $post):?>
            <div class="admin-articulo">
                <!-- Imagen -->
                <div class="marco-imagen">
                    <a href="/entrada?id=<?php echo $post->id; ?>">
                        <picture class="imagen-entrada">
                            <source srcset="/imagenes/<?php echo $post->image; ?>" type="image/avif">
                            <source srcset="/imagenes/<?php echo $post->image; ?>" type="image/webp">
                            <img height="200px" class="imagen-inner" loading="lazy" src="/imagenes/<?php echo $post->image; ?>" alt="Imagen Entrada Blog">
                        </picture>
                    </a>
                </div> <!-- FIN Imagen -->
                <!-- Texto -->
                <div class="texto-blog">
                    <a href="/entrada?id=<?php echo $post->id; ?>">
                        <h3> <?php echo $post->title; ?> </h3>
                        <p class="info-meta">Escrito el: <span> <?php echo $post->created_at; ?> </span> por: <span> Admin </span> </p>
                    </a>
                </div> <!-- FIN Texto -->
                <!-- Botones -->
                <div class="acciones">
                    <a class="boton-amarillo" href="/blog/actualizar?id=<?php echo $post->id; ?>"> Editar </a>
                    <a class="boton-rojo" href="/blog/eliminar-post?id=<?php echo $post->id; ?>"> Eliminar </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>