
<?PHP
// Irá checar se existe mesmo um professor com essas credenciais, caso positivo criar uma sessão.
include('../class/PDO.class.php'); 
$login = $_POST['loginProfessor'];
$senha = $_POST['senhaProfessor'];

$stmt = $pdo->prepare("SELECT * FROM professores WHERE matriculaProfessor = :logProf AND senhaProfessor = :senProf "); 
$stmt->bindParam(':logProf', $login,PDO::PARAM_STR);
$stmt->bindParam(':senProf', $senha,PDO::PARAM_STR);

$stmt->execute();
$obj= $stmt->fetchObject();

if($obj){
	unset($_SESSION['professor']);
	session_name('professor');
	session_start();
	//Armazena detalhes cruciais na sessão iniciada.
	$_SESSION['idProfessor'] = $obj->idProfessor;
	$_SESSION['nomeProfessor'] = $obj->nomeProfessor;
	$_SESSION['matriculaProfessor'] = $obj->matriculaProfessor;
	$_SESSION['emailProfessor'] = $obj->emailProfessor;
	$_SESSION['telefoneProfessor'] = $obj->telefoneProfessor;
	$_SESSION['loginProfessor'] = $login;
	$_SESSION['senhaProfessor'] = $senha;	

	header('location:index.php');

} else{
	printf("oloco");
	session_destroy();
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../index.php');
}

?>

