<?php
session_name('admin');
session_start();
unset($_SESSION['admin']);
unset($_SESSION['loginAdmin']);
unset($_SESSION['senhaAdmin']);
header('location:login.php');
?>