<?php 

require('mysql.php');


if(isset($_POST['novoAviso'])){
$mysql = new MySQL;
session_name('admin');
session_start();

$idAviso = rand(1,10);
$remetente = $_POST['remetente'];
$tipoRemetente = $_POST['tipoRemetente'];
$destinatario = $_POST['turmaSelecionada'];
$mensagem = $_POST['novoAviso'];

$sql = "INSERT INTO `Avisos`(`idAviso`, `Remetente`, `idTurma`, `Mensagem`) VALUES ('$idAviso','$remetente','$destinatario','$mensagem')";


$rs = $mysql->query($sql);
if($sql){
	$msg = 1;
}
else{
	$msg = 2;
}
if($tipoRemetente=="Professor"){
	header('location:/professor/Avisos.php?msg='.$msg);
}
if($tipoRemetente=="Admin"){
	header('location:/admin/Avisos.php?msg='.$msg);

}



}

// echo $_SESSION['nomeAdmin']; //Destinatário
// echo $_POST['turmaSelecionada']; // ID da Turma
// echo $_POST['novoAviso']; // Cónteúdo




// Aviso = Remetente + Mensagem + Destinatário.

 ?>