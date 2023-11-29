<?php
session_start();
$userId = $_SESSION['userId'];

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$searchItem = $_POST['searchKey'];

$searchSql = "SELECT i.itemDetail, i.itemTypeId, it.itemType FROM `tag` t, item i, itemtype it WHERE t.tagId = i.tagId AND t.tagName = '$searchItem' AND it.itemTypeId = i.itemTypeId AND i.userId = '$userId'";
$searchStmt = $conn->prepare($searchSql);
$searchStmt->execute();
$searchResult = $searchStmt->fetchAll();

if (count($searchResult) > 0) {
    foreach ($searchResult as $result) {
        $searchItemDetail = $result['itemDetail'];
        $searchItemType = $result['itemType'];

        $cardHTML = generateCardHTML($searchItemType, $searchItemDetail);

        echo $cardHTML;
    }
}

function generateCardHTML($itemType, $itemDetail)
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
    }

    return "
        <div class='card-grid-item'>
            <div class='card-content'>$cardContent</div>
            <form action='../controller/deleteCard.php' method='post'>
                <input type='hidden' name='itemId' value='$itemDetail'>
                <button type='submit'>Delete</button>
            </form>
        </div>
    ";
}
?>
