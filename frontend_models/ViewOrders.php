<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
<style> body {background-color: lightblue; margin-left: 100px;}</style>
</head>

<body>

<h1>Cook</h1>
<button onclick = "setOrderReady()">Order Ready</button>

<?php
require_once('backend_models/cook.php');

$order = $things1->getRecentOrder();
$OID = $order['OID'];


while ($order != -1)
{
    $itemListDeserialized = deserialize($order['itemList']);
    $showItem = 0;
    if ($showItem == 0)
    {
    echo "Item for order " . $OID . ": ";
    echo "<br>";
    echo $itemListDeserialized;
    $showItem = 1;
    }
}

function setOrderReady($OID)
{
    $things1->setIsReady($OID);
    $showItem = 0;
}
?>

</body>
</html>