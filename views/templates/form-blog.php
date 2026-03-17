<fieldset class="container-fluid campos">
    <div class="campo">
        <label for="title"> Titulo </label>
        <input 
            class="register"
            type="text"
            id="title"
            placeholder="Titulo del Artículo"
            name="title"
            value="<?php echo sanitizar($post->title); ?>"
        />
    </div>
    
    <div class="campo">
        <label for="brief"> Resumen </label>
        <textarea 
            class="register"
            type="text"
            id="brief"
            placeholder="Breve Resumen"
            name="brief"
        ><?php echo sanitizar($post->brief); ?></textarea>
    </div>
    
    <div class="campo">
        <label for="content"> Contenido </label>
        <textarea 
            class="register"
            type="text"
            id="content"
            placeholder="Texto del Articulo"
            name="content"
        ><?php echo sanitizar($post->content); ?></textarea>
    </div>
    
    <div class="campo">
        <label for="image"> Imagen </label>
        <input 
            class="register"
            type="file"
            id="image"
            accept="image/jpeg, image/png"
            placeholder="Imagen del Articulo"
            name="image"
            value="<?php echo $post->image; ?>"
        />
    </div>
    <?php if($post->image): ?>
        <div class="d-flex flex-column align-items-center">
            <img src="/imagenes/<?php echo $post->image; ?>" class="imagen-small">
        </div>
    <?php endif; ?>
</fieldset>
