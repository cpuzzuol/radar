<?php
namespace App;

/**
 * SQLite connnection
 */
class SQLiteConnection {
  /**
   * PDO instance
   * @var type
   */
  private $pdo;

  /**
   * return an instance of the PDO object that connects to the SQLite database
   * @return \PDO
   */
  public function connect() {
    if ($this->pdo == null) {
      $this->pdo = new \PDO("sqlite:" . $_SERVER['DOCUMENT_ROOT'] . '/radar/' . Config::PATH_TO_SQLITE_FILE);
    }
    return $this->pdo;
  }
}
