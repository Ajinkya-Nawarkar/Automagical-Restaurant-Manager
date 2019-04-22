<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
<style> body {background-color: lightblue; margin-left: 100px;}</style>
</head>

<body>

<h1>Cook</h1>
<form method = "post">
<input type = "submit" name = "refresh" value = "Check Order">
<input type = "submit" name = "ready" value = "Order Ready">
</form>
<br><br>

<?php
require_once('../backend_models/cook.php');

session_start();
$EID = $_SESSION['cookeid'];
echo "Employee ID: " . $EID . "<br><br>";
$things1 = new Cook($EID);
$order = $things1->getRecentOrder($EID);
$OID = $order['oid'];

if($order == -1)
echo "there is no order right now";
else{
$itemListDeserialized = unserialize($order['itemList']);
echo "Item for order #" . $OID . " : ";
echo "<br><br>";
echo $itemListDeserialized;


if(isset($_POST['ready']))
setOrderReady($OID, $things1);

if(isset($POST['refresh']))
header("refresh: 0");
}

function setOrderReady($OID, $things1)
{
    $things1->setIsReady($OID);
    echo "<br><br>The order # " . $OID . " has been set ready";
}
?>

</body>
</html>