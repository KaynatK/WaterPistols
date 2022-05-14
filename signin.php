<?php

require_once "pdo.php";

session_start();
if( isset($_POST['email'])
	    && isset($_POST['password'])){
		
		//these are variables for the query 
      $user_email = $_POST['email'];
      $user_password = $_POST['password'];


        $mysqli = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
		// create a query using the values submitted 
		
		
		// this code is adaptng from the practice which Andy gave 
		//this is to delete demo
		echo("<pre>\n".$mysqli. "\n</pre\n");
		$stmt = $pdo->query($mysqli);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		print_r($rows);
	
	
	
	if ($user){
		
		$_SESSION["users"] = $user{"user_id"];
		
		echo session_id();
        header('Location: member.php');
        }
        else {
          echo "Sorry, you must enter a valid email and password to log in";
        }

    }
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Water Blaters Ltd </title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
    <nav class="nav">
	  <a href ="index.html">Home</a>
	</nav>
       <form>
	    <h2>Login</h2>
             <fieldset>
             <label for="idEmail">Email:</label>
             <input type="text" name="email" id = for="idEmail"required / > <br/> 
             <label for="idPassword">Password:</label>
             <input type="password" name="password" id= for="idPassword" required>
				
             </fieldset>
        
             <input type="submit"  value="Login" name="submit">
        </form>
</body>