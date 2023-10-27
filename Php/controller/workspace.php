<?php
$username = $_SESSION['username'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id, textNote FROM usernotes WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll();

if (count($result) > 0) 
{
    $notes = $result;
    foreach ($notes as $note) 
    {
        $textNote = $note['textNote'];
        $id = $note['id'];
            $cardHTML = "
                <div class='card-grid-item'>
                    <div class='card-content'>
                        <p>
                            $textNote
                        </p>
                    </div>
                    <form action='../controller/deletecard.php' method='post'>
                        <input type='hidden' name='id' value='$id'>
                        <button type='submit'>Delete</button>
                    </form>
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