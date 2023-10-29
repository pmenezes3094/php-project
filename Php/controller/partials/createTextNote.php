<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$itemDetail = $_POST['textNote'];

$userSql = "SELECT userId FROM user WHERE username = :username";
$userStmt = $conn->prepare($userSql);
$userStmt->bindParam(':username', $username, PDO::PARAM_STR);
$userStmt->execute();
$userResult = $userStmt->fetch();
$userId = $userResult['userId'];

?>