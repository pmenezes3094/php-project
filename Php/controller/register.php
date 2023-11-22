<?php
// $dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
// $dbusername = 'da'; 
// $dbpassword = 123; 

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (fullname, email, username, password) VALUES (:fullname, :email, :username, :password)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo '<script>alert("User registered successfully.");</script>';
    echo '<script>window.location.href = "../../index.php";</script>';
} 
else 
{
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}
?>