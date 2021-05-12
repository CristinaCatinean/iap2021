<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//connect to the database
$db = new mysqli('localhost','root','','shopp');

//read the values of the parameters sent 
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$sqlQuery = "INSERT INTO product
             SET name = '".$name."',
                category_id = '".$category_id."',
            	description = '".$description."',        
                price = '".$price."'";

//execute the query
$db->query($sqlQuery);

//$db->affected_rows returns the result of the query insert execution. If the insert is done with success the db->affected_rows will have value 1, if not 0
if ($db->affected_rows > 0) {
    //return to the front end a message 
    echo json_encode(
        array("message" => "Product created.", "created" => true)
    );
} else {
    echo json_encode(
        array("message" => "Product not created.", "created" => false)
    );
}
?>