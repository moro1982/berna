<main class="container">
    <h1 class="text-center">Recuperar Password</h1>
    
    <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
    
    <?php if ($error) return null; ?>
    <form class="container-fluid formulario mb-4" method="post">
        <legend> Coloca tu Nuevo Password a continuación </legend>
        <fieldset class="campos mt-3">
            <div class="campo">
                <label for="password">Password</label>
                <input 
                    class="register"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu Nuevo Password"
                />
            </div>
        </fieldset>
        <input type="submit" class="boton-verde mb-4" value="Guardar Nuevo Password">
    </form>
    
    <div class="acciones">
        <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
    </div>
    
</main>