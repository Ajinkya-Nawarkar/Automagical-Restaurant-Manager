<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
<style> body {background-color: lightblue; margin-left: 100px;}</style>
</head>

<body>

<h1>Cook</h1>
<input type="button" onclick = "setOrderReady()" value = "Order Ready">
<br><br>

<?php
require_once('../backend_models/cook.php');

session_start();
$EID = $_SESSION['cookeid'];
echo "Employee ID: " . $EID . "<br><br>";
$things1 = new Cook($EID);
$order = $things1->getRecentOrder($EID);
$OID = $order['oid'];
echo $OID;

$itemListDeserialized = unserialize($order['itemList']);
echo "Item for order #" . $OID . " : ";
echo "<br>";
echo $itemListDeserialized;
    
function setOrderReady($OID)
{
    $things1->setIsReady($OID);
    echo ("<script> location.href='frontend_models/ViewOrders.php' </script>");
}
?>

</body>
</html>