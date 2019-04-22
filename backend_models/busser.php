<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");
	require_once(dirname(__DIR__)."/backend_models/employee.php");
	require_once(dirname(__DIR__)."/backend_models/table.php");

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
			$result = $this->database->get_unclean_tables_list();
			
			$unclean_tables = []; 
    		while($row = $result->fetch_array())
    		{
    			array_push($unclean_tables, $row[0]);
    		}

			if (count($unclean_tables) > 0)
			{
				return $unclean_tables;
			}
			return -1;
		}

		function setTableStateOpen($unclean_table_TID)
		{
			$this->table_obj = new Table($unclean_table_TID);
			$this->table_obj->setTableStateOpen();
		}
	}

?>
