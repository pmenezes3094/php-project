<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['image']['error'] === 0)
    {
        $upload_directory = "../../../php-project-file/image/"; 
        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "bmp", "tiff", "svg");  

        $filename = $_FILES['image']['name'];
        $fileextension = pathinfo($filenname, PATHINFO_EXTENSION);

    }
}
?>