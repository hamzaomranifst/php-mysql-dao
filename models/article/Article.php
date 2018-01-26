<?php

  class Article {

    private $id;
    private $code;
    private $nom;
    private $prix;
    private $quantite;
    private $fournisseur;

    public function __construct($id, $code, $nom, $prix, $quantite, $fournisseur) {
      $this->id = $id;
      $this->code = $code;
      $this->nom = $nom;
      $this->prix = $prix;
      $this->quantite = $quantite;
      $this->fournisseur = $fournisseur;
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getCode() {
      return $this->code;
    }

    public function setCode($Code) {
      $this->code = $code;
    }

    public function getNom() {
      return $this->nom;
    }

    public function setNom($nom) {
      $this->nom = $nom;
    }

    public function getPrix() {
      return $this->prix;
    }

    public function setPrix($prix) {
      $this->prix = $prix;
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
