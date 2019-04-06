<?php

  	require_once(dirname(__DIR__)."/Database/dbAPI.php");
	require_once(dirname(__DIR__)."/Backend_Models/employee.php");

	class Host extends Employee
		{
	    	private $username;
	    	private $database;

	    	function __construct($username)
	    	{
	    		$this->username = $username;
	    		$this->database = new dbAPI;
	    	}

	    	function assignTable()
	    	{
	    		$open_tables = $this->database->get_open_tables_list();
	    		$open_table_TID = $open_tables[array_rand($open_tables)];
	    		$table_obj = new Table($open_table_TID, TableState::open);

	    		$free_waiters = $this->database->get_free_waiter_ID_list();
	    		$free_waiter_EID = $free_waiters[array_rand($free_waiters)];
	    		$waiter_obj = new Waiter($free_waiter_EID);

	    		$this->database->set_waiter_table($free_waiter_EID, $open_table_TID);

	    		$table_obj->setTableStateReserved();
	    		$waiter_obj->setIsOccupied(true);

	    	}
	    }

?>