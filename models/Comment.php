<?php

namespace Model;

class Comment extends ActiveRecord {
    
    protected static $tabla = 'comment';
    protected static $columnasDB = ['id', 'nickname', 'comment', 'created_at', 'status', 'post_id', 'user_id'];

    public $id;
    public $nickname;
    public $comment;
    public $created_at;
    public $status;
    public $post_id;
    public $user_id;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? NULL;
        $this->nickname = $args['nickname'] ?? '';
        $this->comment = $args['comment'] ?? '';
        $this->created_at = date('Y/m/d');
        $this->status = $args['status'] ?? 0;
        $this->post_id = $args['post_id'] ?? 0;
        $this->user_id = $args['user_id'] ?? 0;
    }

    public function setNickname( $nickname ) {
        $this->nickname = $nickname;
    }

    public function setPostID( $post_id ) {
        $this->post_id = $post_id;
    }

    public function setUserID( $user_id ) {
        $this->user_id = $user_id;
    }

    public function validar() {
        if ( strlen($this->comment) === 0 ) {
            self::$alertas['error'][] = "El Texto del Comentario es Obligatorio y no debe estar vacio";
        }
        return self::$alertas;
    }
}