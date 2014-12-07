<?php
session_name('professor');
session_start();
unset($_SESSION['professor']);
unset($_SESSION['loginProfessor']);
unset($_SESSION['senhaProfessor']);
header('location:../index.php');
?>