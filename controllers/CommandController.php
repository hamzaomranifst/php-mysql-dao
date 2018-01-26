<?php


  require_once('models/article/ArticleDAOImpementation.php');
  require_once('models/fournisseur/FournisseurDAOImpementation.php');
  require_once('models/commande/CommandDAOImpementation.php');

  class CommandController {

    private $commandDao;
    private $artcileDao;
    private $fournisseurDao;

    public function __construct() {
      $this->artcileDao = new ArticleDAOImpementation();
      $this->fournisseurDao = new FournisseurDAOImpementation();
      $this->commandDao = new CommandeDAOImpementation();
    }

    public function index() {
      $articleList = $this->artcileDao->all();
      $fournisseurList = $this->fournisseurDao->all();
      $commandList = $this->commandDao->allWithAllDetails();
      require_once("views/commande/index.php");
    }

    public function insert() {
      if (!empty($_POST)) {
        $todayDate = date('Y-m-d');
        $commande = new Command(NULL, NULL, $_POST['c_art_id'], $_POST['c_quant'], $todayDate);
        $nbLine = $this->commandDao->insert($commande);
      }
      self::index();
    }


    public function delete() {
      if (!empty($_POST)) {
        $nbLine = $this->commandDao->delete($_POST['c_del_id']);
      }
      self::index();
    }

}
 ?>
