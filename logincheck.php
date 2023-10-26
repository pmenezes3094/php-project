<?php
$stmt = null;
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$username = 'da'; 
$password = 123; 

$conn = new PDO($dsn, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST["username"];

$sql = "SELECT password FROM user WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

$user = $stmt->fetch();

if ($user) 
{
    $password = $user['password'];

    //Algorithm to check password
        //store password from input field in a variable
        //store password from database in another vaiabe
        //check login if both password match 
        //if match -> alert login successful
            //echo '<script>alert("Login Successful");</script>';
            //echo '<script>window.location.href = "workspace.php";</script>';
        // else echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
} 
else 
{
    echo '<script>alert("User does not exist");</script>';
}
// if ($stmt->execute()) {
//     echo '<script>alert("Login Successful");</script>';
//     echo '<script>window.location.href = "workspace.php";</script>';
// } 
// else 
// {
//     echo '<script>alert("Error: ' . $stmt->errorInfo()[2] . '");</script>';
// }
?>