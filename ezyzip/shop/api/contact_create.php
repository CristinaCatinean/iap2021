<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../contact.php';

$database = new Database();
$db = $database->getConnection();

$item = new Contact($db);

$item->title = $_POST['title'];
$item->user_id = $_POST['user_id'];
$item->message = $_POST['message'];
$item->created = date('Y-m-d H:i:s');

if ($item->createContact()) {

    http_response_code(201);
    echo json_encode(
        array("message" => "Contact created.", "created" => true)
    );
    
} else{
    echo json_encode(
        array("message" => "Contact not created.", "created" => false)
    );
}
?>