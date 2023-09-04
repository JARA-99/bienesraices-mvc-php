<?php

namespace Model;

class Admin extends ActiveRecord {
  protected static $table = 'usuarios';
  protected static $columnasDb = ['id', 'email', 'password'];

  public $id;
  public $email;
  public $password;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
  }

  public function validate() {
    if (!$this->email) {
      self::$errors[] = 'El email es obligatorio';
    }

    if (!$this->password) {
      self::$errors[] = 'El password es obligatorio';
    }

    return self::$errors;
  }

  public function existeUsuario() {
    //? Revisar si el usuario existe o no
    $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' limit 1";

    $resultado = self::$db->query($query);

    if(!$resultado->num_rows) {
      self::$errors[] = 'El usuario no existe';
      return;
    };

    return $resultado;
  }

  public function comprobarPassword($resultado) {
    $usuario = $resultado->fetch_object();

    $autenticado = password_verify($this->password, $usuario->password);

    if(!$autenticado) {
      self::$errors[] = 'El password es incorrecto';
    }

    return $autenticado;
  }

  public function autenticar() {
    session_start();

    //? Llenar el array de session
    $_SESSION['usuario'] = $this->email;
    $_SESSION['login'] = true;
    
    header('Location: /admin');
  }
}