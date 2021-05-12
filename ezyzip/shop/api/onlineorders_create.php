<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../order.php';

$database = new Database();
$db = $database->getConnection();

$item = new Order($db);

$item->user_id = $_POST['user_id'];
$item->product_id = $_POST['product_id'];
$item->created = date('Y-m-d H:i:s');

if ($item->createOrder()) {

    http_response_code(201);
    echo json_encode(
        array("message" => "Order created.", "created" => true)
    );
    
} else{
    echo json_encode(
        array("message" => "Order not created.", "created" => false)
    );
}
?>