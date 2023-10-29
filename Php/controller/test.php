<?php
session_start();
$userId = $_SESSION['userId'];

$stmt = null;
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$itemId = $_POST['itemId'];
$sql = "DELETE FROM item WHERE userId = :userId AND itemId = :itemId";
$stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
if ($stmt->execute()) 
{
    echo '<script>alert("Card deleted sucessfully");</script>';
    echo '<script>window.location.href = "../view/workspace.view.php";</script>';
} 
else 
{
    echo '<script>alert("Card deletion uncsucessful. Please try again");</script>';
}
?>