<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Forma de Extração</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
  
    <link rel="stylesheet" href="../../../dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../../../assets/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="../../../dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
  
	<!-- jQuery 3 -->
	<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="../../../plugins/iCheck/icheck.min.js"></script>
	<!-- FastClick -->
	<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../../dist/js/adminlte.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- Select 2 -->
    <link rel="stylesheet" href="../../../dist/css/select2.css"/>
    <script src="../../../dist/js/select2.js"></script>
    <script src="../../../dist/js/translation.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Selecione',
                minimumResultsForSearch: Infinity
            })
        })
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include_once("cabecalho.php");?>
        <?php include_once("slidebar.php");?>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                UUX-Posts
                <small>Versão 2.0</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Extração de PRUs</li>
              </ol>
            </section>

            <section class="content">
                <?php include_once("../avaliacaoEmAndamento.php");?>
                <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Escolha a forma de extração das postagens</h3>
                        </div>
                        
                        <div class="box-body" id="escolhaForma">
                            <div class="list-group">
                                <button type="button" onclick="abrirEscolhaSite()" class="list-group-item">Extração automática de um site</button>
                                <button type="button" onclick="abrirEnvioPlanilha()" class="list-group-item">Envio de uma planilha de postagens</button>
                            </div>
                        </div>
                        
                        <div class="box-body" id="escolhaSite" style="display: none">
                            <form> 
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Informe o site para extração das postagens</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex.: twitter.com">
                                  <small id="emailHelp" class="form-text text-muted">Essa funcionalidade pode apresentar problemas ao tentar extrair de outros sites além do Twitter.</small>
                                </div>
                            </form>
                        </div>
                        
                        <div class="box-body" id="envioPlanilha" style="display: none">
                            <form> 
                                <div class="form-group">
                                    <label for="foto" class="control-label">Envie uma planilha com postagens</label> <br>
                                    <div class="btn btn-default btn-file">
                                        <i class="fa fa-paperclip"></i> Escolher arquivo de planilha
                                        <input type="file" name="attachment">
                                    </div> <br>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div id="btnVoltar" style="float: left; padding-bottom: 10px; display: none">
                        <button class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
                    </div>
                    <div id="btnSalvar" style="float: right; padding-bottom: 10px; display: none">
                        <button class="btn btn-info" onclick="proximo()" style="margin-right: 10px;">Salvar e próximo</button>
                    </div>
                </div>
                <a style="color: #ecf0f5">'</a>
            </section>
        </div>
        <?php include_once("../../../rodape.php");?>
    </div>
</body>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-left: 10px;
    padding-right: 10px;
}

.content{
    padding-right: 5px;
}
</style>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
    ga('send', 'pageview');
    
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    });
    
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
    
    function proximo(){
        window.location.href = "../etapa2/processamentoPostagens.php";
    }
    
    function abrirEscolhaSite(){
        document.getElementById('escolhaSite').style.display = 'block';
        document.getElementById('btnVoltar').style.display = 'block';
        document.getElementById('btnSalvar').style.display = 'block';
        document.getElementById('escolhaForma').style.display = 'none';
        document.getElementById('envioPlanilha').style.display = 'none';
    }
    
    function abrirEnvioPlanilha(){
        document.getElementById('envioPlanilha').style.display = 'block';
        document.getElementById('btnVoltar').style.display = 'block';
        document.getElementById('btnSalvar').style.display = 'block';
        document.getElementById('escolhaForma').style.display = 'none';
    }
    
    function voltar(){
        document.getElementById('escolhaSite').style.display = 'none';
        document.getElementById('envioPlanilha').style.display = 'none';
        document.getElementById('btnVoltar').style.display = 'none';
        document.getElementById('btnSalvar').style.display = 'none';
        document.getElementById('escolhaForma').style.display = 'block';
    }
    </script>

</html>