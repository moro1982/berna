<main class="container">
    <h1 class="text-center"> Olvidé el Password </h1>

    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form class="container-fluid formulario mb-4" method="POST" action="/olvide">
        <legend> Reestablece tu Password escribiendo tu E-mail a continuación </legend>
        <fieldset class="campos mt-3">
            <div class="campo">
                <label for="email">E-mail</label>
                <input 
                    class="register"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu E-mail"        
                />
            </div>
        </fieldset>

        <input type="submit" class="boton-verde mb-4" value="Enviar Instrucciones">

    </form>

    <div class="acciones">
        <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
    </div>

</main>