<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db = new mysqli('localhost','root','','shopp');

$sqlQuery = "SELECT 
                p.id, 
                p.name, 
                p.description, 
                p.price, 
                p.category_id, 
                category.name as category_name 
                FROM product p 
                INNER JOIN category ON category_id = category.id";

$result = $db->query($sqlQuery);

$products["products"] = array();

while ($db_row = $result->fetch_assoc()) {
    array_push($products["products"], $db_row);
}

if (count($products["products"]) == 0) {

    echo json_encode(
        array("message" => "No products.", "products_found" => false)
    );

} else {

    echo json_encode(
        array("result" => $products, "products_found" => true)
    );
}

?>