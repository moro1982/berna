<?php

namespace Class;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    private $email;
    private $nombre;
    private $token;

    public function __construct($email = '', $nombre = '', $token = '')
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear objeto email (instancia de PHPMailer)
        $mail = new PHPMailer();

        // Configuración del servidor de email
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@berna.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        
        // Creamos el contenido del cuerpo del email
        $contenido = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "!!! </strong> Has creado tu cuenta en Berna. Sólo debes confirmarla siguiendo el siguiente enlace: </p>";
        $contenido .= "<p> Presiona aquí -> <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'> Confirmar Cuenta </a> </p>";
        $contenido .= "<p> Si no solicitaste crear una cuenta, puedes desestimar el mensaje. </p>";
        $contenido .= "</html>";

        // Agregamos el contenido al cuerpo del email
        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear objeto email (instancia de PHPMailer)
        $mail = new PHPMailer();

        // Configuración del servidor de email
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@berna.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu Password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        
        // Creamos el contenido del cuerpo del email
        $contenido = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "!!! </strong> Has solicitado reestablecer tu Password. Entra al siguiente enlace para hacerlo: </p>";
        $contenido .= "<p> Presiona aquí -> <a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'> Reestablecer Password </a> </p>";
        $contenido .= "<p> Si no solicitaste crear una cuenta, puedes desestimar el mensaje. </p>";
        $contenido .= "</html>";

        // Agregamos el contenido al cuerpo del email
        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarDatosContacto($datos = []) {

        $formulario = $datos;

        //-> Crear nueva instancia de PHPMailer
        $mail = new PHPMailer();

        //-> Configurar protocolo SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';

        //-> Configurar el encabezado del email
        $mail->setFrom('info@berna.com');
        $mail->addAddress('info@berna.com', 'Berna.com');
        $mail->Subject = 'Nuevo mensaje desde la Web.';

        //-> Habilitar HTML y setear colección de caracteres
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //-> Definir el contenido del mensaje
        $contenido = '<html>';
        $contenido .= '<h2>Hola Berna!! Alguien quiere contactarse con nosotros: </h2>';
        $contenido .= '<p>Nombre: ' . $formulario['first-name'] . '</p>';
        $contenido .= '<p>Mensaje: ' . $formulario['last-name'] . '</p>';
        $contenido .= '<p>Número de Teléfono: ' . $formulario['phone-nr'] . '</p>';
        $contenido .= '<p>Email: ' . $formulario['e-mail'] . '</p>';
        $contenido .= '</html>';

        // Agregamos el contenido al cuerpo del email
        $mail->Body = $contenido;
        $mail->AltBody = 'Texto alternativo sin HTML';

        // Enviar el email
        $mail->send();

    }

}