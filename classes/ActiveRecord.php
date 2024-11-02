<?php

namespace App;

class ActiveRecord
{
    // BASE DE DATOS: Agregando dos propiedades estaticas con informacion de la BD
    protected static $db;
    protected static $columnasDB = [];

    protected static $tabla = '';

    /* Validaciones: Coloque protected para que unicamente desde la clase 
           se pueda validar si hay un error o no. 
           La puse como static porque no requiero instanciarla para verificar si hay errores */
    protected static $errores = [];

    // Metodo para la conexion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;  // sintaxis para hacer referencia a las propiedades estaticas
    }

    /* Este metodo comprueba si se actualizara o creara una propiedad,
           y luego manda a llamar el metodo correspondiente */
    public function guardar()
    {
        if (!is_null($this->id)) {
            // Actualizando la propiedad
            $this->actualizar();
        } else {
            // Creando una propiedad
            $this->crear();
        }
    }

    // Metodo para crear registros nuevos
    public function crear()
    {
        // Arreglo con los Datos Sanitizados
        $atributos = $this->sanitizarDatos();

        // join(): Convierte un arreglo a un string con separadores definidos

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));  // estableciendo las llaves del array $atributos
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos)); // estableciendo los valores del array $atributos
        $query .= "'); ";

        // Ingresando la informacion en la BD
        $resultado = self::$db->query($query);

        // Muestra la alerta de exito
        if ($resultado) {
            // Redireccionando al usuario
            header('Location: ../index.php?resultado=1');
        }
    }

    // Metodo para actualizar registros
    public function actualizar()
    {
        // Arreglo con los Datos Sanitizados
        $atributos = $this->sanitizarDatos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
        $query .= " LIMIT 1; ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionando al usuario
            header('Location: ../index.php?resultado=2');
        }
    }

    // Metodo para eliminar registros
    public function eliminar()
    {
        // Codigo SQL para Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1;";

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();

            header('location: ../admin/index.php?resultado=3');
        }
    }

    // Subida de Archivos (imagen)
    public function setImagen($imagen)
    {
        // Verifica si hay un id existente para luego mandar a llamar el metodo borrarImagen()
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        // Asignando a la propiedad imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Elimina el archivo (imagen)
    public function borrarImagen()
    {
        // Comprobando si existe la imagen
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        // Elimina la imagen previa de la propiedad
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // Identifica y une los campos de la BD con los valores de las propiedades del objeto
    public function atributos()
    {
        $atributos = [];

        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue; // Si se cumple, Salta la iteracion actual del foreach

            $atributos[$columna] = $this->$columna;
        }

        /* retornando un arreglo con las campos de la BD como llaves
               y las propiedades del objeto como valores */
        return $atributos;
    }

    // Metodo para sanitizar la entrada de Datos
    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        // retornando un arreglo con la informacion sanitizada
        return $sanitizado;
    }

    // Metodo que retorna el arreglo de errores
    public static function getErrores()
    {
        return static::$errores;
    }

    // Metodo con la Validacion
    public function validar()
    {
        static::$errores = [];

        return static::$errores;
    }

    // Metodo para mostrar todos los registros de propiedades
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene un determinado numero de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id};";

        $resultado = self::consultarSQL($query);

        // array_shift(): muestra el primer elemento del arreglo
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
