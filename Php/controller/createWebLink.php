<?php
session_start(); 
$userId = $_SESSION['userId'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$itemDetail = $_POST['webLink'];
$webLinkTags = $_POST['webLinkTags'];

$tagsql ="INSERT INTO tag (tagName) VALUES (:webLinkTags)";
$stmt = $conn->prepare($tagsql);
$stmt->bindParam(':webLinkTags', $webLinkTags, PDO::PARAM_STR);
$stmt->execute();

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'webLink'";
$itemTypeStmt = $conn->prepare($itemTypeSql);
$itemTypeStmt->execute();
$itemTypeResult = $itemTypeStmt->fetch();
$itemTypeId = $itemTypeResult['itemTypeId'];

$sql = "INSERT INTO item (itemDetail, itemTypeId, userId) VALUES (:itemDetail, :itemTypeId, :userId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':itemDetail', $itemDetail, PDO::PARAM_STR);
$stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo '<script>alert("Text Note Saved");</script>';
    echo '<script>window.location.href = "../view/workspace.view.php";</script>';
} 
else 
{
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}
?>