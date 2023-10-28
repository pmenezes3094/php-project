<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['image']['error'] === 0)
    {
        $uploaddirectory = "../../../php-project-file/image/"; 
        $allowedextensions = array("jpg", "jpeg", "png", "gif", "bmp", "tiff", "svg");  

        $filename = $_FILES['image']['name'];
        $fileextension = pathinfo($filenname, PATHINFO_EXTENSION);

    }
}
?>