<!DOCTYPE html>

<html>
<head>
<title>FrontPage</title>
<style> body {background-color: lightblue;}</style>
</head>



<body>
<h1>Automagical Restaurant Manager</h1>
<br>
<h3>Login</h3>

<form method = "post" action = "index.php">
  Username: <br>
  <input type = "text" name = "username" style = "background-color:lightblue;">
  <br>
  Password: <br>
  <input type = "text" name = "password" style = "background-color:lightblue;">
  <br><br>
  <input type = "submit" value = "Login" name = "submit">
  <br><br>
  testing: 1
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
 }
 //$db = new dbAPI;
 $userInfo = array("", "");
 //$userInfo = $db->userPosition($username);
 
 //test
 //$userInfo[0] = 2;
 //$userInfo[1] = 1;
 if($_POST['username'] == host)
 $userInfo[1] = 1;
 else if($_POST['username'] == waiter)
 $userInfo[1] = 2;
 else if($_POST['username'] == cook)
 $userInfo[1] = 3;
 else if($_POST['username'] == busser)
 $userInfo[1] =4;
 else $userInfo[1] = 5;

  if($userInfo[1] == 0)
  echo ("<script>location.href='Manager.php'</script>");
  if($userInfo[1] == 1)
  echo ("<script>location.href='http://pluto.cse.msstate.edu/~an839/SE/mike/Automagical-Restaurant-Manager/frontend_models/host.php'</script>");
  else if($userInfo[1] == 2)
  echo ("<script>location.href='http://pluto.cse.msstate.edu/~an839/SE/mike/Automagical-Restaurant-Manager/frontend_models/waiter.php'</script>");
  else if($userInfo[1] == 3)
  echo ("<script>location.href='http://pluto.cse.msstate.edu/~an839/SE/cern/Automagical-Restaurant-Manager/frontend_models/cook.php'</script>");
  else if($userInfo[1] == 4)
  echo ("<script>location.href='http://pluto.cse.msstate.edu/~an839/SE/gaurav/Automagical-Restaurant-Manager/frontend_models/busser.php'</script>");
  else echo $usernameErr;
}
?>
</body>
</html>