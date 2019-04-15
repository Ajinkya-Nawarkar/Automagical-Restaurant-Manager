<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
<style> body {background-color: lightblue; margin-left: 100px;}</style>
</head>

<body>

<?php
require_once('cook.php');
$things1 = new cook;
?>

<h1>Cook</h1>
<button onclick = "showOrder()">Show Order</button>
<button onclick = "orderReady()">Order Ready</button>

<div id = "order" style = "display:none">
    <h2>Order:</h2>
    <p>Item 1</p>
    <p>Item 2</p>
    <p>Item 3</p>
</div>


<script>
    function showOrder()
    {
        var x = document.getElementById("order");
          if (x.style.display === "none")
          x.style.display = "block";
    }
    
    function orderReady()
    {
        var x = document.getElementById("order");
          if (x.style.display === "block")
          x.style.display = "none";
    }
</script>
</body>
</html>