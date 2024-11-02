<?php

namespace App;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    // Declarando todos los atributos que tendran los objetos de esta clase
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $registro;

    // Metodo constructor: Este tomara el arreglo $_POST cons sus llaves y valores
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->registro = $args['registro'] ?? '';
    }

    // Metodo con la Validacion 
    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es requerido";
        }

        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio";
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "Formato de telefono no valido";
        }

        return self::$errores;
    }
}
