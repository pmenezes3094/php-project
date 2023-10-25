<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];

?>