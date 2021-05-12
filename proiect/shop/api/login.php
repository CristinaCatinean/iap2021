<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$db = new mysqli('localhost','root','','shopp');

$pwd = $_POST['pwd'];
$email = $_POST['email'];

$sqlQuery = "SELECT 
                id, 
                name, 
                email, 
                role 
            FROM user 
            WHERE email = '" . $email. "' AND pwd = '" . $pwd . "' LIMIT 1";

//execute and get the result of the query
//if there is no match in the database for the user associated with the email and password that was sent, the result of the query will be NULL
// if there is a match the result will be an array with the information about the user 
$result = $db->query($sqlQuery)->fetch_assoc();

if ($result == NULL) {

    echo json_encode(
        array("message" => "Unauthorized. User not found in the database.", "login" => false)
    );

} else {

    echo json_encode(
        array("result" => $result, "login" => true)
    );
}
?>