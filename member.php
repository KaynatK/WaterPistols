<?php
require_once "pdo.php";
session_start();

if(isset($_SESSION['user'])){
	$mysqli = "SELECT * FROM users WHERE user.id = :user";
	echo("<pre>\n.$mysqli."\n</pre\n");
	$stmt = $pdo->prepare($mysqli);
	$stmt->execute(['user' => $_SESSION[u'user']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	//user that the fetch column
	print_r($user);
	$username = $user["name"];
	
}
else{
	header('Location: signin.php');
	
	
}

?>

<html>
	<head>
		<title>Water Blasters Members area</title>
	</head>
	<body>
		<h1>Welcome <? = $username?></h1>
		<a href="logoff.php"><button type = "button">Log out</button></a?
	
	</body>

</html>