<?php 

if(isset($_GET["nomeProfessorAdd"])){
require('mysql.php');
$mysql = new MySQL;

function geraSenha(){
$caracteres = "0123456789";
$shuffle = substr(str_shuffle($caracteres),0,6);

return $shuffle;
}

$nomeProfessor = $_GET["nomeProfessorAdd"];
$randHash = $nomeProfessor.time();
$idProfessor = substr(md5($randHash),0,6);
$matriculaProfessor = $_GET["matriculaProfessorAdd"];
$senhaProfessor = geraSenha();
$emailProfessor = $_GET["emailProfessorAdd"];
$telefoneProfessor = $_GET["telefoneProfessorAdd"];

$sqlInserir = "INSERT INTO professores(idProfessor, nomeProfessor, matriculaProfessor, senhaProfessor, emailProfessor, telefoneProfessor) VALUES ('$idProfessor', '$nomeProfessor', '$matriculaProfessor', '$senhaProfessor', '$emailProfessor','$telefoneProfessor')";
$result = $mysql->query($sqlInserir);

if ($result) {
	$msg = 1;
} else {
	$msg = 2;
}

header('location:/admin/Professores.php?msg='.$msg.'&idProfessor='.$idProfessor);


}
 ?>