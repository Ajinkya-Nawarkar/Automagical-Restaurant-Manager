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
	?>

</body>
</html>

<?php
	function choosePage() 
	{
		$usernameErr = "";
	  	if (empty($_POST['username']))
	  	{
	   		$usernameErr = "Please fill in a username!";
	  	}
	  	else
	  	{
	    	$db = new dbAPI;
            $userInfo = $db->getEmployee($_POST['username']);
            session_start();
	 
	    	if($userInfo['position'] == "Manager")
	        	echo ("<script>location.href='frontend_models/manager.php'</script>");
            else if($userInfo['position'] == "Host")
            {
                $_SESSION['hosteid'] = $userInfo['eid'];
                header("Location:frontend_models/host.php");
                echo ("<script>location.href='frontend_models/host.php>'</script>");
            }
            else if($userInfo['position'] == "Waiter")
            { 
                $_SESSION['waitereid'] = $userInfo['eid'];
                header("Location:frontend_models/watier.php");
                echo ("<script>location.href='frontend_models/waiter.php'</script>");
            }
            else if($userInfo['position'] == "Cook")
            {
                $_SESSION['cookeid'] = $userInfo['eid'];
                header("Location:frontend_models/ViewOrders.php");
                echo ("<script>location.href='frontend_models/ViewOrders.php'</script>");
            }
            else if($userInfo['position'] == "Busser")
            {
                $_SESSION['bussereid'] = $userInfo['eid'];
                header("Location:frontend_models/busser.php");
                echo ("<script>location.href='frontend_models/busser.php'</script>");
            }
	    	else 
                $usernameErr = "Invalid login. Please fill in a valid username!";
                
                exit();
	  	}
	  	echo $usernameErr;
	}
?>