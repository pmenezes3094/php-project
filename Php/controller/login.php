<?php
session_start();

$stmt = null;
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $dbusername, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST["username"];

$sql = "SELECT username, password, fullname FROM user WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

$user = $stmt->fetch();

if ($user) 
{
    $password = $user['password'];

    //Algorithm to check password
    $enteredPassword = $_POST["password"]; 
    $storedPassword = $user['password'];
    if ($enteredPassword === $storedPassword)
    {
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];

        $username = $_SESSION['username'];
        $fullname = $_SESSION['fullname'];

        echo '<script>alert("Login Successful");</script>';
        echo '<script>window.location.href = "../view/workspace.view.php";</script>';
    }
    else 
    {
        echo '<script>alert("Username and password do not match");</script>';
    }
} 
else 
{
    echo '<script>alert("User does not exist");</script>';
    echo '<script>window.location.href = "../../index.php";</script>';
}
?>