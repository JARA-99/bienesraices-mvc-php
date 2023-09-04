<?php

namespace Model;

class ActiveRecord
{
  //* Base de Datos
  protected static $db;
  protected static $columnsDB = [];

  protected static $table = "";

  //* Errores
  protected static $errors = [];

  //* Definir la conexiòn a la base de datos
  public static function setDB($database)
  {
    self::$db = $database;
  }

  //* Guardar datos en la base de datos
  public function save()
  {
    if (!is_null($this->id)) {
      //? Atualizamos
      $this->update();
    } else {
      //? Creamos u nuevo registro
      $this->create();
    }
  }

  //* Crear una propiedad
  public function create()
  {
    //? Sanitizar los datos
    $sanitizedData = $this->sanitizeData();

    //? Insertar a la base de datos
    $query = " INSERT INTO " . static::$table . " (";
    $query .= join(", ", array_keys($sanitizedData));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($sanitizedData));
    $query .= " ')";

    $result = self::$db->query($query);

    if ($result) {
      //? Redireccionar al usuario
      header('Location:/admin?result=1');
    }

    return $result;
  }

  //* Actualizar una propiedad
  public function update()
  {
    //? Sanitizar los datos
    $sanitizedData = $this->sanitizeData();

    $values = [];
    foreach ($sanitizedData as $key => $value) {
      $values[] = "{$key}='{$value}'";
    }

    $query = "UPDATE " . static::$table . " SET ";
    $query .= join(', ', $values);
    $query .= " WHERE id= '" . self::$db->escape_string($this->id) . "' ";
    $query .= " LIMIT 1 ";

    $result = self::$db->query($query);

    if ($result) {
      //? Redireccionar al usuario
      header('Location:/admin?result=2');
    }

    return $result;
  }

  //* Eliminar un registro
  public function delete()
  {
    //? Eliminar la propiedad
    $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $result = self::$db->query($query);

    if ($result) {
      $this->deleteImage();
      header('Location:/admin?result=3');
    }
  }

  //* Asignar los atributos de la clase
  public function atributes()
  {
    $atributes = [];

    foreach (static::$columnsDB as $column) {
      if ($column == 'id')
        continue;
      $atributes[$column] = $this->$column;
    }

    return $atributes;
  }

  //* Sanitizar los datos en la base de datos
  public function sanitizeData()
  {
    $atributes = $this->atributes();
    $sanitized = [];

    foreach ($atributes as $key => $value) {
      $sanitized[$key] = self::$db->escape_string($value);
    }

    return $sanitized;
  }

  //* Subida de Archivos
  public function setImage($image)
  {
    //? Elimiinar imagen anterior
    if (!is_null($this->id)) {
      $this->deleteImage();
    }

    //? Asignar al atributo imagen el nombre de la imagen
    if ($image) {
      $this->imagen = $image;
    }
  }

  //* Eliminar imagen
  public function deleteImage()
  {
    //? Comprobar si existe la imagen
    $fileExists = file_exists(FOLDER_IMAGES_URL . $this->imagen);

    //? Si existe
    if ($fileExists) {
      //? Eliminamos la imagen
      unlink(FOLDER_IMAGES_URL . $this->imagen);
    }
  }

  //* Validaciones 
  public static function getErrors()
  {
    return static::$errors;
  }

  public function validate()
  {
    static $errors = [];
    return static::$errors;
  }

  //* Listado de registros
  public static function getAll()
  {
    $query = "SELECT * FROM " . static::$table;

    $result = self::querySQL($query);

    return $result;
  }

  //* Obtener determinado número de registros
  public static function getSome($quantity)
  {
    $query = "SELECT * FROM " . static::$table . " LIMIT ". $quantity;

    $result = self::querySQL($query);

    return $result;
  }

  //* Busca una propiedad por su id
  public static function getOneById($id)
  {
    $query = "SELECT * FROM " . static::$table . " WHERE id = $id";

    $result = self::querySQL($query);

    return array_shift($result);
  }

  //* Hace una consulta a la base de datos
  public static function querySQL($query)
  {
    //? Consultar la base de datos
    $result = self::$db->query($query);

    //? Iterar los resultados
    $array = [];

    while ($register = $result->fetch_assoc()) {
      $array[] = static::createObject($register);
    }

    //? Liberar la memoria
    $result->free();

    //? Retornar los resultado
    return $array;
  }

  //* Convierte un array en un objeto
  protected static function createObject($register)
  {
    $object = new static;

    foreach ($register as $key => $value) {
      if (property_exists($object, $key)) {
        $object->$key = $value;
      }
    }

    return $object;
  }

  /**
   ** Sincroniza el objeto en 
   ** memoria con los cambios 
   ** realizados por el uduario 
   */
  public function sync($array = [])
  {
    foreach ($array as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
