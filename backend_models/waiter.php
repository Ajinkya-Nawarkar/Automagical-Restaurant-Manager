<?php

  	require_once(dirname(__DIR__)."/database/dbAPI.php");
	require_once(dirname(__DIR__)."/backend_models/employee.php");
	require_once(dirname(__DIR__)."/backend_models/order.php");
	require_once(dirname(__DIR__)."/backend_models/table.php");

	class Waiter extends Employee
		{
			private $isOccupied;
			private $order;
	    	private $database;

	    	function __construct($EID)
	    	{
	    		$this->EID = $EID;
	    		$this->isOccupied = false;
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
	    		return $this->database->get_waiter_table_assignment($this->EID);
	    	}

			function initiateOrder()
			{
				$this->order = new Order();
			}   

			function addItemToOrder($itemID)
			{
				$this->order->addItemToOrder($itemID);
			}	

			function createOrder()
			{
				$this->order->addOrderToDB();
			}

			function setTableStateUnclean($TID)
			{
				$table_obj = new Table($TID);
				$table_obj->setTableStateUnclean();
			}

	    }

?>