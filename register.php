<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "phpproject";

$conn = new mysqli($servername, $username, $password, $dbname);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$conn->close();
?>