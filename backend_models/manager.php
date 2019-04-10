<?php

  	require_once(dirname(__DIR__)."/database/dbAPI.php");
    require_once(dirname(__DIR__)."/backend_models/employee.php");

	class Manager extends Employee
	{
    	private $database;
    	
    	function __construct($EID)
    	{
    		$this->EID = $EID;
    		$this->database = new dbAPI;
    	}

    	function getStatistics()
    	{
    		// TODO: Need to discuss in a team session
    	}

    	function addEmployee($username, EmployeePositions $position)
    	{
    		$newEID = $this->database->get_employee_table_size();
    		$this->database->addEmployee($newEID, $username, $position);
    	}

    	function removeEmployee($EID)
    	{
    		$this->database->remove_employee($EID);
    	}

    	function getEmployees()
    	{
    		// depends on how database call is implemented
    		return $this->database->get_all_employees();
    	}

    }

?>
