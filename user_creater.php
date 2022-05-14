<?php

require_once "pdo.php";

if( isset($_POST['username']) && isset($_POST['email'])
	&& isset($_POST['password'])) {
		$mysqli = "INSERT INTO users (username, email, password)
		           VALUES(:username, :email, :password)";
	echo("<pre>\n".$mysqli."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));
}

if ( isset($_POST['delete']) && isset($_POST['user_id']) ) {
    $sql = "DELETE FROM users WHERE user_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
}

$stmt = $pdo->query("SELECT username, email, password, user_id FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>		   

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Create a New User</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

	<table border="5">
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['username']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['password']);
    echo("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="user_id" value="'.$row['user_id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>

//that to ceate a new user
</table>

<p>Add A New User</p>
<form method="post">
<p>Username:
<input type="text" name="name" size="40"></p>
<p>Email:
<input type="text" name="email"></p>
<p>Password:
<input type="password" name="password"></p>
<p><input type="submit" value="Add New"/></p>
</form>
</body>
