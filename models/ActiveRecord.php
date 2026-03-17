<?php

namespace Model;

class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    public static function setDB($database) {
        self::$db = $database;
    }

    public static function getDB() {
        return self::$db;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    public function crear() {
        // Sanitizar los datos        
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id
        ];
    }

    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function eliminar() {
        //-> Construir el string del query
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        //-> Realizar consulta (DELETE)
        $resultado = self::$db->query($query);
        // if ($resultado) {
        //     //-> Borrar imagen del servidor
        //     $this->borrarImagen();
        // }
        return $resultado;
    }

    //-> Identificar y mapear los atributos de la BBDD
    public function atributos() {
        $atributos = [];
        
        foreach (static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    //-> Sanitizar los atributos
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value ?? '');
        }
        return $sanitizado;
    }

    //-> Subir archivos
    public function setImagen($imagen) {
        //-> Comprobar si existe el registro verificando si hay ID previo
        if (!is_null($this->id)) {
            //-> Comprobar si existe el archivo y eliminar la imagen previa
            $this->borrarImagen();
        }
        //-> Asignar nombre de la nueva imagen al atributo
        if ($imagen) {
            $this->image = $imagen;
        }
    }

    //-> Borrar archivos
    public function borrarImagen() {
        //-> Comprobar si existe el archivo y eliminar la imagen
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->image);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->image);
        }
    }

    //-> Traer todos los registros
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //-> Obtener determinado número de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //-> Buscar un registro por su ID
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id};";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Busca un registro por cualquier campo
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Creamos nueva funcion estatica para consulta WHERE con multiples resultados
    public static function whereAll($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE {$columna} = '{$valor}'";
        $array_resultado = static::consultarSQL($query);
        return $array_resultado;
    }

    // 
    public static function getLike($columna1, $columna2, $valor) {
        $match = isset($valor) ? self::$db->real_escape_string($valor) : '';
        $busqueda = '%' . $match . '%';
        
        $query = "SELECT * FROM " . static::$tabla . " WHERE " . 
                    $columna1 . " LIKE ? OR " . 
                    $columna2 . " LIKE ?";

        $stmt = self::$db->prepare($query);
        $stmt->bind_param("ss", $busqueda, $busqueda); // "ss" = dos strings
        $stmt->execute();
        $resultado = $stmt->get_result();
        //-> Iterar resultados
        $array = [];
        while ( $registro = $resultado->fetch_assoc() ) {
            $array[] = static::crearObjeto($registro);
        }

        $stmt->close();
        if (isset($resultado)) {
            $resultado->free();
        }
        
        return $array;
    }

    // Consulta plana de SQL (usar solo cuando los otros métodos del modelo no se ajustan)
    public static function SQL($query) {
        $resultado = self::$db->query($query);
        return $resultado;
    }

    //-> Realizar la consulta y retornar un array de objetos (propiedades)
    public static function consultarSQL($query) {
        //-> Consultar la BBDD
        $resultado = self::$db->query($query);
        //-> Iterar resultados
        $array = [];
        while ( $registro = $resultado->fetch_assoc() ) {
            $array[] = static::crearObjeto($registro);
        }
        //-> Liberar memoria
        $resultado->free();
        //-> Retornar resultados
        return $array;
    }

    //-> Crear un objeto a partir de un arreglo asociativo
    protected static function crearObjeto($registro) {
        //-> Instanciamos (creamos objeto vacío)
        $objeto = new static;
        //-> Iteramos sobre el arreglo asociativo $registro discriminando llave y valor, mapeandolos en el objeto creado
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key) ) {
                $objeto->$key = $value;
            }
        }
        //-> Retornamos el objeto creado
        return $objeto;
    }

    //-> Sincronizar el objeto en memoria con los cambios realizados por el usuario en formulario
    public function sincronizar( $args = [] ) {
        foreach ($args as $key => $value) {
            if ( property_exists($this, $key) && !is_null($value) ) {
                $this->$key = $value;
            }
        }
    }
}