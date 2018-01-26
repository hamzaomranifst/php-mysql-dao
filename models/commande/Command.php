<?php

  class Command {

    private $id;
    private $fournisseur;
    private $article;
    private $quantite;
    private $date;

    public function __construct($id, $fournisseur, $article, $quantite, $date) {
      $this->id = $id;
      $this->fournisseur = $fournisseur;
      $this->article = $article;
      $this->quantite = $quantite;
      $this->date = $date;
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getDate() {
      return $this->date;
    }

    public function setDate($date) {
      $this->date = $date;
    }

    public function getArticle() {
      return $this->article;
    }

    public function setArticle($article) {
      $this->article = $article;
    }

    public function getQuantite() {
      return $this->quantite;
    }

    public function setQuantite($quantite) {
      $this->quantite = $quantite;
    }

    public function getFournisseur() {
      return $this->fournisseur;
    }

    public function setFournisseur($fournisseur) {
      $this->fournisseur = $fournisseur;
    }

  }

?>
