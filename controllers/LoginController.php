<?php

  class LoginController {

    public function index() {
      require_once("views/login/index.php");
    }

    public function login() {
      $link = new PDO("mysql:host=localhost;dbname=php_project", "root", "hamza.fst@FST");
      $ressource = $link->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
      $ressource->bindParam(1, $_POST['username']);
      $ressource->bindParam(2, $_POST['password']);
      $ressource->execute();
      $exist = $ressource->rowCount();
      if($exist > 0){
        header("Location: ?controller=Article&action=index");
      }
      else {
        self::index();
      }
    }
  }

 ?>
