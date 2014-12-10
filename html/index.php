<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: ../inicio.php');
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/logo.fw.png">

    <title>CUERPO DE BOMBEROS COTACACHI</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap/dashboard.css" rel="stylesheet">
    <link href="../css/sistema/formularios.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery/jquery-ui.css">
    <link href="../css/jquery/alertify.core.css" rel="stylesheet">
    <link href="../css/jquery/alertify.default.css" rel="stylesheet">     
    <!--<link href="../css/jquery/alertify.bootstrap.css" rel="stylesheet">-->
       
    <!-- Custom styles for this template -->
     <link href="../css/jqgrid/ui.jqgrid.css" rel="stylesheet">
    <script src="../js/jquery/jquery.js"></script>
    <script src="../js/jquery/jquery-ui.js"></script>
    <script src="../js/bootstrap/bootstrap.js"></script>
    <script src="../js/jqgrid/jquery.jqGrid.src.js"></script>
    <script src="../js/jqgrid/grid.locale-es.js"></script>
    <script src="../js/sistema/index.js"></script>
    <script src="../js/sistema/busquedas.js"></script>
    <script type="text/javascript" src="../js/jquery/alertify.js"></script>    
    


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
       
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../images/letras.fw.png" width="100%"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../inicio.php">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 sidebar tab_index" style="background: url(../images/bag.fw.png)!important;">          
          <ul class="nav nav-pills nav-stacked ">
            <li class="active"><a href="#tab_i"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
            <li><a href="#tab_a"><span class="glyphicon glyphicon-list-alt"></span> Informe General</a></li>
            <li><a href="#tab_b" ><span class="glyphicon glyphicon-pushpin"></span> Propietarios</a></li>
            <li><a href="#tab_c" ><span class="glyphicon glyphicon-share"></span> Empresas </a></li>
            <li><a href="#tab_d" ><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
            <li><a href="#tab_e" ><span class="glyphicon glyphicon-paperclip"></span> Servicios Administrativos </a></li>
            <li><a href="#tab_f" ><span class="glyphicon glyphicon-wrench"></span> Tasa por Servicio </a></li>
          </ul>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="glyphicon glyphicon-play"> Opcion 1
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked ">
                    <li class="active"><a href="#tab_i"><span class="glyphicon glyphicon-home"></span> Op1</a></li>
                    <li><a href="#tab_a"><span class="glyphicon glyphicon-list-alt"></span> Op2</a></li>                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" >
                    <span class="glyphicon glyphicon-play"> Opcion 2
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked ">
                    <li class="active"><a href="#tab_i"><span class="glyphicon glyphicon-home"></span> opc21</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
          <div class="logo">
            <img src="../images/logo2.fw.png" >
          </div>
        </div><!-- end of container -->
        <div class="col-sm-9 col-sm-offset-3 sidebar" style="background:#2E2D32;">
          <div class="tab-content content_index" id="formularios">
            <div class="tab-pane active" id="tab_i">
            <?php
            include 'inicio.html';
            ?>
            </div>
            <div class="tab-pane" id="tab_a">
            <?php
            include 'informe_general.php';
            ?>
            </div>
            <div class="tab-pane" id="tab_b">
            <?php
              include 'propietarios.php';
            ?>  
            </div>
            <div class="tab-pane" id="tab_c">
            <?php
              include 'empresas.php';
            ?>  
            </div>
            <div class="tab-pane" id="tab_d">
            <?php
              include 'usuarios.php';
            ?>  
            </div>
            <div class="tab-pane" id="tab_e">
            <?php
              include 'servicios_administrativos.php';
            ?> 
            </div>
            <div class="tab-pane" id="tab_f">
            <?php
             include 'tasa_por_servicio.php';
            ?>
            </div>
          </div><!-- tab content -->
        </div><!-- end of container -->
      </div>        
    </div>
   
    <div class="modal" id="modalBusquedas">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title"><b>BÚSQUEDA DE REGISTROS</b></h5>
          </div>
          <div class="modal-body">
          <div class="table-responsive" id="busquedasModificar">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button " class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
