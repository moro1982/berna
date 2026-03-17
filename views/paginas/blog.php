    <main>
        <!-- ENCABEZADO BLOG -->
        <div class="bg-black py-4">
            <h1 class="container text-center text-light"> Blog </h1>
            <p class="container text-center px-5 py-3 text-light">
                Exploremos el diseño con pasión y creatividad. Sumérgete en mi blog donde comparto insights, tendencias y proyectos que inspiran.
            </p>
            <!-- Buscador (con JS) -->
            <nav class="container w-75 navbar bg-body-tertiary">
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </span>
                    <input type="search" name="search" id="search" class="form-control" placeholder="Busque entrada por Título o Contenido">
                </div>
            </nav>  <!-- FIN Buscador JS -->
        </div>  <!-- FIN ENCABEZADO BLOG -->
        
        <!-- CUERPO DEL BLOG -->
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>
        
        <div class="blog mx-5">

            <!-- Barra de Errores -->
            <div class="errors-container" style="display:none;">
                <p></p>
            </div>

            <!-- ENTRADAS DEL BLOG -->
            <div class="posts" id="resultsContainer">
                <!-- Placeholder -->
                <div class="message-placeholder text-center my-5">
                    <p> Ingrese un término de búsqueda </p>
                </div>
                <!-- Artículos de Blog traídos con fetch() -->
            </div>


            <!-- BARRA VERTICAL DERECHA -->
            <aside class="sidebar my-3">
                <div class="populares-container">
                    <h3 class="titulo"> Posteos Populares </h3>
                    <div id="populares" class="populares">
                        <!-- Aqui insertamos miniaturas de los posts mas populares -->
                        <?php foreach ($populares as $post): ?>
                            <a href="/entrada?id=<?php echo $post->id; ?>">
                                <picture class="imagen-entrada">
                                    <source 
                                        srcset="/imagenes/<?php echo $post->image; ?>" 
                                        type="image/avif"
                                    >
                                    <source 
                                        srcset="/imagenes/<?php echo $post->image; ?>" 
                                        type="image/webp"
                                    >
                                    <img 
                                        height="100px"
                                        class="imagen-inner"
                                        loading="lazy"
                                        src="/imagenes/<?php echo $post->image; ?>"
                                        alt="Imagen Entrada Blog"
                                    >
                                </picture>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tags-container">
                    <h3 class="titulo"> Tags </h3>
                    <div class="tags">
                        <!-- Aqui insertamos enlaces con los nombres de las etiquetas -->
                        <?php foreach ($tags as $tag): ?>
                            <span 
                                class="badge rounded-pill text-bg-secondary tag"
                                onclick="fetchByTag('<?php echo $tag; ?>')"
                            >
                                <?php echo $tag; ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

        </div>  <!-- FIN BLOG -->
    </main>