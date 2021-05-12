<?php
class User {

    private $db;
    private $db_table = "user";
    // DB Columns
    public $id;
    public $email;
    public $name;
    public $role;
    public $pwd;
    public $result;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET all users
    public function getUsers()
    {
        $sqlQuery = "SELECT id, name, email, role, pwd, created FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);

        return $this->result;
    }

    public function login()
    {        
        $sqlQuery = "SELECT id, name, email, role FROM " . $this->db_table . " WHERE email = '" . $this->email. "' AND pwd = '" . $this->pwd . "'";
        
        $this->result = $this->db->query($sqlQuery);
        
        return $this->result;
    }

}
?>