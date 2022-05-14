<?php
//use port 8889 on a mac
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=login_user', 
   'KKhan');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


