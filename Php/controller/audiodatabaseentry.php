<?php
session_start(); 
$userId = $_SESSION['userId'];
$filepath = $_SESSION['filepath'];

$audioTags = $_POST['audioTags'];

// $dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
// $dbusername = 'da'; 
// $dbpassword = 123; 

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tagsql ="INSERT INTO tag (tagName) VALUES (:audioTags)";
$stmt = $conn->prepare($tagsql);
$stmt->bindParam(':audioTags', $audioTags, PDO::PARAM_STR);
$stmt->execute();

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'audio'";
$itemTypeStmt = $conn->prepare($itemTypeSql);
$itemTypeStmt->execute();
$itemTypeResult = $itemTypeStmt->fetch();
$itemTypeId = $itemTypeResult['itemTypeId'];

$tagIdSql = "SELECT tagId FROM tag WHERE tagName = '$audioTags'";
$tagIdStmt = $conn->prepare($tagIdSql);
$tagIdStmt->execute();
$tagIdResult = $tagIdStmt->fetch();
$tagId = $tagIdResult['tagId'];

$sql = "INSERT INTO item (itemDetail, itemTypeId, userId, tagId) VALUES (:itemDetail, :itemTypeId, :userId, :tagId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':itemDetail', $filepath, PDO::PARAM_STR);
$stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);

$stmt->execute();
?>