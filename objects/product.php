<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read_all()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }
  //read one product
  function read_one($id){
    $query = "SELECT * FROM " . $this->table_name . " WHERE id=".$id;
    $result = $this->conn->query($query);
    return $result;
 }

// one product
function delete($id){
    $query = "DELETE FROM " . $this->table_name . " WHERE id=".$id;
    $result = $this->conn->query($query);
    return $result;
 }

//add one product

 function add($naam, $beschrijving, $prijs, $categorie_id){
    $query = "INSERT INTO " . $this->table_name." (naam, beschrijving, prijs, categorie_id, toegevoegd_op, gewijzigd_op) VALUES ('$naam', '$beschrijving', '$prijs', '$categorie_id', NOW(), NOW())";
    echo "Your product has successfully been added.";
    if ($this->conn->query($query) === TRUE) {
 } else {
    echo "Something went wrong: " . $query . "<br>" . $this->conn->error;
   }
 }

 function update($id, $naam, $beschrijving, $prijs, $categorie_id){
    $query = "UPDATE product SET `id`='$id', `naam`='$naam', `beschrijving`='$beschrijving', `prijs`= $prijs, `categorie_id`= $categorie_id WHERE id=$id";
	
    echo "Your product has successfully been updated.";
    if ($this->conn->query($query) === TRUE) {
 } else {
    echo "Something went wrong: " . $query . "<br>" . $this->conn->error;
   }
 }

 //search one product
 function search()
    {
        $val = "";
        if(isset($_GET['naam'])) {
            $val = $_GET['naam'];
        }
        // select all query
        $query = "SELECT id, naam, beschrijving FROM " . $this->table_name. " WHERE naam LIKE '$val%' ORDER BY naam";
        $result = $this->conn->query($query);
        return $result;
    }

}
