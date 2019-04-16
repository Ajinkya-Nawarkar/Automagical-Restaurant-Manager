<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  class dbAPI {
    public $connection;
    
    public function __construct() {
      if (TRUE) {
        $hn = "pluto.cse.msstate.edu";
        $un = "gsj38";
        $pw = "ab1234";
        $db = "gsj38"; 
      } else {
        $hn = "localhost";
        $un = "root";
        $pw = "";
        $db = "arm";
      }
      $this->connection = new mysqli($hn, $un, $pw, $db);
      if ($this->connection->connect_error) {
        die($this->connection->connect_error);
      }
    }
    
    // return employee
    public function getEmployee($username) {
      $query = "SELECT * FROM ARM_Employee WHERE username='". $username . "'";
      $result = $this->connection->query($query);
      return $result->fetch_assoc();
    }

    // The following methods are called in the backend file host.php
    public function get_open_tables_list() {
      $query = "SELECT * FROM ARM_Table WHERE state='open'";
      $result = $this->connection->query($query);
      return $result->num_rows;
    }
    
  }
?>