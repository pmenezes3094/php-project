<?php
session_start();
$username = $_SESSION['username'];

$stmt = null;
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];
$sql = "DELETE FROM usernotes WHERE username = :username AND id = :id";
$stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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