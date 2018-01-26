<?php

  require_once('models/article/ArticleDAOImpementation.php');
  require_once('models/fournisseur/FournisseurDAOImpementation.php');

  class ArticleController {

    private $artcileDao;
    private $fournisseurDao;

    public function __construct() {
      $this->artcileDao = new ArticleDAOImpementation();
      $this->fournisseurDao = new FournisseurDAOImpementation();
    }

    public function index() {
      $articleList = $this->artcileDao->all();
      $fournisseurList = $this->fournisseurDao->all();
      require_once("views/article/index.php");
    }

    public function showArticleSeuil() {
      require_once('views/article/faibleArticle.php');
    }

    public function insert() {
      if (!empty($_POST)) {
        $article = new Article(NULL, $_POST['a_code'], $_POST['a_name'], $_POST['a_price'], $_POST['a_quant'], $_POST['a_fur_id']);
        $nbLine = $this->artcileDao->insert($article);
      }
      self::index();
    }

    public function update() {
      if (!empty($_POST)) {
        $article = new Article($_POST['a_id'], $_POST['a_code'], $_POST['a_name'], $_POST['a_price'], $_POST['a_quant'], $_POST['a_fur_id']);
        $nbLine = $this->artcileDao->update($article);
      }
      self::index();
    }

    public function delete() {
      if (!empty($_POST)) {
        $nbLine = $this->artcileDao->delete($_POST['a_del_id']);
      }
      self::index();
    }

    public function store() {
      if (!empty($_POST)) {
        $nbLine = $this->artcileDao->storeQuantityArticle($_POST['a_sp_id'], $_POST['a_quant_sp']);
      }
      self::index();
    }

    public function pull() {
      if (!empty($_POST)) {
        $nbLine = $this->artcileDao->pullQuantityArticle($_POST['a_sp_id'], $_POST['a_quant_sp']);
      }
      self::index();
    }

    public function articleSeuilMin() {
        $articleList = $this->artcileDao->getArticleSeuilMin(10);
        $data = array();
        foreach ($articleList as $articleItem) {
          $object = new stdClass();
          $object->quantite = $articleItem->getQuantite();
          $object->libelle =  $articleItem->getNom();
          $data[] = $object;
        }
        echo json_encode($data);
    }

  }

 ?>
