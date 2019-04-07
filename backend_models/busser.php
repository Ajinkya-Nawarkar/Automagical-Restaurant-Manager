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

	  if($unclean_tables)
		{
		  $unclean_table_TID = $unclean_tables[array_rand($unclean_tables)];
		  $table_obj = new Table($unclean_tables_TID);
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
