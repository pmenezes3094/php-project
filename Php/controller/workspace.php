<?php
session_start(); 
$username = $_SESSION['username'];

$dsn = "mysql:host=localhost;port=3306;dbname=phpproject;charset=utf8mb4";
$dbusername = 'da'; 
$dbpassword = 123; 
//create and execute a select query to retrive all text notes
//check for number of results
    //if more than one result store in array variable
        // run a loop until end of array
            // store card html structure in variable along with retrived text note
            //on workspace page create card using that variavle
    //else do nothing
?>