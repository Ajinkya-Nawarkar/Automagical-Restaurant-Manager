<?php

  require_once(dirname(__DIR__)."/Database/dbAPI.php");
	require_once(dirname(__DIR__)."/Backend_Models/employee.php");

  class Busser extends Employee
	{
    private $isOccupied;
    private $table_obj;
    private $database;

    function __construct($EID)
    {
      $this->EID = $EID;
      $this->isOccupied = false;
      $this->database = new dbAPI;
    }

    function getDirtyTables()
    {
         $unclean_tables = $this->database->get_unclean_tables_list();
         while(sizeof($unclean_tables) < 1)
         {
           $unclean_table_TID = $unclean_tables[array_rand($unclean_tables)];
           $this->table_obj = new Table($unclean_table_TID);

           return $unclean_table_TID;
	        }

          return -1;
      }

      function setTableStateOpen()
      {
          $this->table_obj->setTableStateOpen();
      }
  }

?>
