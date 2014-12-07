
<?PHP

include('../class/PDO.class.php'); 
$login = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("SELECT * FROM auth_admin WHERE loginAdmin = :logadm AND senhaAdmin = :senadm "); 
$stmt->bindParam(':logadm', $login,PDO::PARAM_STR);
$stmt->bindParam(':senadm', $senha,PDO::PARAM_STR);

$stmt->execute();
$obj= $stmt->fetchObject();

if($obj){
	session_name('admin');
	session_start();
	//Armazena detalhes cruciais na sessão iniciada.
	$_SESSION['loginAdmin'] = $login;
	$_SESSION['senhaAdmin'] = $senha;	
	$_SESSION['idAdmin']=$obj->idAdmin;
	$_SESSION['nomeAdmin']=$obj->nomeAdmin;
	$_SESSION['emailAdmin']=$obj->emailAdmin;
	$_SESSION['turmaAdmin']=$obj->turmaAdmin;

	header('location:index.php');

} else{
	session_destroy();
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:login.php');
}

?>

