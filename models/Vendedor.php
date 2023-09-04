<?php

namespace Model;

class Vendedor extends ActiveRecord
{
  protected static $table = "vendedores";

  protected static $columnsDB = [
    "id",
    "nombre",
    "apellido",
    "telefono"
  ];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? "";
    $this->apellido = $args['apellido'] ?? "";
    $this->telefono = $args['telefono'] ?? "";
  }

  public function validate()
  {
    // Expresión regular para números de teléfono en España con delimitador /
    $regex = "/^(\\\\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}$/";

    if (!$this->nombre) {
      self::$errors[] = "Nombre: Campo obligatorio, debes añadir un nombre.";
    }

    if (!$this->apellido) {
      self::$errors[] = "Apellido: Campo obligatorio, debes añadir un apellido.";
    }

    if (strlen($this->telefono) < 9) {
      self::$errors[] = "Teléfono: Campo obligatorio, debes añadir un teléfono con 9 carácteres";
    }

    if (!preg_match($regex, $this->telefono)) {
      self::$errors[] = "Telefono: Formato no valido";
    }

    return self::$errors;
  }
}
