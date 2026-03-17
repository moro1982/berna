<?php

namespace Controller;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Model\Comment;
use Model\Likes;
use Model\Post;
use MVC\Router;


class PostController {
    
    public static function index(Router $router) {

        isAdmin();
        $resultado = $_GET['resultado'] ?? null;
        $posts = Post::all();   // Incorporar filtro x número de likes
        
        $router->render('blog/admin', [
            'nombre' => $_SESSION['nombre'],
            'resultado' => $resultado,
            'posts' => $posts
        ]);
    }

    public static function crear(Router $router) {

        isAdmin();
        $post = new Post();
        $alertas = [];
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $post->sincronizar($_POST);

            /* PREPARACIÓN DE ARCHIVOS PARA SUBIR */
            //-> Generar un nombre de archivo de imagen único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            //-> Verificar si hay imagen en el superglobal $_FILES
            if ($_FILES['image']['tmp_name']) {
                /* Setear imagen */
                //-> Creo ImageManager con Gd Driver
                $manager = new ImageManager(Driver::class);
                //-> Resize de la imagen con Intervention Image
                $image = $manager->read($_FILES['image']['tmp_name'])->resize(600,800);
                //-> Asigno nombre de la imagen al atributo de imagen de la instancia
                $post->setImagen($nombreImagen);
            }

            //-> Validamos los datos recibidos y almacenamos los errores obtenidos
            $alertas = $post->validar();

            //-> Revisar que el arreglo de errores esté vacío y subir la información.
            if (empty($alertas) ) {
                //-> Crear carpeta de imágenes
                if ( !is_dir(CARPETA_IMAGENES) ) {
                    mkdir(CARPETA_IMAGENES);
                }
                // Habilitamos permiso de escritura en la carpeta
                chmod(CARPETA_IMAGENES, 0777);
                //-> Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                //-> Guardar datos de los atributos
                
                $post->guardar();
                header('Location: /admin?resultado=1');
            }
        }

        $router->render('blog/crear', [
            'nombre' => $_SESSION['nombre'],
            'post' => $post,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {

        isAdmin();
        $id = validarORedireccionar('/admin');

        $post = Post::find($id);
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $args = $_POST;
            $post->sincronizar($args);

            /* PREPARACIÓN DE ARCHIVOS PARA SUBIR */
            //-> Generar un nombre de archivo de imagen único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            //-> Verificar si hay imagen en el superglobal $_FILES
            if ($_FILES['image']['tmp_name']) {
                /* Setear imagen */
                //-> Creo ImageManager con Gd Driver
                $manager = new ImageManager(new Driver());
                //-> Resize de la imagen con Intervention Image
                $image = $manager->read($_FILES['image']['tmp_name'])->resize(600,800);
                //-> Asigno nombre de la imagen al atributo de imagen de la instancia
                $post->setImagen($nombreImagen);
            }

            $alertas = $post->validar();

            if (empty($alertas)) {
                if ($_FILES['image']['tmp_name']) {
                    //-> Almacenar la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $resultado = $post->guardar();
                if ($resultado) {
                    // -> Redireccionar al usuario
                    header('Location: /admin?resultado=2');
                }
            }
        }

        $router->render('blog/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'post' => $post,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar_post(Router $router) {

        isAdmin();
        $id = validarORedireccionar('/admin');
        $post = Post::find($id);

        $router->render('blog/eliminar-post', [
            'nombre' => $_SESSION['nombre'],
            'post' => $post
        ]);

    }

    public static function confirmar_eliminado() {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $post = Post::find($id);
                $post->eliminar();
                header('Location: /admin?resultado=3');
            }
        }
    }

    public static function borrar_comentario(Router $router) {

        isAdmin();
        $id = validarORedireccionar('/admin');
        $comentario = Comment::find($id);

        $router->render('blog/borrar-comentario', [
            'nombre' => $_SESSION['nombre'],
            'comentario' => $comentario
        ]);
    }

    public static function confirmar_borrado() {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $comentario = Comment::find($id);
                $comentario->eliminar();
                header('Location: /admin?resultado=3');
            }
        }
    }

    public static function like_post() {
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $user_id = $_SESSION['id'];
            $post_id = $_POST['post_id'];
            
            $meGusta = Likes::consultarSQL("SELECT id FROM likes WHERE post_id = {$post_id} AND user_id = {$user_id}");

            $resultado = new Likes();

            if (!$meGusta) {
                $like = new Likes();
                $like->setPostID($post_id);
                $like->setUserID($user_id);
                $resultado = $like->guardar();
            } else {
                $resultado = $meGusta[0]->eliminar();
            }

            header("Location: /entrada?id={$post_id}");

        }
    }

    public static function buscar_post() {
        $busqueda = $_POST['patron_busqueda'];
        $resultados = Post::getLike('title', 'content', $busqueda);
        $errores = ['data' => false];
        
        if (count($resultados) > 0) {
          echo json_encode($resultados);
        } else {
          echo json_encode($errores);
        }
    }
}