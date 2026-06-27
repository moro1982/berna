    <main class="contacto-main">
        <div class="py-4">
            <h1 class="titulo-seccion container text-center text-warning fw-bold text-uppercase"> Contacto </h1>
            <p class="container text-center px-5 py-3 text-light"> Si estás listo para impulsar tu marca y destacar en el mercado, contactame. </p>
        </div>

        <!-- Alertas -->
        <div class="container mt-3">
            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        </div>

        <div class="container mt-3 pb-5">
            <form class="formulario" action="/contacto" method="POST">
                <legend> ¡Contactame Hoy Mismo! </legend>
                <?php include_once __DIR__ . '/../templates/form-contacto.php';  ?>
                <input type="submit" value="Enviar" class="boton-transparente contorno mb-4">
            </form>
        </div>
    </main>