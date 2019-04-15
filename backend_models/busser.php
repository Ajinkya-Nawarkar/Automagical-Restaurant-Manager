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

			if (count($unclean_tables) > 0)
			{
				return $unclean_tables;
			}

			return -1;
		}

		function setTableStateOpen()
		{

			$unclean_tables = $this->database->get_unclean_tables_list();
			$tableCount = 0;

			while($tableCount < count($unclean_tables))
			{
				$unclean_table_TID = $unclean_tables[$tableCount];
				$table_obj = new Table($unclean_table_TID);
				$tableCount++;
				$this->table_obj->setTableStateOpen();
			}

		}

	}

?>
