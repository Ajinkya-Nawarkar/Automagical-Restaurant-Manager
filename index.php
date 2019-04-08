<!DOCTYPE html>

<html>
<head>
<title>FrontPage</title>
</head>

<body>
<h1>Automagical Restaurant Manager</h1>
<br>
<h3>Login</h3>

<form method = "post" action = "index.php">
  Username: <br>
  <input type = "text" name = "username">
  <br>
  Password: <br>
  <input type = "text" name = "password">
  <br><br>
  <input type = "submit" value = "Login" name = "submit">
  <br><br>
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
 $usernameErr = "";
 if (empty($_POST['username']))
 {
  $usernameErr = "Please fill in existing username";
  echo $usernameErr;
 }
 //$db = new dbAPI;
 $userInfo = array("", "");
 //$userInfo = $db->userPosition($username);
 
 //test
 $userInfo[0] = 2;
 $userInfo[1] = 1;

  if($userInfo[1] == 0)
  echo ("<script>location.href='Manager.php'</script>");
  if($userInfo[1] == 1)
  echo ("<script>location.href='http://pluto.cse.msstate.edu/~an839/SE/mike/Automagical-Restaurant-Manager/frontend_models/host.php'</script>");
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
