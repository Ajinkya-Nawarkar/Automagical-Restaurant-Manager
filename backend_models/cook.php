<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");
	require_once(dirname(__DIR__)."/backend_models/employee.php");
	require_once(dirname(__DIR__)."/backend_models/order.php");

	class Cook extends Employee
		{
			private $order;
			private $database;

			function __construct($EID)
			{	
				$this->EID = $EID;
				$this->database = new dbAPI;
			}	

			function getRecentOrder()
			{
				return $this->database->get_recent_order();
			}
			
			function setIsReady($OID)
			{
				$this->order = new Order($OID);
				$this->order->setIsReady();
			}
		}

?>