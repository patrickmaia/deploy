
<?PHP
// Irá checar se existe mesmo um professor com essas credenciais, caso positivo criar uma sessão.
include('../class/PDO.class.php'); 
$login = $_POST['loginAluno'];
$senha = $_POST['senhaAluno'];

$stmt = $pdo->prepare("SELECT * FROM alunos WHERE matriculaAluno = :logAluno AND senhaAluno = :senAluno "); 
$stmt->bindParam(':logAluno', $login,PDO::PARAM_STR);
$stmt->bindParam(':senAluno', $senha,PDO::PARAM_STR);

$stmt->execute();
$obj= $stmt->fetchObject();

if($obj){
	unset($_SESSION['aluno']);
	session_name('aluno');
	session_start();
	//Armazena detalhes cruciais na sessão iniciada.
	$_SESSION['loginAluno'] = $login;
	$_SESSION['senhaAluno'] = $senha;
	$_SESSION['nomeAluno'] = $obj->nomeAluno;
	$_SESSION['idAluno'] = $obj->idAluno;
	$_SESSION['turmaAluno'] = $obj->turmaAluno;
	$_SESSION['matriculaAluno'] = $obj->matriculaAluno;
	$_SESSION['emailAluno'] = $obj->emailAluno;


	header('location:index.php');

} else{
	session_destroy();
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../index.php');
}

?>

