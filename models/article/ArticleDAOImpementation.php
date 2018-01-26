<?php

  require_once("models/Dao.php");
  require_once("models/article/ArticleDAO.php");
  require_once("models/article/Article.php");

  require_once("models/fournisseur/Fournisseur.php");
  class ArticleDAOImpementation extends Dao implements ArticleDAO{

    public function __construct() {
      parent::__construct();
    }

    public function insert($article) {
      $request = $this->link->prepare("INSERT INTO article VALUES(NULL, ?, ?, ?, ?, ?)");
      $request->bindParam(1, $article->getCode());
      $request->bindParam(2, $article->getNom());
      $request->bindParam(3, $article->getPrix());
      $request->bindParam(4, $article->getQuantite());
      $request->bindParam(5, $article->getFournisseur());
      $request->execute();
      return $request->rowCount();
    }

    public function update($article) {
      $request = $this->link->prepare("UPDATE article set A_CODE = ?, A_NAME = ?, A_PRIX = ?, A_QUANTITE = ?, A_FUR_ID = ? WHERE A_ID = ?");
      $request->bindParam(1, $article->getCode());
      $request->bindParam(2, $article->getNom());
      $request->bindParam(3, $article->getPrix());
      $request->bindParam(4, $article->getQuantite());
      $request->bindParam(5, $article->getFournisseur());
      $request->bindParam(6, $article->getId());
      $request->execute();
      return $request->rowCount();
    }

    public function delete($id) {
      $request = $this->link->prepare("DELETE FROM article WHERE A_ID = ?");
      $request->bindParam(1, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function all() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM article");
      while($row = $resource->fetch())
        $list[] = new Article($row['A_ID'], $row['A_CODE'], $row['A_NAME'], $row['A_PRIX'], $row['A_QUANTITE'], $row['A_FUR_ID']);
      return $list;
    }

    public function allWithFournisseurDetails() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM article A, fournisseur F WHERE A.A_FUR_ID = F.F_ID");
      while($row = $resource->fetch()) {
        $fournisseur = new Fournisseur($row['F_ID'], $row['F_FIRST_NAME'], $row['F_LAST_NAME'], $row['F_ADDRESS'], $row['F_EMAIL'], $row['F_CONTACT']);
        $list[] = new Article($row['A_ID'], $row['A_CODE'], $row['A_NAME'], $row['A_PRIX'], $row['A_QUANTITE'], $fournisseur);
      }
      return $list;
    }

    public function storeQuantityArticle($id, $quantite) {
      $request = $this->link->prepare("UPDATE article set A_QUANTITE = A_QUANTITE + ? WHERE A_ID = ?");
      $request->bindParam(1, $quantite);
      $request->bindParam(2, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function PullQuantityArticle($id, $quantite) {
      $request = $this->link->prepare("UPDATE article set A_QUANTITE = A_QUANTITE - ? WHERE A_ID = ?");
      $request->bindParam(1, $quantite);
      $request->bindParam(2, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function getArticleSeuilMin($min) {
      $list = [];
      $resource = $this->link->prepare("SELECT * FROM article WHERE A_QUANTITE < ?");
      $resource->bindParam(1, $min);
      $resource->execute();
      while($row = $resource->fetch())
        $list[] = new Article($row['A_ID'], $row['A_CODE'], $row['A_NAME'], $row['A_PRIX'], $row['A_QUANTITE'], $row['A_FUR_ID']);
      return $list;
    }

  }

 ?>
