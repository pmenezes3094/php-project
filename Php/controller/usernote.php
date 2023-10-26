<?php
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$textNote = $_POST['textNote'];

$sql = "INSERT INTO userNotes (textNote) VALUES (:textNote)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':textNote', $textNote, PDO::PARAM_STR);
$stmt->execute();
?>