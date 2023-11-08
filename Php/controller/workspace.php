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
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <p>
                        $itemDetail
                    </p>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }
        elseif ($itemType === 'webLink')  
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class 'card-content'>
                <a href=\"$itemDetail\" target=\"_blank\">$itemDetail</a>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }
        elseif ($itemType === 'image') 
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <img src='$itemDetail'>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }
        elseif ($itemType === 'audio') 
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <audio controls>
                        <source src=\"$itemDetail\" type=\"audio/mp3\">
                    </audio>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }
        elseif ($itemType === 'video')
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <video controls width=\"300\">
                        <source src=\"$itemDetail\">
                    </video>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }
        elseif ($itemType === 'file') 
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <p>
                       File Type at location: $itemDetail
                    </p>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$itemId'>
                    <button type='submit'>Delete</button>
                </form>
            </div>
        ";
        }

            echo $cardHTML;
    }
}
else
{
    //else do nothing
}
?>