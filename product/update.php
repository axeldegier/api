<?php
header("Access-Control-Allow-Origin: *");

include_once '../config/database.php';
include_once '../objects/product.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
$result = $product->read_one($id);
$num = $result->num_rows;

// check if more than 0 record found
if($num>0){
    // products array
    $products_arr=array();
    // product data ophalen
    while ($row = $result->fetch_assoc()){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $product_item=array(
            "id" => $row['id'],
            "naam" => $row['naam'],
            "beschrijving" => html_entity_decode($row['beschrijving']),
            "prijs" => $row['prijs'],
            "categorie_id" => $row['categorie_id']
        );
    }
   


}
       ?>
       
<form name='update' id='update' method='post'>
                                <div class='form-group'>
                                    <label for='naam'>naam</label>
                                    <input value='<?php echo $row['naam'] ?>' name='naam' id='naam' type='text' class='form-control' placeholder='naam' />
                                </div>

                               
                                <div class='form-group'>
                                    <label for='beschrijving'>beschrijving </label>
                                    <input value='<?php echo $row['beschrijving'] ?>' name='beschrijving' id='beschrijving' type='text' class='form-control' placeholder='beschrijving' />
                                </div>

                                <div class='form-group'>
                                    <label for='prijs'>prijs </label>
                                    <input value='<?php echo $row["prijs"] ?>' name='prijs' id='prijs' type='number' class='form-control' placeholder='prijs' />
                                </div>

                                <div class='form-group'>
                                    <label for='categorie_id'>categorie_id </label>
                                    <input value='<?php echo $row["categorie_id"] ?>' name='categorie_id' id='categorie_id' type='number' class='form-control' placeholder='categorie_id' />
                                </div>


                                <div class='form-group'>
                                    <button name='btnupdate' id='update' class='btn btn-primary btn-block'>Update</button>

                                </div>

                            </form>


                            <?php
if( isset($_POST['btnupdate']) ) {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $categorie_id = $_POST['categorie_id'];
    $id = $_GET['id'];

    $product->update($id, $naam, $beschrijving, $prijs, $categorie_id);

}

   ?>

