<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "phpproject";

$conn = new mysqli($servername, $username, $password, $dbname);

$conn->close();
?>