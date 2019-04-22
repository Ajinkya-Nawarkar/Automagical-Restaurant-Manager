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

	    	function getEID()
	    	{
	    		return $this->EID;
	    	}

	    	function getIsOccupied()
	    	{
	    		return $this->isOccupied;  
	    	}

	    	function setIsOccupied($occupied)
	    	{
	    		$this->isOccupied = $occupied; 
	    		$this->database->setWaiterIsOccupied($this);
	    	}

	    	function getTableAssignment()
	    	{
	    		$result =  $this->database->get_waiter_table_assignment($this->EID);
	    		$row = $result->fetch_array())
	    		return $row[0];
	    	}

			function getNewOID()
			{
				return $this->database->get_OID_table_size();
			}

			function initiateOrder()
			{
				$OID = $this->getNewOID();
				$this->order = new Order($OID);
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