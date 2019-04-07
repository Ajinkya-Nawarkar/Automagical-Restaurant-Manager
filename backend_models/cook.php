<?php

  	require_once(dirname(__DIR__)."/Database/dbAPI.php");
	require_once(dirname(__DIR__)."/Backend_Models/employee.php");

	class Cook extends Employee
		{
			private $order;
	    	private $database;

	    	function __construct($EID)
			{	
				$this->EID = $EID;
				$this->order = 1; //needs to be updated
				$this->database = new dbAPI;
	    	}	

			function getOrder()
			{
				return $this->order;
			}
			
	    	function setOrderReady($OID)
	    	{
	    		$this->order = new Order($OID);
	    		$this->order->setOrderReady();
			}
	    }

?>