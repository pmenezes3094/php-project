<?php
session_destroy();

unset($_SESSION['username']);
unset($_SESSION['fullname']);
header("Location: ../../index.php");
exit();
?>