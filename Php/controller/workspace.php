<?php
$userId = $_SESSION['userId'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT itemId, itemDetail, itemTypeId FROM item WHERE userId = :userId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll();

if (count($result) > 0) 
{
    $notes = $result;
    foreach ($notes as $note) 
    {
        $itemDetail = $note['itemDetail'];
        $itemId = $note['itemId'];
        $itemTypeId = $note['itemTypeId'];

        $itemTypeSql = "SELECT itemType FROM itemType WHERE itemTypeID = :itemTypeId";
        $stmt = $pdo->prepare($itemTypeSql);
        $stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
        $stmt->execute();
        $itemTypeResult = $stmt->fetch();
        $itemType = $itemTypeResult['itemType'];

        if ($itemType === 'textNote') 
        {

        }
        elseif ($itemType === 'webLink')  
        {

        }
        elseif ($itemType === 'image') 
        {

        }
        elseif ($itemType === 'audio') 
        {

        }
        elseif ($itemType === 'video')
        {

        }
        elseif ($itemType === 'file') 
        {

        }
        else 
        {
            
        }

            echo $cardHTML;
    }
}
else
{
    //else do nothing
}
?>