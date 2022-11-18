<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>ventas</title>
	<?php require_once "menu.php"; ?>
	<style>
    body {
      	background: url("../img/fVentas.jpg"); 
      	background-size: contain;
		background-repeat: repeat;
    	margin: 0;
      	height: 100vh;
    }
  </style>
</head>
<body>

	<div class="container">
		 <h1 style="color:black"><span style="background-color:#FFFFFF">Venta de productos</span></h1>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="ventaProductosBtn">Vender</span>
		 		<span class="btn btn-default" id="ventasHechasBtn">Historial de ventas</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="ventaProductos"></div>
		 		<div id="ventasHechas"></div>
		 	</div>
		 </div>
	</div>
</body>
</html>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#ventaProductosBtn').click(function(){
				esconderSeccionVenta();
				$('#ventaProductos').load('ventas/ventasDeProductos.php');
				$('#ventaProductos').show();
			});
			$('#ventasHechasBtn').click(function(){
				esconderSeccionVenta();
				$('#ventasHechas').load('ventas/ventasyReportes.php');
				$('#ventasHechas').show();
			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventasHechas').hide();
		}

	</script>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>