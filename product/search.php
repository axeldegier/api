<html>
<head>
</head>
<body>
<div id="search">
    <input type="text" placeholder="Search..">
</div>
<?php
// required headers
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
$result = $product->search($search);
$num = $result->num_rows;
// check if more than 0 record found
$val = "";
if( isset($_POST['characters']) ) {
  $val = $_POST['characters'];
}
if($num>0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="product_info">
        <h6 class="product_name"><?= $row['naam']; ?></h6>
        <div class="product_price"><?= $row['beschrijving']; ?></div>
        </div>
<?php
    }
} ?>

</body>
</html>