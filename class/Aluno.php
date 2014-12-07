<?php 

session_name('admin');
session_start();
if(isset($_POST["nomeAlunoAdd"])){
require('mysql.php');
$mysql = new MySQL;
/*
Aluno é composto de:

idAluno = 6 dígitos MD5
nomeAluno = formulário
turmaAluno = tabela "Turmas"
e-mail = formulario
telefone = formulario

*/

function geraSenha(){
$caracteres = "0123456789";
$shuffle = substr(str_shuffle($caracteres),0,6);

return $shuffle;
}

$nomeAluno = $_POST["nomeAlunoAdd"];
$telefoneAluno = $_POST["telefoneAlunoAdd"];
$emailAluno = $_POST["emailAlunoAdd"];
$randId = $nomeAluno.time();
$idAluno = substr(md5($randId),0,6);
$turmaAluno = $_POST["turmaSelecionadaAddAluno"];
$matriculaAluno = $_POST["matriculaAlunoAdd"];
$senhaAluno = geraSenha();

$sql = "INSERT INTO alunos(idAluno, nomeAluno, turmaAluno, matriculaAluno, senhaAluno, emailAluno, telefoneAluno) VALUES ('$idAluno', '$nomeAluno', '$turmaAluno', '$matriculaAluno', '$senhaAluno', '$emailAluno', '$telefoneAluno')";

$rs = $mysql->query($sql);

if($rs){
	$msg=1;
}
else{
	$msg=2;
}

header('location:/admin/Alunos.php?msg='.$msg.'&idAluno='.$idAluno);

}

if(isset($_GET["nomeAluno"])){
	$nome = $_GET["nomeAluno"];

	$server = "localhost";
	$user = "root";
	$senha = "root";
	$base = "portaldaturma";

	$conexao = mysql_connect($server,$user,$senha) or die("Erro na conexão ");
	mysql_select_db($base);

	if(empty($nome)){
		$sql = "SELECT * FROM alunos";
	}else{
		$nome.="%";
		$sql = "SELECT * FROM alunos WHERE nomeAluno LIKE '$nome'";
		
	}
	sleep(1);
	$result = mysql_query($sql);
	$cont = mysql_affected_rows($conexao);

	if($cont>0){
		$tabela = "<table class='table table-striped'>
						<thead>
							<tr>
							<th>ID </th>
							<th>Nome </th>
							<th>Turma </th>
							<th> Matricula </th>
							<th> E-mail </th>
							<th> Telefone </th>
							</tr>
						</thead>
						<tbody>
						<tr>";
		$return = "$tabela";

		while($linha = mysql_fetch_array($result)){
			$return.="<td>" . utf8_encode($linha["idAluno"]) . "</td>";
			$return.="<td>" . utf8_encode($linha["nomeAluno"]) . "</td>";
			$return.="<td>" . utf8_encode($linha["turmaAluno"]) . "</td>";
			$return.="<td>" . utf8_encode($linha["matriculaAluno"]) . "</td>";
			$return.="<td>" . utf8_encode($linha["emailAluno"]) . "</td>";
			$return.="<td>" . utf8_encode($linha["telefoneAluno"]) . "</td>";


			$return.="</tr>";
		}
		echo $return.="</tbody></table>";
	} else{
		echo "Não foram encontrados.".$nome;
	}
}


 ?>