
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="icon" href="../img/icono.png">
</head>
<body style="background: url(../img/fondo.jpg);">

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <h1 style="color:#FFFFFF" >TU INVENTARIO</h1>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-left">

              <li class="active"><a href="ventas.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
              </li>

              
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>Productos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="categorias.php">Categorias</a></li>
                  <li><a href="articulos.php">Productos</a></li>
                </ul>
              </li>              
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php
              if($_SESSION['usuario']=="admin"):
              ?>
                <li>
                  <a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
                </li>
                  <?php 
                endif;
                    ?>
              
              <li class="dropdown" >
                <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li> <a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>                 
                </ul>
              </li>  
          </ul>

      </div>
    </div>
  </div>
</div>
</body>
</html>
