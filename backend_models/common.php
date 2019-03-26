<?php

	// Model class for shared functions and procedures
	class Common
	{
		// Create token (hashed password)
		function hashPassword($password)
		{
			$salt1    = "qm&h*";
	        $salt2    = "pg!@";
	        $token = hash('ripemd128', "$salt1$password$salt2");
	        return $token;
		}
		
		// Set session variables
		function setSession($username, $type)
		{
			$_SESSION['username'] = $username;
			$_SESSION['type'] = $type;
		}
	}
?>