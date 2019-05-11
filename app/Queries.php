<?php
namespace App;
require $_SERVER['DOCUMENT_ROOT'] . '/radar/vendor/autoload.php';

/**
 * SQLite Queries
 */
class Queries {
  private static $pdo;

  public static function init(){
    self::$pdo = (new SQLiteConnection())->connect();
  }

  public static function getBands(){
    $q = self::$pdo->query("SELECT * FROM dat WHERE terrain_type = 'a'");
    return $q->fetchAll(\PDO::FETCH_ASSOC);
  }
}
Queries::init();
