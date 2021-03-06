<?php
include './verificarSessao.class';
if($_SESSION['isAdmin'] == 1){
    include './usuariosControle.php';
    $controle = new Usuarios();
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['profissao']) && isset($_POST['tipoUsuario'])) {
        $controle->cadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['profissao'], $_POST['tipoUsuario']);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Cadastrar usuário</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  
	<!-- jQuery 3 -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="shortcut icon" href="../images/uux-icon.ico" type="image/x-icon">
  <link rel="icon" href="../images/uux-icon.ico" type="image/x-icon">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("cabecalho.php");?>
  <?php include("slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Usuários</li> <li class="active">Cadastrar usuário</li>
      </ol>
    </section>

    <section class="content">
        <div class="alert alert-success alert-dismissible" id="alertaSucesso" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Usuário cadastrado com sucesso!</h4>
            O usuário foi cadastrado com sucesso. Diga-o para entrar com a senha padrão.
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar usuário</h3>
            </div>
              <form class="form-horizontal" method="post" action="cadastrarUsuario.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="nome" class="col-sm-2 control-label">Nome</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: Francisco José">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ex.: seuemail@email.com">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="profissao" class="col-sm-2 control-label">Profissão</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="profissao" id="profissao" placeholder="Ex.: Professor">
                  </div>
                </div>
                  
                <div class="form-group">
                    <label for="tipoUsuario" class="col-sm-2 control-label">Tipo de usuário</label>

                    <div class="col-sm-10">
                        <select class="form-control col-sm-10" name="tipoUsuario">
                            <option>Avaliador</option>
                            <option>Administrador</option>
                          </select>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("../rodape.php");?>

</div>
</body>

<?php
if(isset($_GET['sucesso'])){
    ?> 
    <script>
        document.getElementById('alertaSucesso').style.display = 'block';
        $("#alertaSucesso").fadeTo(7000, 500).slideUp(500, function(){
            $("#alertaSucesso").alert('close');
        });
    </script>
    <?php
}
?>
</html>

<?php 
} ?>
