<?php

  require_once("models/Dao.php");
  require_once("models/fournisseur/Fournisseur.php");

  class FournisseurDAOImpementation extends Dao {

    public function __construct() {
      parent::__construct();
    }

    public function insert($fournisseur) {
      $request = $this->link->prepare("INSERT INTO fournisseur VALUES(NULL, ?, ?, ?, ?, ?)");
      $request->bindParam(1, $fournisseur->getFirstName());
      $request->bindParam(2, $fournisseur->getLastName());
      $request->bindParam(3, $fournisseur->getAddress());
      $request->bindParam(4, $fournisseur->getEmail());
      $request->bindParam(5, $fournisseur->getContact());
      $request->execute();
      return $request->rowCount();
    }

    public function update($fournisseur) {
      $request = $this->link->prepare("UPDATE fournisseur set F_FIRST_NAME = ?, F_LAST_NAME = ?, F_ADDRESS = ?, F_EMAIL = ?, F_CONTACT = ? WHERE F_ID = ?");
      $request->bindParam(1, $fournisseur->getFirstName());
      $request->bindParam(2, $fournisseur->getLastName());
      $request->bindParam(3, $fournisseur->getAddress());
      $request->bindParam(4, $fournisseur->getEmail());
      $request->bindParam(5, $fournisseur->getContact());
      $request->bindParam(6, $fournisseur->getId());
      $request->execute();
      return $request->rowCount();
    }

    public function delete($id) {
      $request = $this->link->prepare("DELETE FROM fournisseur WHERE F_ID = ?");
      $request->bindParam(1, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function all() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM fournisseur");
      while($row = $resource->fetch())
        $list[] = new Fournisseur($row['F_ID'], $row['F_FIRST_NAME'], $row['F_LAST_NAME'], $row['F_ADDRESS'], $row['F_EMAIL'], $row['F_CONTACT']);
      return $list;
    }

  }

 ?>
