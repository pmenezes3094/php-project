<?php
session_start();
$username = $_SESSION['username'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da';
$dbpassword = 123;

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userIdSql = "SELECT userId FROM user WHERE username = :username ";
$userStmt = $conn->prepare($userIdSql);
$userStmt->bindParam(':username', $username, PDO::PARAM_STR);
$userStmt->execute();
$userId = $userStmt->fetch();

$itemTypeIDSql = "SELECT itemTypeId FROM itemType WHERE itemType = :itemType";
$itemTypeStmt = $conn->prepare($itemTypeIDSql);
$userStmt->bindParam(':itemType', 'textNote', PDO::PARAM_STR);
$itemTypeStmt->execute();
$itemTypeId = $itemTypeStmt->fetch();

$itemDetail = $_POST['textNote'];

$sql = "INSERT INTO item (itemDetail, itemTypeId, userId) VALUES (:itemDetail, :itemTypeId, :userId)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':itemDetail', $itemDetail, PDO::PARAM_STR);
$stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo '<script>alert("Text Note Saved");</script>';
    echo '<script>window.location.href = "../view/workspace.view.php";</script>';
} else {
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}
?>