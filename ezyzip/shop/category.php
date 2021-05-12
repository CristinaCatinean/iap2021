<?php
class Category {

    private $db;
    private $db_table = "category";
    // DB Columns
    public $id;
    public $name;
    public $result;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // POST create category
    public function createCategory()
    {
        $sqlQuery = "INSERT INTO ". $this->db_table .
            " SET name = '".$this->name."'"
        ;
        
        $this->db->query($sqlQuery);

        if ($this->db->affected_rows > 0) {
            return true;
        }
            return false;
    }

     // GET all categories
     public function getCategories()
     {
         $sqlQuery = "SELECT id, name FROM " . $this->db_table . "";
         $this->result = $this->db->query($sqlQuery);
 
         return $this->result;
     }
}
?>