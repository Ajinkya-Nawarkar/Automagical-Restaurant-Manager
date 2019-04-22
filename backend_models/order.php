<?php
	require_once(dirname(__DIR__)."/database/dbAPI.php");
	class Order
		{
			private $OID;
			private $isReady;
			private $itemList = [];
			private $itemListSerialized;
			private $database;

			function __construct($OID)
			{
				$this->database = new dbAPI;
				$this->OID = $OID;
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

			function getOrderItemList()
			{
				return $this->itemList;
      }
      
      function getOrderItemListSerialized() {
        return $this->itemListSerialized;
      }

			function setIsReady($ready)
			{
				$this->isReady = $ready;
				$this->database->setOrderIsReady($this->OID, $ready);
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