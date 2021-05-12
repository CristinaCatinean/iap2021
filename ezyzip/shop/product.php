<?php
class Product {

    private $db;
    private $db_table = "product";
    // DB Columns
    public $id;
    public $name;
    public $description;
    public $created;
    public $price;
    public $category_id;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // POST create product
    public function createProduct()
    {
        $sqlQuery = "INSERT INTO ". $this->db_table .
            " SET name = '".$this->name."',
                    category_id = '".$this->category_id."',
                    description = '".$this->description."',
                    created = '".$this->created."',
                    price = '".$this->price."'"
        ;
        
        $this->db->query($sqlQuery);

        if ($this->db->affected_rows > 0) {
            return true;
        }
            return false;
    }

      // GET all products
      public function getProducts()
      {
          $sqlQuery = "SELECT p.id, p.name, p.description, p.created, p.price, p.category_id, category.name as category_name FROM " . $this->db_table . " p INNER JOIN category ON category_id = category.id";
           
          $this->result = $this->db->query($sqlQuery);
  
          return $this->result;
      }
}
?>