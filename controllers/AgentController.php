<?php

require_once('models/agent/AgentDAOImpementation.php');

  class AgentController {

    private $agentDao;

    public function __construct() {
      $this->agentDao = new AgentDAOImpementation();
    }

    public function index() {
      $agentList = $this->agentDao->all();
      require_once("views/agent/index.php");
    }

    public function insert() {
      if (!empty($_POST)) {
        $agent = new Agent(NULL, $_POST['ag_fn'], $_POST['ag_ln'], $_POST['ag_add'], $_POST['ag_email'], $_POST['ag_contact']);
        $nbLine = $this->agentDao->insert($agent);
      }
      self::index();
    }

    public function update() {
      if (!empty($_POST)) {
        $agent = new Agent($_POST['ag_id'], $_POST['ag_fn'], $_POST['ag_ln'], $_POST['ag_add'], $_POST['ag_email'], $_POST['ag_contact']);
        $nbLine = $this->agentDao->update($agent);
      }
      self::index();
    }

    public function delete() {
      if (!empty($_POST)) {
        $nbLine = $this->agentDao->delete($_POST['ag_del_id']);
      }
      self::index();
    }

  }

 ?>
