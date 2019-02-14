<?php
  class Database {
    public static $db = null;

    public static function connect($database, $uid, $pwd) {
      if(!empty(Database::$db)) return;
      $dsn = "mysql:host=localhost;dbname=$database";
      try {
          Database::$db = new PDO($dsn, $uid, $pwd);
      } catch(PDOException $e){
        echo $e->getMessage();
      }
    }
  }
?>
