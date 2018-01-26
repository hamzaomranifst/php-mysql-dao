<?php

  abstract class Dao {

    protected $link = NULL;

    public function __construct() {
      $this->link = DBUtils::getInstance();
    }

    abstract public function insert($object);

    abstract public function update($object);

    abstract public function delete($object);

    abstract public function all();

  }

?>
