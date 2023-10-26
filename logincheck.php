<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if ($stmt->execute()) {
//     echo '<script>alert("Login Successful");</script>';
//     echo '<script>window.location.href = "workspace.php";</script>';
// } 
// else 
// {
//     echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
// }
?>