<?php

	require_once(dirname(__DIR__)."/Database/dbAPI.php");
	require_once(dirname(__DIR__)."/Backend_Models/employee.php");
	require_once(dirname(__DIR__)."/Backend_Models/order.php");

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