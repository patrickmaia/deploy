<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal da Turma - Login</title>
    <link rel="shortcut icon" href="/res/transparent.gif" type="image/x-icon">
    <link rel="icon" href="/res/transparent.gif" type="image/x-icon">

    <!-- jQuery -->
    <script src="res/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="res/js/bootstrap.min.js"></script>
    <link href="res/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Validator -->
    <link rel="stylesheet" href="res/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="res/js/bootstrapValidator.js"></script>
    <!-- -->

    <!-- CSS do Login -->
    <link href="res/css/login.css" rel="stylesheet">
    <!-- -->  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	<div class="container"> <!-- Início do Formulário de Login do Professor!-->

    <form action="professor/auth_professor.php" method="POST" id="formLogin" class="form-signin" role="form">
            <img src="/res/logo.gif" class="img-responsive" alt="Responsive image"> 
            <h2 class="form-signin-heading"><span class="glyphicon glyphicon-user"> </span> Professor</h2>

            <label for="loginProfessor" class="sr-only">Matrícula</label>
            <input type="text" name="loginProfessor" id="loginProfessor" class="form-control" placeholder="Matrícula" required autofocus>

            <label for="senhaProfessor" class="sr-only">Senha</label>
            <input type="password" name="senhaProfessor" id="senhaProfessor" class="form-control" placeholder="Senha" required>

            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

     <form action="aluno/auth_aluno.php" method="POST" id="formLogin" class="form-signin" role="form">
            <h2 class="form-signin-heading"><span class="glyphicon glyphicon-user"> </span> Aluno</h2>
            <label for="loginAluno" class="sr-only">Matrícula</label>
            <input type="text" name="loginAluno" id="loginAluno" class="form-control" placeholder="Matrícula" required autofocus>
            <label for="senhaAluno" class="sr-only">Senha</label>
            <input type="password" name="senhaAluno" id="senhaAluno" class="form-control" placeholder="Senha" required>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
		
	</div>

 


<div id="footer" class="container">
	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="navbar-inner navbar-content-center">
				<div class"center-block" style="text-align:center;margin-top:15px;"> <i class="glyphicon glyphicon-registration-mark"></i> 2014

 </div>
	        </div>
	</nav>
</div>

</body>
</html>
