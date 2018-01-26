<?php

  require_once("models/Dao.php");
  require_once("models/commande/CommandDAO.php");
  require_once("models/commande/Command.php");
  require_once("models/article/Article.php");
  require_once("models/fournisseur/Fournisseur.php");

  class CommandeDAOImpementation extends Dao {

    public function __construct() {
      parent::__construct();
    }

    public function insert($commmande) {
      $request = $this->link->prepare("INSERT INTO commande VALUES(NULL, ?, ?, ?)");
      $request->bindParam(1, $commmande->getArticle());
      $request->bindParam(2, $commmande->getQuantite());
      $request->bindParam(3, $commmande->getDate());
      $request->execute();
      return $request->rowCount();
    }

    public function update($commmande) {
      return NULL;
    }

    public function delete($id) {
      $request = $this->link->prepare("DELETE FROM commande WHERE C_ID = ?");
      $request->bindParam(1, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function all() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM commande");
      while($row = $resource->fetch())
        $list[] = new Command($row['C_ID'], $row['C_FUR_ID'], $row['C_ART_ID'], $row['C_QUANTITE'], $row['C_DATE']);
      return $list;
    }

    public function allWithAllDetails() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM commande C, fournisseur F, article A WHERE C.C_ART_ID = A.A_ID AND A.A_FUR_ID= F.F_ID ");
      while($row = $resource->fetch()) {
        $fournisseur = new Fournisseur($row['F_ID'], $row['F_FIRST_NAME'], $row['F_LAST_NAME'], $row['F_ADDRESS'], $row['F_EMAIL'], $row['F_CONTACT']);
        $article = new Article($row['A_ID'], $row['A_CODE'], $row['A_NAME'], $row['A_PRIX'], $row['A_QUANTITE'], $fournisseur);
        $list[] = new Command($row['C_ID'], $fournisseur, $article, $row['C_QUANTITE'], $row['C_DATE']);
      }
      return $list;
    }

  }

 ?>
