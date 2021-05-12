<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new mysqli('localhost','root','','shopp');

//read the name variable fro the POST request
$name = $_POST['name'];

//insert the category in the database
$sqlQuery = "INSERT INTO category
                SET name = '".$name."'";

$db->query($sqlQuery);

//$db->affected_rows returns the result of the query insert execution. If the insert is done with success the db->affected_rows will have value 1, if not 0
if ($db->affected_rows > 0) {
    //return to the front end a message 
    echo json_encode(
        array("message" => "Category created.", "created" => true)
    );
} else {
    echo json_encode(
        array("message" => "Category not created.", "created" => false)
    );
}

?>