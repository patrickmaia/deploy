<?php 
//Envio = idEnvio + Remetente + Destinatário + Caminho do Arquivo
require('mysql.php');
$mysql = new MySQL;
$remetente = $_POST['remetente'];
$tipoRemetente = $_POST['tipoRemetente'];



$tituloArquivo = $_POST['tituloArquivoEnviar'];
$turmaDestino = $_POST['turmaSelecionadaArquivoEnviar'];
$randId = $tituloArquivo.time();
$idEnvio = substr(md5($randId),0,6);
$uploaddir = '/var/www/html/uploads/';

$rawFilename = $_FILES['arquivoEnviar']['name'];
$extension = pathinfo($rawFilename, PATHINFO_EXTENSION);
// $caminho = "uploads/".$rawFilename;
	$caminho = "uploads/".$_FILES['arquivoEnviar']['name'];

$uploadfile = $uploaddir. $_FILES['arquivoEnviar']['name'];
if (move_uploaded_file($_FILES['arquivoEnviar']['tmp_name'], $uploaddir.$_FILES['arquivoEnviar']['name'])) {

	// $queryEnvio = "INSERT INTO envios(idEnvio, tituloEnvio, Remetente, idTurma, FilePath) VALUES ('$idEnvio', '$tituloArquivo','$remetente', '$turmaDestino', '$uploadfile')";
	$queryEnvio = "INSERT INTO envios(idEnvio, tituloEnvio, Remetente, idTurma, FilePath) VALUES ('$idEnvio', '$tituloArquivo','$remetente', '$turmaDestino', '$caminho')";

	$resultEnvio = $mysql->query($queryEnvio);
	if($resultEnvio){
		$msg = 1;
	}else{$msg = 2;}
}else{
	$msg = 2;
}

if($tipoRemetente == "Admin"){
	header('location:/admin/Envios.php?msg='.$msg.'&idEnvio='.$idEnvio);
}
if($tipoRemetente == "Professor"){
	header('location:/professor/Envios.php?msg='.$msg.'&idEnvio='.$idEnvio);
}



 ?>


