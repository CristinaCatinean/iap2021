<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';
include_once '../order.php';

$database = new Database();

$db = $database->getConnection();
$items = new Order($db);
$records = $items->getOrders();

$itemCount = $records->num_rows;

if ($itemCount > 0) {

    $categoryArr = array();
    $categoryArr["body"] = array();
    $categoryArr["itemCount"] = $itemCount;

    while ($row = $records->fetch_assoc()) {
        array_push($categoryArr["body"], $row);
    }
    echo json_encode($categoryArr);

} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>