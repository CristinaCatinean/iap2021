<?php
class Order {

    private $db;
    private $db_table = "onlineorders";
    // DB Columns
    public $id;
    public $user_id;
    public $created;    
    public $product_id;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // POST create order
    public function createOrder()
    {
        $sqlQuery = "INSERT INTO ". $this->db_table .
            " SET user_id = '".$this->user_id."',
                    product_id = '".$this->product_id."',
                    created = '".$this->created."'"                    
        ;
        var_dump($sqlQuery);
        $this->db->query($sqlQuery);

        if ($this->db->affected_rows > 0) {
            return true;
        }
            return false;
    }

      // GET all orders
      public function getOrders()
      {
        $sqlQuery = "SELECT 
                        o.id as order_id, 
                        o.user_id as user_id, 
                        o.product_id as product_id, 
                        u.name as user_name, 
                        u.email as user_email, 
                        p.name as product_name, 
                        p.description as product_description, 
                        p.price as product_price, 
                        c.id as category_id, 
                        c.name as category_name
                    FROM onlineorders o
                    INNER JOIN user u on o.user_id = u.id
                    INNER JOIN product p on o.product_id = p.id
                    INNER JOIN category c on c.id = p.category_id"
        ;
           
          $this->result = $this->db->query($sqlQuery);
  
          return $this->result;
      }
}
?>