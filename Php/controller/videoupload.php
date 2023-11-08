<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['video']['error'] === UPLOAD_ERR_OK)
    {
        $uploaddirectory = "../../../php-project-file/video/"; 
        $allowedextensions = array("mp4", "webm", "ogv", "avi", "wmv", "flv", "mkv","mov","3gp","3g2","mpeg");  

        $filename = $_FILES['video']['name'];
        $fileextension = pathinfo($filename, PATHINFO_EXTENSION);

        $newfilename = preg_replace('/[^A-z0-9]/','.',$filename);
        $i=0;
        while(file_exists($uploaddirectory.$newfilename))
        {
            $i=$i+1;
            $newfilename = $newfilename . $i . '.' . $fileextension;
        }

        if (move_uploaded_file($_FILES['video']['tmp_name'], $uploaddirectory . $newfilename)) 
        {
            $filepath = $uploaddirectory . $newfilename;

            session_start();
            $_SESSION['filepath'] = $filepath;

            echo '<script>alert("File uploaded sucessfully");</script>';
            echo '<script>window.location.href = "../view/workspace.view.php";</script>';
        } 
        else 
        {
            echo '<script>alert("File could not be uploded. please try again");</script>';
            echo '<script>window.location.href = "../view/workspace.view.php";</script>';
        }
    }
    else 
    {
        echo '<script>alert("Video could not be uploded");</script>';
        // echo '<script>window.location.href = "../view/workspace.view.php";</script>';
    }
}
require 'imagedatabaseentry.php';
?>