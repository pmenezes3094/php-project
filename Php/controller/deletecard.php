<?php
$_SESSION['username'] = $user['username'];

$stmt = null;
$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// grab the note content
// create sql query to delete record which belongs to particular username(grabed from session) and id(of the selected content)
$stmt = $conn->prepare($sql);
//bind parameters
if ($stmt->execute()) 
{
    echo '<script>alert("Card deleted sucessfully");</script>';
    echo '<script>window.location.href = "../workspace.php";</script>';
} 
else 
{

}
//else show alert that card couldnt be deleted. please try again
?>