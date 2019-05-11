<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require '../../vendor/autoload.php';
use App\SQLiteConnection;
use App\Queries;

# GET JSON PARAMS: https://stackoverflow.com/questions/18866571/receive-json-post-with-php
$functionName = $_GET['function'];
switch ($functionName){
  case 'getAllowedBandsAndPolarization':
    $terrain_type = $_GET['terrain_type'];
    if(!$terrain_type){
      http_response_code(400);
      $response = 'Improperly formatted query.';
    } else{
      $response = getAllowedBandsAndPolarization($terrain_type);
    }
    break;
  case 'getTerrainTypes':
    $response = getTerrainTypes();
    break;
  default:
    http_response_code(400);
    $response = 'Improperly formatted query.';
    break;
}

function getAllowedBandsAndPolarization($terrain_type){
  return json_encode(Queries::allowedBandsAndPolarization($terrain_type));
}

function getTerrainTypes(){
  $terrain_types = Queries::getTerrainTypes();
  $terrainArr = [];
  foreach($terrain_types as $terrain_type){
    $bandsAndPolarization = Queries::allowedBandsAndPolarization($terrain_type['terrain_type']);
    $terrainArr[$terrain_type['terrain_type']] = $bandsAndPolarization;
  }
  return json_encode($terrainArr);
}

//// Make sure all the data was passed
//if(!$terrain_type || !$band || !$polarization){
//  http_response_code(400);
//  $response = 'Improperly formatted query.';
//} else {
//  // Fetch the data.
//  $response = getDat($terrain_type, $band, $polarization);
//}
//
//// Fetches plotting data
//function getDat($terrain_type, $band, $polarization) {
//  http_response_code(200);
//  return json_encode(Queries::getBands());
//}

echo $response;
?>
