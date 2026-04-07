    <main>
        <div class="bg-black py-4">
            <h1 class="container text-center text-warning"> Contacto </h1>
            <p class="container text-center px-5 py-3 text-light"> Si estás listo para impulsar tu marca y destacar en el mercado, contactame. Estoy feliz por la oportunidad de colaborar con vos y ayudarte a alcanzar tus metas de branding.</p>
        </div>

        <!-- Alertas -->
        <div class="container mt-3">
            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        </div>

        <div class="container mt-3 mb-5">
            <form class="formulario" action="/contacto" method="POST">
                <legend> ¡Contactame Hoy Mismo! </legend>
                <?php include_once __DIR__ . '/../templates/form-contacto.php';  ?>
                <input type="submit" value="Enviar" class="boton-transparente contorno mb-4">
            </form>
        </div>
    </main>