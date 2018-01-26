<?php

  require_once('Parameters/Constantes.php');
  require_once('DBUtils/DBUtils.php');

  // Preparation de la requête
  if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if(isset($_GET['action']))
      $action = $_GET['action'];
    else
      $action = 'index';
  } else {
    $controller = 'Login';
    $action     = 'index';
  }

  // Traitement de la requête
  require_once('controllers/' . $controller . 'Controller.php');
  $controllerClass = $controller."Controller";
  $controller_object = new $controllerClass();
  $controller_object->$action();

?>
