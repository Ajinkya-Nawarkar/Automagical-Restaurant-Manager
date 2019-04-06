<?php

  	require_once(dirname(__DIR__)."/Database/dbAPI.php");
	require_once(dirname(__DIR__)."/Backend_Models/employee.php");

	class Waiter extends Employee
		{
			private $isOccupied;
	    	private $database;

	    	function __construct($EID)
	    	{
	    		$this->EID = $EID;
	    		$this->database = new dbAPI;
	    	}

	    	function getIsOccupied()
	    	{
	    		return $this->isOccupied;  
	    	}

	    	function setIsOccupied($occupied)
	    	{
	    		$this->isOccupied = $occupied; 
	    	}

	    	function getTableAssignment()
	    	{
	    		$this->database->get_waiter_table_assignment($this->EID);
	    	}


	    }

?>