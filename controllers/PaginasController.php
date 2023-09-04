<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
  public static function index(Router $router) {
    $propiedades = Propiedad::getSome(3);
    $init = true;

    $router->render('paginas/index', [
      'propiedades' => $propiedades,
      'init' => $init
    ]);
  }
  public static function nosotros(Router $router) {
    $router->render('paginas/nosotros');
  }
  public static function propiedades(Router $router) {
    $propiedades = Propiedad::getAll();
    
    $router->render('paginas/propiedades', [
      'propiedades' => $propiedades
    ]);
  }
  public static function propiedad(Router $router) {
    $id = validarORedireccionar('/');
    $propiedad = Propiedad::getOneById($id);
    
    $router->render('paginas/propiedad', [
      'propiedad' => $propiedad
    ]);
  }
  public static function blog(Router $router) {
    $router->render('paginas/blog');
  }
  public static function entrada(Router $router) {
    $router->render('paginas/entrada');
  }
  public static function contacto(Router $router) {
    $msg = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $respuesta = $_POST['contacto'];

      //? Crear una instancia de PHPMailer
      $mail = new PHPMailer();

      //? Configurar SMTP
      $mail->isSMTP();
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Port = 2525;
      $mail->Username = '2584d122bc3b1f';
      $mail->Password = '9b0f05a522da6e';
      $mail->SMTPSecure = 'tls';

      //? Configurar Contenido del Email
      $mail->setFrom('admin@bienesraices.com');
      $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
      $mail->Subject = 'Tienes un Nuevo Mensaje';

      //? Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      //? Definir Contenido
      $contenido = '<html>';
      $contenido = '
        <style type="text/css">
          html {
            font-family: sans-serif;
          }
        </style>
      ';

      $contenido .= '<p>Tienes un nuevo mensaje</p>';
      $contenido .= "<p>Nombre: {$respuesta['nombre']}</p>";
      
      //? Enviar de forma condicional algunos campos de email o teléfono
      if ($respuesta['contacto'] === 'telefono') {
        $contenido .= "<p>Eligió ser contactado por teléfono:</p>";
        $contenido .= "<p>Teléfono: {$respuesta['telefono']}</p>";
        $contenido .= "<p>Fecha y hora que desea ser contactado: el día {$respuesta['fecha']} a las {$respuesta['hora']}</p>";
      } else {
        //? Agregamos el camo email
        $contenido .= "<p>Eligió ser contactado por email:</p>";
        $contenido .= "<p>Email: {$respuesta['email']}</p>";
      }

      $contenido .= "<p>Mensaje: {$respuesta['mensaje']}</p>";
      $contenido .= "<p>Tipo de Información: {$respuesta['tipo']}</p>";
      $contenido .= "<p>Presupuesto: {$respuesta['precio']}$</p>";
      $contenido .= "<p>Tipo de Contacto: {$respuesta['contacto']}</p>";
      $contenido .= '</html>';

      $mail->Body = $contenido;
      $mail->AltBody = 'Esto es texto alternativo sin HTML';

      //? Enviar el email
      if($mail->send()) {
        $msg = 'Mensaje enviado correctamente';
      } else {
        $msg = 'El mensaje no se pudo enviar...';
      }
    }

    $router->render('paginas/contacto', [
      'msg' => $msg,
    ]);
  }
}