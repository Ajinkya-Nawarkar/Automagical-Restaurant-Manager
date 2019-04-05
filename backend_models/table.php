<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");

	class Table
		{
			private $TID;
			private $isReady;
			private $database;

			function __construct()
			{
				$this->database = new dbAPI;
				$this->TID = getNewOID();
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

	    }

?>