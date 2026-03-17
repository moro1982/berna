<?php if ( isset($_SESSION['login']) ) : ?>
    <div class="barra">
        <h2> Hola <?php echo $nombre ?? ''; ?> !! </h2>
        <a href="/logout" class="boton-negro">Cerrar Sesión</a>
    </div>
<?php endif; ?>

<?php if ( isset($_SESSION['admin']) ) : ?>
    <div class="barra-servicios">
        <a class="boton-verde" href="/admin"> Ver Articulos </a>
        <a class="boton-verde" href="/blog/crear"> Nuevo Articulo </a>
    </div>
<?php endif; ?>