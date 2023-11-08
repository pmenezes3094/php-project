<?php
session_start(); 
$userId = $_SESSION['userId'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$itemDetail = $_POST['textNote'];
$textNoteTags = $_POST['textNoteTags'];

$tagsql ="INSERT INTO tag (tagName) VALUES (:textNoteTags)";
$stmt = $conn->prepare($tagsql);
$stmt->bindParam(':textNoteTags', $textNoteTags, PDO::PARAM_STR);
$stmt->execute();

$itemTypeSql = "SELECT itemTypeId FROM itemtype WHERE itemtype = 'textNote'";
$itemTypeStmt = $conn->prepare($itemTypeSql);
$itemTypeStmt->execute();
$itemTypeResult = $itemTypeStmt->fetch();
$itemTypeId = $itemTypeResult['itemTypeId'];

$tagIdSql = "SELECT tagId FROM tag WHERE tagName = '$textNoteTags'";
$tagIdStmt = $conn->prepare($tagIdSql);
$tagIdStmt->execute();
$tagIdResult = $tagIdStmt->fetch();
$tagId = $tagIdResult['tagId'];

$sql = "INSERT INTO item (itemDetail, itemTypeId, userId, tagId) VALUES (:itemDetail, :itemTypeId, :userId, :tagId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':itemDetail', $itemDetail, PDO::PARAM_STR);
$stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);


if ($stmt->execute()) {
    echo '<script>alert("Text Note Saved");</script>';
    echo '<script>window.location.href = "../view/workspace.view.php";</script>';
} 
else 
{
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}

?>