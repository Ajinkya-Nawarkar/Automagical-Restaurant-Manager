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
				$this->database = new dbAPI;
			}	

			function getOrder()
			{
				return $this->database->get_order();
			}
			
			function setOrderReady($OID)
			{
				$this->order = new Order($OID);
				$this->order->setOrderReady();
			}
		}

?>