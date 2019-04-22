<?php

  	require_once(dirname(__DIR__)."/database/dbAPI.php");
	require_once(dirname(__DIR__)."/backend_models/employee.php");
	require_once(dirname(__DIR__)."/backend_models/table.php");
	require_once(dirname(__DIR__)."/backend_models/waiter.php");


	class Host extends Employee
		{
	    	private $database;

	    	function __construct($EID)
	    	{
	    		$this->EID = $EID;
	    		$this->database = new dbAPI;
	    	}

	    	function getOpenTables()
	    	{
	    		return $this->database->get_open_tables_list();
	    	}

	    	function getFreeWaiters()
	    	{
	    		return $this->database->get_free_waiter_ID_list();
	    	}

	    	function assignTable($open_table_TID, $free_waiter_EID)
	    	{
	    		$table_obj = new Table($open_table_TID);
	    		$waiter_obj = new Waiter($free_waiter_EID);

	    		$this->database->set_waiter_table($free_waiter_EID, $open_table_TID);

	    		$table_obj->setTableStateReserved();
	    		$waiter_obj->setIsOccupied(true);
	    	}
	    }

?>
