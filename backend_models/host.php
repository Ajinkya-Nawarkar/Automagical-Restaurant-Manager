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

	    	function assignTable()
	    	{
	    		$loop_counter = 0;
	    		do 
	    		{
		    		$open_tables = $this->database->get_open_tables_list();
		    		$free_waiters = $this->database->get_free_waiter_ID_list();
		    		$loop_criterion = sizeof($open_tables) + sizeof($free_waiters);
		    		$loop_counter = $loop_counter + 1; 
		    	}while(($loop_criterion < 2) && ($loop_counter < 500));

		    	if ($loop_counter < 500)
		    	{
		    		$open_table_TID = $open_tables[array_rand($open_tables)];
		    		$table_obj = new Table($open_table_TID);

		    		$free_waiter_EID = $free_waiters[array_rand($free_waiters)];
		    		$waiter_obj = new Waiter($free_waiter_EID);

		    		$this->database->set_waiter_table($free_waiter_EID, $open_table_TID);

		    		$table_obj->setTableStateReserved();
		    		$waiter_obj->setIsOccupied(true);

		    		echo "Table and Waiter assigned!";
		    	}
		    	else
		    	{
		    		echo "No open Table or free Waiter";
		    	}

	    	}
	    }

?>