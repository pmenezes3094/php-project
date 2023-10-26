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
    foreach ($notes as $note) 
    {
        $textNote = $note['text_note'];
            $cardHTML = "
                <div class='card-grid-item'>
                    <div class='card-content'>
                        <p>
                            $textNote
                        </p>
                    </div>
                </div>
            ";
            echo $cardHTML;
    }
}
else
{
    //else do nothing
}
?>