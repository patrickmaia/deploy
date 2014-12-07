<?php
require('mysql.php');
// Pega os Alunos da Turma e imprime a tabela pra inserir notas //
if(isset($_GET['turmaSelecionada'])){

$mysql = new MySQL;
$turmaSelecionada = $_GET['turmaSelecionada'];
$queryGetAlunos = "SELECT * FROM alunos WHERE turmaAluno = '$turmaSelecionada'";
$resultGetAlunos = $mysql->query($queryGetAlunos);


	$returnTabela = "<table id='tabelaNotas' class='table table-striped'>
						<thead>
							<tr>
							<th>".$turmaSelecionada."</th>
							<th>1º </th>
							<th>2º </th>
							<th>3º </th>
							<th>4º </th>
							<th> Botão </th>
							</tr>
						</thead>
						<tbody>
						<tr>";
	while($rowTabela = mysql_fetch_array($resultGetAlunos)){
					$returnTabela.="<form action='Notas.php'>";
					$returnTabela.="<td>".$rowTabela['nomeAluno']."</td>";
					$returnTabela.="<td><input  type='text'name='pri'> </td>";
					$returnTabela.="<td><input  type='text'name='seg'> </td>";
					$returnTabela.="<td><input  type='text'name='ter'> </td>";
					$returnTabela.="<td><input  type='text'name='qua'> </td>";

					$returnTabela.="<td><input type='submit' value='Enviar'/></td>";
					$returnTabela.="</form>";
					$returnTabela.="</tr>";


	}

	echo $returnTabela."</tbody></table>";

}

//////////
// while($linha = mysql_fetch_array($result)){
// 			$return.="<td>" . utf8_encode($linha["idAluno"]) . "</td>";
// 			$return.="<td>" . utf8_encode($linha["nomeAluno"]) . "</td>";
// 			$return.="<td>" . utf8_encode($linha["turmaAluno"]) . "</td>";
// 			$return.="<td>" . utf8_encode($linha["matriculaAluno"]) . "</td>";
// 			$return.="<td>" . utf8_encode($linha["emailAluno"]) . "</td>";
// 			$return.="<td>" . utf8_encode($linha["telefoneAluno"]) . "</td>";


// 			$return.="</tr>";
// 		}
// 		echo $return.="</tbody></table>";
// 	} else{
// 		echo "Não foram encontrados.".$nome;
////////
if(isset($_GET['disciplinaSelecionada'])){
$mysql = new MySQL;
$disciplinaSelecionada = $_GET['disciplinaSelecionada'];
$queryDisciplina = "SELECT * FROM disciplinas WHERE idDisciplina = '$disciplinaSelecionada'";
$resultQuery = $mysql->query($queryDisciplina);

echo "<h3> Selecione a Turma </h3>";
echo '<select name="turmaSelecionada" id="turmaSelecionada" onchange="getBotao();"> ';
        echo '<option VALUE="" selected="selected"></option>';
        while($row=mysql_fetch_array($resultQuery))
        {	$idTurma = $row['idTurma'];
        	$convertePraNome = "SELECT * FROM turmas WHERE idTurma='$idTurma'";
        	$resultConvertPraNome = $mysql->query($convertePraNome);
        	$rowNome = mysql_fetch_array($resultConvertPraNome);

            echo '<option value="' . htmlspecialchars($row['idTurma']) . '">' 
                . htmlspecialchars($rowNome['Turma']) 
                . '</option>';
        }
        echo '</select>';
}


if(isset($_POST['nomeDisciplinaAdd'])){
$mysql = new MySQL;

$nomeDisciplinaAdd = $_POST['nomeDisciplinaAdd'];
$randId = $nomeDisciplinaAdd.time();
$idDisciplina = substr(md5($randId),0,6);
$idTurma = $_POST['turmaSelecionadaDisciplinaAdd'];
$idProfessor = $_POST['professorSelecionadoDisciplinaAdd'];



$sql = "INSERT INTO disciplinas(idDisciplina, idTurma, nomeDisciplina, idProfessor) VALUES ('$idDisciplina', '$idTurma', '$nomeDisciplinaAdd', '$idProfessor')";


$rs = $mysql->query($sql);
if($rs){
	$msg = 1;
}
else{
	$msg = 2;
}

header('location:/admin/Disciplinas.php?msg='.$msg.'&idDisciplina='.$idDisciplina);
}
?>