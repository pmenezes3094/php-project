<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; // Your MySQL username
$password = 123; // Your MySQL password

$conn = new PDO($dsn, $username, $password);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

$conn->close();
?>