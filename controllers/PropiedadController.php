<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as ImageMag;

class PropiedadController
{
  public static function index(Router $router)
  {
    $propiedades = Propiedad::getAll();

    $vendedores = Vendedor::getAll();

    //?Muestra mensaje condicional
    $result = $_GET['result'] ?? null;

    $router->render('propiedades/admin', [
      'propiedades' => $propiedades,
      'result' => $result,
      'vendedores' => $vendedores,
    ]);
  }

  public static function crear(Router $router)
  {
    $propiedad = new Propiedad;
    $vendedores = Vendedor::getAll();

    //* Lista de errores
    $errors = Propiedad::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      /** 
       ** Crea una nueva instancia
       */
      $propiedad = new Propiedad($_POST['propiedad']);

      /**
       ** SUBIDA DE ARCHIVOS 
       */
      //? Crear carpeta

      //? Generar nombre único
      $ImageName = md5(uniqid(rand(), true)) . ".jpg";

      //? Setear la imagen
      //? Realiza un resize a la imagen con intervention
      if ($_FILES['propiedad']['tmp_name']["imagen"]) {
        $imageMag = ImageMag::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800, 600);
        $propiedad->setImage($ImageName);
      }

      //? Validar
      $errors = $propiedad->Validate();

      //?Revisar que el arreglo de errores este vacio
      if (empty($errors)) {

        //? Crear la carpeta imagenes
        if (!is_dir(FOLDER_IMAGES_URL)) {
          mkdir(FOLDER_IMAGES_URL);
        }

        //? Guardar la imagen en el servidor 
        $imageMag->save(FOLDER_IMAGES_URL . $ImageName);

        //? Guardar en la base de datos
        $propiedad->save();
      }
    }

    $router->render('propiedades/crear', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errors' => $errors
    ]);
  }

  public static function actualizar(Router $router)
  {
    $id = validarORedireccionar('/admin');

    $propiedad = Propiedad::getOneById($id);

    $vendedores = Vendedor::getAll();


    $errors = Propiedad::getErrors();

    //? Metodo Post para actualizar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //? Asignar atributos
      $args = $_POST['propiedad'];

      $propiedad->sync($args);

      //? Validación
      $errors = $propiedad->validate();

      //? Generar nombre único
      $ImageName = md5(uniqid(rand(), true)) . ".jpg";

      //? Subida de imagenes
      if ($_FILES['propiedad']['tmp_name']["imagen"]) {
        $imageMag = ImageMag::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800, 600);
        $propiedad->setImage($ImageName);
      }

      //? Revisar que el arreglo de errores este vacio
      if (empty($errors)) {
        if ($_FILES['propiedad']['tmp_name']["imagen"]) {
          //? almacenar la imagen
          $imageMag->save(FOLDER_IMAGES_URL . $ImageName);
        }
        //? Actualizar la base de datos
        $propiedad->save();
      }
    }

    $router->render("/propiedades/actualizar", [
      "propiedad" => $propiedad,
      'errors' => $errors,
      'vendedores' => $vendedores
    ]);
  }

  public static function eliminar()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //? Validar id
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if ($id) {
        $tipo = $_POST['tipo'];

        if (validarTipoContenido($tipo)) {
          $propiedad = Propiedad::getOneById($id);
          $propiedad->delete();
        }
      }
    }
  }
}
