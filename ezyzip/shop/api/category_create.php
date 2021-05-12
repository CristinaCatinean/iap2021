<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../category.php';

$database = new Database();
$db = $database->getConnection();

$item = new Category($db);

$item->name = $_POST['name'];
$item->created = date('Y-m-d H:i:s');

if ($item->createCategory()) {

    http_response_code(201);
    echo json_encode(
        array("message" => "Category created.", "created" => true)
    );
    
} else{
    echo json_encode(
        array("message" => "Category not created.", "created" => false)
    );
}
?>