<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['audio']['error'] === UPLOAD_ERR_OK)
    {
        $uploaddirectory = "../../../php-project-file/audio/"; 
        $allowedextensions = array("mp3", "wav", "ogg", "aac", "flac", "m4a", "webm");  

        $filename = $_FILES['audio']['name'];
        $fileextension = pathinfo($filename, PATHINFO_EXTENSION);

        $newfilename = preg_replace('/[^A-z0-9]/','.',$filename);
        $i=0;
        while(file_exists($uploaddirectory.$newfilename))
        {
            $i=$i+1;
            $newfilename = $newfilename . $i . '.' . $fileextension;
        }

        if (move_uploaded_file($_FILES['audio']['tmp_name'], $uploaddirectory . $newfilename)) 
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
        echo '<script>alert("Audio could not be uploded");</script>';
        echo '<script>window.location.href = "../view/workspace.view.php";</script>';
    }
}
require 'audiodatabaseentry.php';
?>