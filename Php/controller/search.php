<?php 

session_start(); 
$userId = $_SESSION['userId'];

// $dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
// $dbusername = 'da'; 
// $dbpassword = 123; 

require 'database.php';

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$searchItem = $_POST['searchKey'];

$searchSql = "SELECT i.itemDetail,i.itemTypeId,it.itemType FROM `tag` t,item i,itemtype it where t.tagId=i.tagId and t.tagName='$searchItem'
and it.itemTypeId=i.itemTypeId and i.userId = '$userId'";
$searchStmt = $conn->prepare($searchSql);
$searchStmt->execute();
$searchResult = $searchStmt->fetchAll();

if (count($searchResult) > 0)
{
    foreach($searchResult as $Result)
    {
        $searchItemDetail = $Result['itemDetail'];
        $searchItemType = $Result['itemType'];

        if ($searchItemType === 'textNote') 
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <p>
                        $searchItemDetail
                    </p>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$searchItemType'>
                </form>
            </div>
        ";
        }
        elseif ($searchItemType === 'image') 
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class='card-content'>
                    <img src='$searchItemDetail'>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$searchItemType'>
                </form>
            </div>
        ";
        }
        elseif ($searchItemType === 'webLink')  
        {
            $cardHTML = "
            <div class='card-grid-item'>
                <div class 'card-content'>
                <a href=\"$searchItemDetail\" target=\"_blank\">$searchItemDetail</a>
                </div>
                <form action='../controller/deleteCard.php' method='post'>
                    <input type='hidden' name='itemId' value='$searchItemType'>
                </form>
            </div>
        ";
        }
        echo $cardHTML;
    }
}
?>