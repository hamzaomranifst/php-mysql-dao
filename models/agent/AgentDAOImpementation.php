<?php

  require_once("models/Dao.php");
  require_once("models/agent/Agent.php");

  class AgentDAOImpementation extends Dao {

    public function __construct() {
      parent::__construct();
    }

    public function insert($agent) {
      $request = $this->link->prepare("INSERT INTO agent VALUES(NULL, ?, ?, ?, ?, ?)");
      $request->bindParam(1, $agent->getFirstName());
      $request->bindParam(2, $agent->getLastName());
      $request->bindParam(3, $agent->getAddress());
      $request->bindParam(4, $agent->getEmail());
      $request->bindParam(5, $agent->getContact());
      $request->execute();
      return $request->rowCount();
    }

    public function update($agent) {
      $request = $this->link->prepare("UPDATE agent set AG_FIRST_NAME = ?, AG_LAST_NAME = ?, AG_ADDRESS = ?, AG_EMAIL = ?, AG_CONTACT = ? WHERE AG_ID = ?");
      $request->bindParam(1, $agent->getFirstName());
      $request->bindParam(2, $agent->getLastName());
      $request->bindParam(3, $agent->getAddress());
      $request->bindParam(4, $agent->getEmail());
      $request->bindParam(5, $agent->getContact());
      $request->bindParam(6, $agent->getId());
      $request->execute();
      return $request->rowCount();
    }

    public function delete($id) {
      $request = $this->link->prepare("DELETE FROM agent WHERE AG_ID = ?");
      $request->bindParam(1, $id);
      $request->execute();
      return $request->rowCount();
    }

    public function all() {
      $list = [];
      $resource = $this->link->query("SELECT * FROM agent");
      while($row = $resource->fetch())
        $list[] = new Agent($row['AG_ID'], $row['AG_FIRST_NAME'], $row['AG_LAST_NAME'], $row['AG_ADDRESS'], $row['AG_EMAIL'], $row['AG_CONTACT']);
      return $list;
    }

  }

 ?>
