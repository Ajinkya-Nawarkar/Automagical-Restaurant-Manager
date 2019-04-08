<!DOCTYPE html>

<html>
<head>
<title>FrontPage</title>
</head>

<body>
<h1>Automagical Restaurant Manager</h1>
<br>
<h3>Login</h3>

<form method = "post" action = "frontpage_dev.php">
  Username: <br>
  <input type = "text" name = "username">
  <br>
  Password: <br>
  <input type = "text" name = "password">
  <br><br>
  <input type = "submit" value = "Login" name = "submit">
</form>

<?php
 if(isset($_POST['submit']))
 {
  choosePage();
 }

 
 
 //$array = $dbretrivePos($username);

function choosePage() 
{
 $username = isset($_POST['username']);
 //$db = new dbAPI;
 $userInfo = array("", "");
 
 //test
 $userInfo[0] = 2;
 $userInfo[1] = 1;

  if($userInfo[1] == 0)
  echo ("<script>location.href='Manager.php'</script>");
  if($userInfo[1] == 1)
  echo ("<script>location.href='Host.php'</script>");
  else if($userInfo[1] == 2)
  echo ("<script>location.href='Waiter.php'</script>");
  else if($userInfo[1] == 2)
  echo ("<script>location.href='Cook.php'</script>");
  else if($userInfo[1] == 2)
  echo ("<script>location.href='Busser.php'</script>");
}

?>
</body>
</html>
