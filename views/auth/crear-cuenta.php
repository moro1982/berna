<main class="container">
    <h1 class="text-center"> Crear Cuenta </h1>

    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form method="POST" action="/crear-cuenta" class="container-fluid formulario mb-4">
        <legend> Completa el siguiente Formulario para crear tu Cuenta </legend>
        <fieldset class="campos">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                    class="register"
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Tu nombre"
                    value="<?php echo sanitizar($usuario->nombre); ?>"
                />
            </div>
            <div class="campo">
                <label for="apellido">Apellido</label>
                <input 
                    class="register"
                    type="text"
                    id="apellido"
                    name="apellido"
                    placeholder="Tu apellido"
                    value="<?php echo sanitizar($usuario->apellido); ?>"
                />
            </div>
            <div class="campo">
                <label for="email">E-mail</label>
                <input 
                    class="register"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu E-mail"
                    value="<?php echo sanitizar($usuario->email); ?>"
                />
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input 
                    class="register"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu Password"
                />
            </div>
        </fieldset>

        <input type="submit" value="Crear Cuenta" class="boton-verde mb-4">

    </form>

    <div class="acciones">
        <a class="" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="" href="/olvide">¿Olvidaste tu Password?</a>
    </div>

</main>