<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");

	// TODO: Database needs to have a function to 
	// create and return a list of table objects.

	class TableState
	{
		const open = 0;
		const reserved = 1;
		const clean = 2;
		const unclean = 3;
	}

	class Table
	{
		private $TID;
		private $state;
		private $database;

		function __construct($TID)
		{
			$this->database = new dbAPI;
			$this->TID = $TID;
			$this->state = TableState::open;
		}

		function getTID()
		{
			return $this->TID;
		}

		function getState()
		{
			return $this->state;
		}

		function setTableStateOpen()
		{
			$this->state = TableState::open;
			$this->database->updateTableState($this);
		}

		function setTableStateReserved()
		{
			$this->state = TableState::reserved;
			$this->database->updateTableState($this);
		}

		function setTableStateClean()
		{
			$this->state = TableState::clean;
			$this->database->updateTableState($this);
		}

		function setTableStateUnclean()
		{
			$this->state = TableState::unclean;
			$this->database->updateTableState($this);
		}

    }

?>