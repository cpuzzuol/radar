<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require '../../vendor/autoload.php';
use App\SQLiteConnection;
use App\Queries;

# GET JSON PARAMS: https://stackoverflow.com/questions/18866571/receive-json-post-with-php
$terrain_type = $_GET['terrain_type'];
$band = $_GET['band'];
$polarization = $_GET['polarization'];


if(!$terrain_type || !$band || !$polarization){
  http_response_code(400);
  $response = 'Improperly formatted query.';
} else {
  $response = getDat($terrain_type, $band, $polarization);
}

function getDat($terrain_type, $band, $polarization) {
  http_response_code(200);
  return json_encode(Queries::getBands());
}

echo $response;
?>
