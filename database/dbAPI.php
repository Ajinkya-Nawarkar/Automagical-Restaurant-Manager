<?php

  class dbAPI {
    public $connection;
    
    public function __construct() {
      $hn = "sql9.freemysqlhosting.net";
      $un = "sql9288709";
      $pw = "gGdDxMZUzg";
      $db = "sql9288709";
      $this->connection = new mysqli($hn, $un, $pw, $db);
      if ($this->connection->connect_error) {
        die($this->connection->connect_error);
      }
    }
    
    // return employee (for login.php)
    public function getEmployee($username) {
      $query = "SELECT * FROM ARM_Employee WHERE username='$username'";
      $result = $this->connection->query($query);
      return $result->fetch_assoc();
    }


    // busser.php
    public function get_unclean_tables_list() {
      $query = "SELECT * FROM ARM_Table WHERE state='unclean'";
      $result = $this->connection->query($query);
      return $result->fetch_assoc();
    }


    // cook.php
    public function get_recent_order() { 
      $query = "SELECT * FROM ARM_Order WHERE isReady=0";
      $result = $this->connection->query($query);
      while($row = $result->fetch_array())
      {
        if ($row['isReady'] == 0)
          return $row;
      }
      return -1; 
    }


    // host.php
    public function get_open_tables_list() {
      $query = "SELECT tid FROM ARM_Table WHERE state='open'";
      $result = $this->connection->query($query);
      return $result;
    }
    public function get_free_waiter_ID_list() {
      $query = "SELECT eid FROM ARM_Waiter WHERE occupied=0";
      $result = $this->connection->query($query);
      return $result;
    }
    public function set_waiter_table($free_waiter_EID, $open_table_TID) {
      $query = "UPDATE ARM_Waiter SET tid = '$open_table_TID' WHERE eid = '$free_waiter_EID'";
      $this->connection->query($query);
    }


    // manager.php
    public function get_employee_table_size() {
      // We don't need this one since eid auto increments
      $query = "SELECT COUNT(*) FROM ARM_Employee";
      $this->connection->query($query);
      return $result;
    }
    public function addEmployee($eid, $username, $position) {
      $query = "INSERT INTO `ARM_Employee` (`eid`, `username`, `position`) VALUES (NULL, '$username', '$position')";
      $this->connection->query($query);
      return $result;
    }
    public function remove_employee($eid) {
      $query = "DELETE FROM `ARM_Employee` WHERE `ARM_Employee`.`eid` = '$eid'";
      $this->connection->query($query);
    }
    public function get_all_employees() {
      $query = "SELECT * FROM ARM_Employee";
      $result = $this->connection->query($query);
      return $result;
    }

    // order.php
    public function get_OID_table_size() {
      $query = "SELECT COUNT(*) FROM ARM_Order";
      $result = $this->connection->query($query);
      $row = $result->fetch_assoc();
      return $row['COUNT(*)'];
    }
    public function addOrderToDB($order) {
      // gotta make sure this will work
      
    }
    public function setOrderIsReady($oid, $ready) {
      $query = "UPDATE `ARM_Order` SET `isReady` = '$ready' WHERE `ARM_Order`.`oid` = '$oid'";
      $this->connection->query($query);
    }

    // table.php
    public function updateTableState($table) {  // I'm not sure how this one needs to
      switch ($table->getState()) {
        case 0:
          $st8 = "open";
          break;
        case 1:
          $st8 = "reserved";
          break;
        case 2:
          $st8 = "unclean";
          break;
      }
      $tid = $table->getTID();
      $query = "UPDATE `ARM_Table` SET `state` = '$st8' WHERE `ARM_TABLE`.`tid` = '$tid'";
      $this->connection->query($query);
    }

    // waiter.php
    public function get_waiter_table_assignment($eid) {
      $query = "SELECT tid FROM ARM_Waiter WHERE eid = '$eid'";
      $result = $this->connection->query($query);
      return $result;
    }
  }
?>
