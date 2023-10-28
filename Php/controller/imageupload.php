<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_FILES['image']['error'] === 0)
    {
        $uploaddirectory = "../../../php-project-file/image/"; 
        $allowedextensions = array("jpg", "jpeg", "png", "gif", "bmp", "tiff", "svg");  

        $filename = $_FILES['image']['name'];
        $fileextension = pathinfo($filename, PATHINFO_EXTENSION);

        $newfilename = preg_replace('/[^A-z0-9]/','.',$filename);
        $i=0;
        while(file_exists($uploaddirectory.$newfilename))
        {
            $i=$i+1;
            $newfilename = $newfilename . $i . '.' . $fileextension;
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddirectory . $newfilename)) 
        {
            
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
        echo '<script>alert("Image could not be uploded");</script>';
        echo '<script>window.location.href = "../view/workspace.view.php";</script>';
    }
}
?>