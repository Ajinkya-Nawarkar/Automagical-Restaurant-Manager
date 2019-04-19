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

    public function test() {
      $query = "SELECT tid FROM ARM_Table WHERE tid=1";
      $result = $this->connection->query($query);
      echo count($result);
    }

    // return employee
    public function getEmployee($username) {
      $query = "SELECT * FROM ARM_Employee WHERE username='". $username . "'";
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
      return $result->fetch_assoc();
    }
    public function get_free_waiter_ID_list() {
      $query = "SELECT eid FROM ARM_Waiter WHERE occupied=0";
      $result = $this->connection->query($query);
      // return
    }

    public function set_waiter_table($free_waiter_EID, $open_table_TID) {
      $query  = "UPDATE ARM_Waiter SET tid = '$open_table_TID' WHERE eid = '$free_waiter_EID'";
      $this->connection->query($query);
    }

    // manager.php
    public function get_employee_table_size() {
      // We don't need this one since eid auto increments
    }
    public function addEmployee($eid, $username, $position) {

    }
    public function remove_employee($eid) {

    }
    public function get_all_employees() {

    }

    // order.php
    public function get_OID_table_size() {
      $query = "SELECT COUNT(*) FROM ARM_Order";
      $result = $this->connection->query($query);
      echo $result;
    }
    public function addOrderToDB($order) {
      // gotta make sure this will work
    }
    public function setOrderIsReady($oid, $ready) {

    }
    // table.php

    public function updateTableState() {
    }

    // waiter.php
    public function get_waiter_table_assignment($eid) {

    }
  }
?>