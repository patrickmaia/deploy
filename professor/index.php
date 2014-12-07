<?PHP
session_name('professor');
session_start();
if ( !isset($_SESSION['loginProfessor']) and !isset($_SESSION['senhaProfessor']) ) { 
    session_destroy();
    unset ($_SESSION['loginProfessor']);
    unset ($_SESSION['senhaProfessor']);
    header('location:../index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Professor</title>
    <link rel="shortcut icon" href="../res/transparent.gif" type="image/x-icon">
    <link rel="icon" href="../res/transparent.gif" type="image/x-icon">

    <!-- jQuery -->
    <script src="../res/js/jquery-2.1.0.min.js"></script>
    <!-- Ajax !-->
    <script type="text/javascript" src="../res/js/ajax.js"></script>
    <!-- Bootstrap !-->
    <link href="../res/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../res/js/bootstrap.min.js"></script>
    <!-- Bootstrap Validator -->
    <link rel="stylesheet" href="../res/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="../res/js/bootstrapValidator.js"></script>
    <!-- Simple Sidebar-->
    <link rel="stylesheet" href="../res/css/simple-sidebar.css" >


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
  </head>
  <body>
  <div id="wrapper">

   <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <?php echo $_SESSION['nomeProfessor']; ?>
                    </a>
                </li>
                <li>
                    <a href="Avisos.php" id="showAvisos">Avisos</a>
                </li>
               
                <li>
                    <a href="Envios.php" id="showEnvios">Envios</a>
                </li>
                <li>
                    <a href="Notas.php" id="showNotas">Notas</a>
                </li>
              
            </ul>
        </div>
      <!-- Sidebar -->

<div id="page-content-wrapper">
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">   <span class="glyphicon glyphicon-list"></span> Menu </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cloud"></span> Dashboard <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="Avisos.php" id="showAvisos">Avisos</a></li>
              <li><a href="Envios.php" id="showEnvios">Envios</a></li>
              <li><a href="Notas.php" id="showNotas">Notas</a></li>
            </ul>
          </li>

        </ul>
        
          
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Ajuda</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções <b class="caret"></b></a>
            <ul class="dropdown-menu">
             <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
      </div>
      </nav>
      </div>



       
<div id="page-content-wrapper"> <!--Importante encapsular o conteúdo da página com page-content-wrapper caso contrário o conteúdo irá invadir a sidebar. -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12" id="conteudo">
      <?php 
        

        function traduzDiaSemana(){
          $dia = date("N");
          if ($dia == 7) {
            $diaSemana = "Domingo";
          } elseif($dia == 6) {
           $diaSemana = "Sábado";
          }elseif ($dia == 5) {
            $diaSemana = "Sexta";
          }elseif ($dia == 4) {
            $diaSemana = "Quinta";
          }elseif ($dia == 3) {
            $diaSemana = "Quarta";
          }elseif ($dia == 2) {
            $diaSemana = "Terça";
          }elseif ($dia == 1) {
            $diaSemana = "Segunda";
          }
          
          return $diaSemana;
        }

        function saudacao(){
          $hr = date(" H ");
          if($hr >= 12 && $hr<18) {
            $resp = "Boa tarde, ";}
          else if ($hr >= 0 && $hr <12 ){
            $resp = "Bom dia, ";}
          else {
            $resp = "Boa noite, ";}
          
          return $resp;
        }

        echo "<h3>".saudacao().$_SESSION['nomeProfessor']."!</h3> <small>".date('j/m')." - ".traduzDiaSemana()."</small>";
       ?>
        </div>
  </div>
 </div>
</div>




  </body>
</html>
