<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "phpproject";

$conn = new PDO($dsn, $username, $password);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

$conn->close();
?>