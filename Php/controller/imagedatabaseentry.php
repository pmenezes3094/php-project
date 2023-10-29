<?php
session_start(); 
$userId = $_SESSION['userId'];
$filepath = $_SESSION['filepath'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'image'";
$itemTypeStmt = $conn->prepare($itemTypeSql);
$itemTypeStmt->execute();
$itemTypeResult = $itemTypeStmt->fetch();
$itemTypeId = $itemTypeResult['itemTypeId'];

$sql = "INSERT INTO item (itemDetail, itemTypeId, userId) VALUES (:itemDetail, :itemTypeId, :userId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':itemDetail', $filepath, PDO::PARAM_STR);
$stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

$stmt->execute();

?>