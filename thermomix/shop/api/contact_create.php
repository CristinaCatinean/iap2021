<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//connect to the database
$db = new mysqli('localhost','root','','shopp');

//read the parameters sent. As this is a POST request the parameter values will be red by $_POST[]"
$title = $_POST['title'];
$user_id = $_POST['user_id'];
$message = $_POST['message'];

//insert the values in the database
$sqlQuery = "INSERT INTO contact
               SET 
                title = '".$title."',
                user_id = '".$user_id."',
                message = '".$message."'";

$db->query($sqlQuery);

//$db->affected_rows returns the result of the query insert execution. If the insert is done with success the db->affected_rows will have value 1, if not 0
if ($db->affected_rows > 0) {
    //return to the front end a message 
    echo json_encode(
        array("message" => "Contact created.", "created" => true)
    );
} else {
    echo json_encode(
        array("message" => "Contact not created.", "created" => false)
    );
}
?>