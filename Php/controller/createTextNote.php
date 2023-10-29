<?php
session_start(); 
$username = $_SESSION['username'];

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

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'textNote'";
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