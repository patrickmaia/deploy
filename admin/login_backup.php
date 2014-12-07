<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal da Turma - Login - Administrador</title>

    <!-- jQuery -->
    <script src="/res/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/res/js/bootstrap.min.js"></script>
    <link href="/res/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Validator -->
    <link rel="stylesheet" href="/res/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="/res/js/bootstrapValidator.js"></script>
    <!-- -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="center-block" style="width:50%;"> <!-- Interessante trocar o 50% por 600px (definindo um tamanho fixo) e ver a diferença. -->
	<img src="../res/logo.png" style="margin-top:5%;margin-left:15%;position:relative;"> </img>
	<div class="container-fluid"> <!-- Início do Formulário de Login !-->
		<div class="row">
			<h2> <span class="glyphicon glyphicon-user"> </span> Administrador </h2>
			<hr />
			<form class="form-horizontal" role="form" id="formLogin" method="post" action="auth_admin.php">
	  				<div class="form-group">
	    				<label for="login" class="col-sm-2 control-label"> Login: </label>
	        				<div class="col-sm-10">
	     						<input type="text" name="login" id="login" class="form-control" placeholder="Login">
	   						</div>
	 				 </div>
	  				<div class="form-group">
	   					<label for="senha" class="col-sm-2 control-label"> Senha: </label>
	    					<div class="col-sm-10">
	    						<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
	  						</div>
	  				</div>
	    			<div class="form-group">
	      				<div class="col-sm-offset-2 col-sm-10">
	        				<button type="submit"class="btn btn-success"> Login </button>
	      				</div>
	    			</div>
			</form> <!-- Fim do Formulário !-->
		 </div> 
	</div>
</div>

<script>
// $(document).ready(function() {
//     $('#formLogin').bootstrapValidator();
//  });
// </script>

<script>
$(document).ready(function() {
    $('#formLogin').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            login: {
                validators: {
                	
                    stringLength: {
                        max: 10,
                        message: 'O login possui no máximo 10 caracteres.'
                    },
                    	notEmpty: {
                		message: 'Preencha o login.'
                	}
                }
            },
            senha: {
                validators: {
                    stringLength: {
                    	min: 4,
                        max: 10,
                        message: 'A senha possui no mínimo 4 e no máximo 10 caracteres.'
                    }
                }
            }
        }
    });
});
</script>

<div id="footer" class="container">
	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="navbar-inner navbar-content-center">
				<div class"center-block" style="text-align:center;margin-top:15px;"> <i class="glyphicon glyphicon-registration-mark"></i> Projeto Final.</div>
	        </div>
	</nav>
</div>

</body>
</html>
