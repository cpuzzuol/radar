<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require '../../vendor/autoload.php';
use App\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
  echo json_encode(array('success' => 1));
} else {
  echo json_encode(array('success' => 0));
}
?>
