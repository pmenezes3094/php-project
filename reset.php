<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE user SET password = :newPassword WHERE username = :username";

$stmt = $conn->prepare($sql);

//Space to bind parameters

if ($stmt->execute()) {
    echo '<script>alert("Password updated successfully.");</script>';
    echo '<script>window.location.href = "index.php";</script>';
} 
else 
{
    echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
}

?>