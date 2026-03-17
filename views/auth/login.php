<main class="container">
    <h1 class="text-center">Iniciar Sesión</h1>

    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form method="POST" action="/login" class="container-fluid formulario mb-4">
        <legend>Email y Password</legend>
        <fieldset class="campos">
            <div class="campo">
                <label for="email">E-mail</label>
                <input
                 class="register"
                 type="email" 
                 name="email" 
                 placeholder="Tu Email" 
                 id="email"
                />
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input 
                    class="register" 
                    type="password" 
                    name="password" 
                    placeholder="Tu Contraseña" 
                    id="password"
                />
            </div>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-verde mb-4">
    </form>

    <div class="acciones">
        <a class="" href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
        <a class="" href="/olvide">¿Olvidaste tu Password?</a>
    </div>
    
</main>