<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../users.php';

$database = new Database();
$db = $database->getConnection();
$item = new User($db);

$item->pwd = $_POST['pwd'];
$item->email = $_POST['email'];

$records = $item->login();

$itemCount = $records->num_rows;

echo json_encode($itemCount);

if ($itemCount > 0) {

    $userArr = array();
    $userArr["body"] = array();
    $userArr["itemCount"] = $itemCount;
    $userArr["login"] = true;

    while ($row = $records->fetch_assoc()) {
        array_push($userArr["body"], $row);
    }
    echo json_encode($userArr);

} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "Unauthorized", "login" => false)
    );
}
?>