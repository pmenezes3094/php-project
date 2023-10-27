<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['fullname']);
session_destroy();

header("Location: ../../index.php");
exit();
?>