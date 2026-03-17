<?php

namespace Model;

class Likes extends ActiveRecord {
    
    protected static $tabla = 'likes';
    protected static $columnasDB = ['id', 'post_id', 'user_id', 'fecha'];

    public $id;
    public $post_id;
    public $user_id;
    public $fecha;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? NULL;
        $this->post_id = $args['post_id'] ?? 0;
        $this->user_id = $args['user_id'] ?? 0;
        $this->fecha = date('Y/m/d');
    }

    public function setPostID( $post_id ) {
        $this->post_id = $post_id;
    }

    public function setUserID( $user_id ) {
        $this->user_id = $user_id;
    }

    public static function contarLikes( $post_id ) {
        $query = "SELECT COUNT(*) AS total_likes FROM " . self::$tabla . " WHERE post_id = '{$post_id}'";
        $resultado = self::SQL($query);
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $nroLikes = $fila['total_likes'];
        }
        return $nroLikes;
    }
}