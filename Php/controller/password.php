<?php
// $dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
// $dbusername = 'da'; 
// $dbpassword = 123; 

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE user SET password = :password WHERE username = :username";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo '<script>alert("Password updated successfully.");</script>';
    echo '<script>window.location.href = "../../index.php";</script>';
} 
else 
{
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}

?>