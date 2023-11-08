<?php 

session_start(); 
$userId = $_SESSION['userId'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 

$conn = new PDO($dsn, $dbusername, $dbpassword);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$searchItem = $_POST['searchKey'];

$searchSql = "SELECT i.itemDetail,i.itemTypeId,it.itemType FROM `tag` t,item i,itemtype it where t.tagId=i.tagId and t.tagName='hii'
and it.itemTypeId=i.itemTypeId";
$searchStmt = $conn->prepare($searchSql);
$searchStmt->execute();
$searchResult = $searchStmt->fetch();
$searchItemDetail = $searchResult['itemDetail'];

?>