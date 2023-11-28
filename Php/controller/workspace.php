<?php
$userId = $_SESSION['userId'];

require 'database.php';

$pdo = new PDO($dsn, $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT itemId, itemDetail, itemTypeId FROM item WHERE userId = :userId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll();

if (count($result) > 0) {
    foreach ($result as $note) {
        $itemDetail = $note['itemDetail'];
        $itemId = $note['itemId'];
        $itemTypeId = $note['itemTypeId'];

        $itemTypeSql = "SELECT itemType FROM itemtype WHERE itemTypeID = :itemTypeId";
        $stmt = $pdo->prepare($itemTypeSql);
        $stmt->bindParam(':itemTypeId', $itemTypeId, PDO::PARAM_INT);
        $stmt->execute();
        $itemTypeResult = $stmt->fetch();
        $itemType = $itemTypeResult['itemType'];

        $cardHTML = generateCardHTML($itemType, $itemDetail, $itemId);

        echo $cardHTML;
    }
} else {
    // No items to display
}

function generateCardHTML($itemType, $itemDetail, $itemId)
{
    $cardContent = '';

    switch ($itemType) {
        case 'textNote':
            $cardContent = "<p>$itemDetail</p>";
            break;
        case 'webLink':
            $cardContent = "<a href=\"$itemDetail\" target=\"_blank\">$itemDetail</a>";
            break;
        case 'image':
            $cardContent = "<img src='$itemDetail'>";
            break;
        case 'audio':
            $cardContent = "<audio controls><source src=\"$itemDetail\" type=\"audio/mp3\"></audio>";
            break;
        case 'video':
            $cardContent = "<video controls width=\"300\"><source src=\"$itemDetail\"></video>";
            break;
        case 'file':
            $cardContent = "<p>File Type at location: $itemDetail</p>";
            break;
    }

    return "
        <div class='card-grid-item'>
            <div class='card-content'>$cardContent</div>
            <form action='../controller/deleteCard.php' method='post'>
                <input type='hidden' name='itemId' value='$itemId'>
                <button type='submit'>Delete</button>
            </form>
        </div>
    ";
}
?>
