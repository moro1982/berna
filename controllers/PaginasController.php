<?php

namespace Controller;

use Class\Email;
use Model\Comment;
use Model\Likes;
use Model\Post;
use MVC\Router;

class PaginasController {

    public static function index(Router $router) {
        $alertas = [];
        $inicio = true;
        $posts = Post::getMostPopular();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $alertas = validarDatosContacto($datos);
            $mail = new Email();
            
            //-> Enviar el email
            if (empty($alertas)) {
                $mail->enviarDatosContacto($datos);
                $alertas['exito'][] = 'Mensaje enviado correctamente';
            } else {
                $alertas['error'][] = 'ERROR - El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/home', [
            'alertas' => $alertas,
            'inicio' => $inicio,
            'posts' => $posts
        ]);
    }

    public static function portfolio(Router $router) {
        $router->render('paginas/portfolio');
    }

    public static function blog(Router $router) {
        
        $posts = Post::all();
        $populares = Post::getMostPopular();
        $nombre = '';
        $tags = ["#management", "#branding", "#creativity", "#marketing", "#berna"];

        if ( !empty($_SESSION['nombre']) ) {
            $nombre = $_SESSION['nombre'];
        }

        $router->render('paginas/blog', [
            'nombre' => $nombre,
            'posts' => $posts,
            'populares' => $populares,
            'tags' => $tags
        ]);
    }

    public static function entrada(Router $router) {
        // Resultado de comentario guardado (si lo hay)
        $resultado = $_GET['resultado'] ?? null;
        // Buscamos y filtramos el ID del $_GET, sino existe, redirige al indice del blog
        $id = validarORedireccionar('/blog');
        //-> Si hay $id válido, buscamos el post
        $post = Post::find($id);
        //-> Traemos todos los comentarios de este post
        $comentarios = Comment::whereAll('post_id', $id);
        //-> Traemos la cantidad de likes de este post
        $nroLikes = Likes::contarLikes($id);

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            
            $comment = new Comment($_POST);
            $comment->setNickname($_SESSION['nombre']);
            $comment->setPostID($id);
            $comment->setUserID($_SESSION['id']);
            
            $alertas = $comment->validar();

            if (empty($alertas) ) {
                $comment->guardar();
                header('Location: /entrada?id=' . $id . '&resultado=1');
            }
        }

        $router->render('paginas/entrada', [
            'post' => $post,
            'comentarios' => $comentarios,
            'nroLikes' => $nroLikes,
            'resultado' => $resultado,
            'alertas' => $alertas
        ]);
    }

    public static function contacto(Router $router) {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $alertas = validarDatosContacto($datos);

            $mail = new Email();
            
            //-> Enviar el email
            if (empty($alertas)) {
                $mail->enviarDatosContacto($datos);
                $alertas['exito'][] = 'Mensaje enviado correctamente';
            } else {
                $alertas['error'][] = 'ERROR - El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/contacto', [
            'alertas' => $alertas
        ]);
    }
    
}