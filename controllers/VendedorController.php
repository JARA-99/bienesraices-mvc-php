<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {
  public static function crear(Router $router) {
    $errores = Vendedor::getErrors();

    $vendedor = new Vendedor;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //? Crear una nueva instancia
      $vendedor = new Vendedor($_POST['vendedor']);

      //? Validar la clase de vendedor
      $errores = $vendedor->validate();

      //? No hay errores
      if (empty($errores)) {
        $vendedor->save();
      }
    }

    $router->render('vendedores/crear', [
      'errores' => $errores,
      'vendedor' => $vendedor,
    ]);
  }
  public static function actualizar(Router $router) {
    $id = validarORedireccionar('/admin');

    $vendedor = Vendedor::getOneById($id);

    $errores = Vendedor::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //? Asignar los valores
      $args = $_POST['vendedor'];

      //? Sincronizar objeto en memoria con lo que el usuario escribió
      $vendedor->sync($args);

      //? Validación
      $errores = $vendedor->validate();

      // debugging($vendedor);
      if (empty($errores)) {
        $vendedor->save();
      }
    }

    $router->render('vendedores/actualizar', [
      'errores' => $errores,
      'vendedor' => $vendedor,
    ]);
  }
  public static function eliminar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //? Validar Id
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if ($id) {
        //? Validar el tipo a eliminar
        $tipo = $_POST['tipo'];

        if (validarTipoContenido($tipo)) {
          //? Compara lo que vamos a eliminar
          $vendedor = Vendedor::getOneById($id);
          $vendedor->delete();
        }
      }
    }
  }
}