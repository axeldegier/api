<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="create.php">
        <input type="text" name="naam" placeholder="naam">
        <br>
        <input type="text" name="beschrijving" placeholder="beschrijving">
        <br>
        <input type="number" name="prijs" placeholder="prijs">
        <br>
        <input type="text" name="categorie_id" placeholder="categorie_id">
        
        <input type="submit" name="submit" value="create product">

    </form>
</body>

</html>

<?php
// required headers

include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

if(isset($_GET['submit'])){
    $naam = $_GET['naam'];
    $beschrijving = $_GET['beschrijving'];
    $prijs = $_GET['prijs'];
    $categorie_id = $_GET['categorie_id'];

    $product->add($naam, $beschrijving, $prijs, $categorie_id);
}
?>