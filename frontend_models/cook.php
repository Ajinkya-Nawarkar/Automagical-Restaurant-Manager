<!DOCTYPE html>

<html>

<head>
<title>CookPage</title>
</head>

<body>
<h1>Cook</h1>
<button onclick = "showOrder()">Show Order</button>
<div id = "order" style = "display:none">
    <h2>Order:</h2>
    <p>Item 1</p>
    <p>Item 2</p>
    <p>Item 3</p>
</div>
</body>

<?php
    showOrder()
    {
        var x = document.getElementById("order");
        if (x.style.display === "none") {
          x.style.display = "block";
        }
    }
?>

</html>