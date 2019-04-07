<?php

	require_once(dirname(__DIR__)."/database/dbAPI.php");

	class Order
		{
			private $OID;
			private $isReady;
			private $itemList = [];
			private $itemListSerialized;
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

			function getOrderItemList()
			{
				return $this->itemList;
			}

			function setIsReady($ready)
			{
				$this->isReady = $ready;
			}

			function setOrderItemList($itemListSerialized)
			{
				$this->itemList = unserialize($itemListSerialized);
			}

			function addItemToOrder($itemID)
			{
				$this->itemList[] = $itemID;
			}

			function addOrderToDB()
			{
				if (sizeof($this->itemList) > 0)
				{
					$this->itemListSerialized = serialize($this->itemList);
					$this->database->addOrderToDB($this);
				}
				else
				{
					echo "Cannot add empty order to the database";
				}
			}

	    }

?>