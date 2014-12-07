<?php
session_name('aluno');
session_start();
unset($_SESSION['aluno']);
unset($_SESSION['loginAluno']);
unset($_SESSION['senhaAluno']);
header('location:../index.php');
?>