<?php

require_once('models/fournisseur/FournisseurDAOImpementation.php');

  class FournisseurController {

    private $fournisseurDao;

    public function __construct() {
      $this->fournisseurDao = new FournisseurDAOImpementation();
    }

    public function index() {
      $fournisseurList = $this->fournisseurDao->all();
      require_once("views/fournisseur/index.php");
    }

    public function insert() {
      if (!empty($_POST)) {
        $fournisseur = new Fournisseur(NULL, $_POST['fur_fn'], $_POST['fur_ln'], $_POST['fur_add'], $_POST['fur_email'], $_POST['fur_contact']);
        $nbLine = $this->fournisseurDao->insert($fournisseur);
      }
      self::index();
    }

    public function update() {
      if (!empty($_POST)) {
        $fournisseur = new Fournisseur($_POST['fur_id'], $_POST['fur_fn'], $_POST['fur_ln'], $_POST['fur_add'], $_POST['fur_email'], $_POST['fur_contact']);
        $nbLine = $this->fournisseurDao->update($fournisseur);
      }
      self::index();
    }

    public function delete() {
      if (!empty($_POST)) {
        $nbLine = $this->fournisseurDao->delete($_POST['fur_del_id']);
      }
      self::index();
    }

  }

 ?>
