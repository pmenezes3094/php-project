<?php
session_start(); 
$username = $_SESSION['username'];
$filepath = $_SESSION['filepath'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO userNotes (username, textNote) VALUES (:username, :textNote)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':textNote', $filepath, PDO::PARAM_STR);

$stmt->execute();

?>