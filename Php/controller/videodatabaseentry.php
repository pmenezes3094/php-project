<?php
// session_start(); 
$userId = $_SESSION['userId'];
$filepath = $_SESSION['filepath'];

$videoTags = $_POST['videoTags']; // Change variable name to match the form field name

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tagsql = "INSERT INTO tag (tagName) VALUES (:videoTags)";
$stmt = $conn->prepare($tagsql);
$stmt->bindParam(':videoTags', $videoTags, PDO::PARAM_STR);
$stmt->execute();

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'video'";
$itemTypeStmt = $conn->prepare($itemTypeSql);
$itemTypeStmt->execute();
$itemTypeResult = $itemTypeStmt->fetch();
$itemTypeId = $itemTypeResult['itemTypeId'];

$tagIdSql = "SELECT tagId FROM tag WHERE tagName = '$videoTags'";
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
