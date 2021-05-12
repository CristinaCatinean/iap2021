<?php
class Contact {

    private $db;
    private $db_table = "contact";
    // DB Columns
    public $id;
    public $title;
    public $user_id;
    public $created;
    public $message;
    public $result;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET all contacts
    public function createContact()
    {
        $sqlQuery = "INSERT INTO ". $this->db_table .
            " SET title = '".$this->title."',
                    user_id = '".$this->user_id."',
                    message = '".$this->message."',
                    created = '".$this->created."'"
        ;
        
        $this->db->query($sqlQuery);

        if ($this->db->affected_rows > 0) {
            return true;
        }
            return false;
    }
}
?>