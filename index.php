<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>FrontPage</title>
<style> body {background-color: lightblue; margin-left: 50px;}</style>
</head>

<body>
<h1>Automagical Restaurant Manager</h1>
<br>
<h3>Login</h3>

	<form method = "post" action = "index.php">
	  Username: <br>
	  <input type = "text" name = "username" style = "background-color:lightblue;">
	  <br>
	  <br>
	  <input type = "submit" value = "Login" name = "submit">
	  <br><br>
	  <br><br>
	</form>

	<?php
	require_once('database/dbAPI.php');
	           
	 if(isset($_POST['submit']))
	 {
	    choosePage();
	 }
	 
		function choosePage() 
		{
			$usernameErr = "";
		  	if (empty($_POST['username']))
		  	{
		   		$usernameErr = "Please fill in existing username";
		  	}
		  	else
		  	{
		    	$username = isset($_POST['username']);
		    	$db = new dbAPI;
		    	$userInfo = $db->getEmployee($_POST['username']);
		 
		    	if($userInfo['position'] == "Manager")
		        	echo ("<script>location.href='Manager.php'</script>");
		    	else if($userInfo['position'] == "Host")
		        	echo ("<script>location.href='frontend_models/host.php'</script>");
		    	else if($userInfo['position'] == "Waiter")
		        	echo ("<script>location.href='frontend_models/waiter.php'</script>");
		    	else if($userInfo['position'] == "Cook")
		       		echo ("<script>location.href='frontend_models/ViewOrders.php'</script>");
		    	else if($userInfo['position'] == "Busser")
		       		echo ("<script>location.href='frontend_models/busser.php'</script>");
		    	else 
		    		echo $usernameErr;
		  	}
		}
	?>

</body>
</html>
