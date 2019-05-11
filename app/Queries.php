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

  public static function allowedBandsAndPolarization($terrain_type){
    $q = self::$pdo->query("SELECT band, polarization FROM dat WHERE terrain_type = ? AND thetamin IS NOT NULL");
    $q->execute([$terrain_type]);
    return $q->fetchAll(\PDO::FETCH_ASSOC);
  }
  public static function getBands(){
    $q = self::$pdo->query("SELECT * FROM dat WHERE terrain_type = 'a'");
    return $q->fetchAll(\PDO::FETCH_ASSOC);
  }

  public static function getTerrainTypes(){
    $q = self::$pdo->query("SELECT DISTINCT terrain_type FROM dat");
    return $q->fetchAll(\PDO::FETCH_ASSOC);
  }
}
Queries::init();
