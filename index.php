<!DOCTYPE html>
<?php
  session_start();
  session_destroy();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ingreso al sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="css/jquery/jquery-impromptu.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sistema/login.css" rel="stylesheet">
    
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-impromptu.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="js/sistema/login.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
          <h1 class="text-center login-title"><span class="glyphicon glyphicon-fire"></span> INGRESO AL SISTEMA</h1>
          <form class="form-signin" id="form_loginUsuario">
            <div class="input-group ">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" id="txt_loginUsuario" name="txt_loginUsuario" class="form-control" placeholder="Usuario" required autofocus>
            </div>
            <div class="input-group">
              <span class ="input-group-addon"><span class="glyphicon glyphicon-floppy-disk"></span></span>
              <input type ="password" id="txt_loginPass" name="txt_loginPass" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" id="btn_loginIngreso" type="submit">
              <span class="glyphicon glyphicon-log-in"></span> Ingreso</button>
              <button class="btn btn-success" type="button" id="btn_loginLimpiar">
              <span class="glyphicon glyphicon-refresh"></span> Limpiar</button>
            </div>
            <span class="clearfix"></span>
          </form>
        </div>
      </div>
    </div>
  </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
