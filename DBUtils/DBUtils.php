<?php

  class DBUtils {

    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $DBProprety = parse_ini_file(Constantes::DB_PROPRETY_FILE_PATH);
        self::$instance = new PDO("mysql:host=".$DBProprety['host_name'].";dbname=".$DBProprety['database_name'], $DBProprety['user_name'], $DBProprety['password'], $pdo_options);
      }
      return self::$instance;
    }

  }

?>
