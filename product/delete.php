<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
$result = $product->delete($id);

if ($product->delete($id) === TRUE) {
    echo "Product is succesvol verwijderd";
} else {
    echo "Error deleting record: ";
}
?>