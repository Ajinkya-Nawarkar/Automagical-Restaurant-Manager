<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
<style> body {background-color: lightblue; margin-left: 100px;}</style>
</head>

<body>

<h1>Cook</h1>
<input type="button" onclick = "setOrderReady()" value = "Order Ready">

<?php
require_once('backend_models/cook.php');

while ($order == -1)
{
    check_for_new_orders();
}

function check_for_new_orders()
{
    $things1 = new Cook;
    $order = $things1->getRecentOrder();
    $OID = $order['oid'];
    while (isset($_POST['button']) == 0)
    {
        $itemListDeserialized = deserialize($order['itemList']);
        echo "Item for order " . $OID . ": ";
        echo "<br>";
        echo $itemListDeserialized;
    }
}
    
function setOrderReady($OID)
{
    $things1->setIsReady($OID);
}
?>

</body>
</html>