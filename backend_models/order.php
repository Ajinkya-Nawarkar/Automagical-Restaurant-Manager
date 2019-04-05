<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");

	class Order
		{
			private $OID;
			private $isReady;
			private $database;

			function __construct()
			{
				$this->database = new dbAPI;
				$this->OID = getNewOID();
				$this->isReady = false;
			}

			function getOID()
			{
				return $this->OID;
			}

			function getIsReady()
			{
				return $this->isReady;
			}

			function getNewOID()
			{
				return $this->database->get_OID_table_size();
			}

			function setIsReady($ready)
			{
				$this->isReady = $ready;
			}

			function addToOrder($itemID)
			{
				$this->database->add_to_order($itemID);
			}

			function addOrderToDB()
			{
				$this->database->addOrderToDB($this);
			}

	    }

?>