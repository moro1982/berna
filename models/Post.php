<?php

namespace Model;

class Post extends ActiveRecord {
    
    protected static $tabla = 'post';
    protected static $columnasDB = ['id', 'title', 'brief', 'content', 'image', 'created_at', 'status'];

    public $id;
    public $title;
    public $brief;
    public $content;
    public $image;
    public $created_at;
    public $status;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? NULL;
        $this->title = $args['title'] ?? '';
        $this->brief = $args['brief'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->created_at = date('Y/m/d');
        $this->status = $args['status'] ?? 0;
    }

    public function validar() {
        if (!$this->title) {
            self::$alertas['error'][] = "Debes añadir un Título";
        }
        if (!$this->brief) {
            self::$alertas['error'][] = "El Resumen es Obligatorio";
        }
        if (strlen($this->content) < 50) {
            self::$alertas['error'][] = "El Texto es Obligatorio y debe contener al menos 50 caracteres";
        }
        if (!$this->image) {
            self::$alertas['error'][] = "La Imagen es Obligatoria";
        }

        return self::$alertas;
    }

    public function eliminar() {
        //-> Construir el string del query
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        //-> Realizar consulta (DELETE)
        $resultado = self::$db->query($query);
        if ($resultado) {
            //-> Borrar imagen del servidor
            $this->borrarImagen();
        }
        return $resultado;
    }

    public static function getMostPopular() {
        $query = "SELECT post.*, COUNT(likes.id) AS total_likes FROM " . static::$tabla;
        $query .= " LEFT JOIN likes ON post.id = likes.post_id";
        $query .= " GROUP BY post.id ORDER BY total_likes DESC LIMIT 6";

        $resultado = self::$db->query($query);
        $posts = [];
        while ($post = $resultado->fetch_assoc()) {
            $posts[] = new Post($post);
        }
        return $posts;
    }
}