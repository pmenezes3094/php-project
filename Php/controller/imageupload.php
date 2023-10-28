<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['image']['error'] === 0)
    {
        $upload_directory = "../../../php-project-file/image/";   
    }
}
?>