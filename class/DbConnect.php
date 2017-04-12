<?php
 class DbConnect {
    public $db;
    
    function __construct() {
        $this->db = new mysqli(SERVER,USER,PASSWORD,DB);
        
        // Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        } 
        
    }
    function __destruct() {
//        $this->db->exit();
    }
  }