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

        $newfilename = preg_replace('/[^A-z0-9]/','-',$filename);
        $i=0;
        while(file_exists($uploaddirectory.$filename))
        {
            $i=$i+1;
            $filename = $newfilename.$i.'.'.$extension; 
        }
    }
    else 
    {
        echo '<script>alert("Image could not be uploded");</script>';
        echo '<script>window.location.href = "workspace.view.php";</script>';
    }
}
?>