    <main class="container my-4">

        <?php if ($resultado):
            $mensaje = mostrarNotificacion( intval($resultado) );
            if ($mensaje) : ?>
                <p class="alerta exito"><?php echo sanitizar($mensaje) ?></p>
            <?php endif;
            endif;
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

        <!-- ARTICULO de BLOG -->
        
        <!-- ENCABEZADO -->
        <div class="container mb-5">
            <h1 class="py-5 fw-bold text-center"> <?php echo $post->title; ?> </h1>
            <p class="info-meta text-center fs-2">
                Escrito por: <span> Berna </span> 
            </p>
        </div>

        <!-- Texto -->
        <div class="container contenido">
            <p class="brief"> <?php echo $post->brief; ?> </p>
            <!-- Imagen -->
            <picture class="imagen-blog mb-4">
                <source srcset="/imagenes/<?php echo $post->image; ?>" type="image/avif">
                <source srcset="/imagenes/<?php echo $post->image; ?>" type="image/webp">
                <img class="imagen-large" loading="lazy" src="/imagenes/<?php echo $post->image; ?>" alt="Imagen Entrada Blog">
            </picture>
            <div></div>
            <!-- Contenido del post -->
            <p class="texto"> <?php echo nl2br($post->content); ?> </p>
            <div></div>
            <!-- Likes -->
            <div class="likes">
                <p> <?php echo $nroLikes; ?> </p>
                <form action="/entrada/like" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                    <button type="submit" class="boton-negro">❤️ Me Gusta</button>
                </form>
            </div>
        </div>
        <!-- FIN ARTICULO -->
        
        <!-- COMENTARIOS -->
        <div class="container-fluid comentarios"> 
            <h2> Comentarios </h2>
            <!-- Aqui debe renderizarse la seccion de comentarios -->
            <?php if (!empty($comentarios)): ?>
                <?php foreach ($comentarios as $comentario): ?>
                    <div class="d-flex justify-content-between">
                        <div class="comentario">
                            <h4> Comentario de: <span><?php echo $comentario->nickname; ?></span> </h4>
                            <p> <?php echo $comentario->comment; ?> </p>
                        </div>
                        <!-- El boton 'Borrar Comentario' solo aparece si hay admin -->
                        <?php if ( isset($_SESSION['admin']) ): ?>
                            <a class="boton-rojo" href="/blog/borrar-comentario?id=<?php echo $comentario->id; ?>"> Borrar Comentario </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="fst-italic text-center"> 
                    Este artículo aún no tiene comentarios. ¡Queremos conocer tu opinión!
                </p>
            <?php endif;?>

            <!-- El formulario solo aparece si hay login -->
            <?php if ( isset($_SESSION['login']) ): ?>
                <form method="post" action="/entrada?id=<?php echo $post->id; ?>">
                    <legend> Escriba su comentario aqui: </legend>
                    <textarea type="text" id="comment" name="comment" class="comment-area"></textarea>
                    <input type="submit" value="Comentar" class="boton-verde mb-3">
                </form>
            <?php else: ?>
                <div class="py-3 fst-italic text-center">
                    <p>Para contribuir al debate en los comentarios, <a href="/login">ingresa con tu usuario.</a></p>
                    <p>Si aún no tienes una cuenta, <a href="/crear-cuenta">¡regístrate aquí!</a> </p>
                </div>
            <?php endif; ?>
        </div>
        <!-- FIN COMENTARIOS -->
        
    </main>