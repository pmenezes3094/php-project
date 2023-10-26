<?php
session_start(); 
$username = $_SESSION['username'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT textNote FROM usernotes WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll();

if (count($result) > 0) 
{
    $notes = $result;
    // run a loop until end of array
        // store card html structure in variable along with retrived text note
        //on workspace page create card using that variavle
}
else
{
    //else do nothing
}
?>