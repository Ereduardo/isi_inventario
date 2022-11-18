<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="icon" href="../img/icono.png">
	<?php 
		require_once "menu.php"; 
	?>
	<style>
    body {
      background: url("../img/inventario.jpg"); 
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;
    }
  </style>
</head>
<body>

	<div align="center" >
		<H1 ><span style="background-color:#FFFFFF"><b>BIENVENIDO</b></span></H1>
		<h3><span style="background-color:#FFFFFF"><b>Esta es una pagina de gestion y venta de productos.</b></span></h3>
		<h4><span style="background-color:#FFFFFF"><b>
			Para empezar estas en el inicio de nuestra pagina, aquí puedes aprender a usar nuestro sitio web. En la parte superior<br>
			de nuestro menut sale una imagen como esta <img src="../img/logo.png" height="30"/> esta la puede usar siempre que quiera regresar a esta ventana,<br>
			luego tienes los siguites botones <img src="../img/lBotones.png" height="30"/> el boton de ventas <img src="../img/bVentas.png" height="30"/> lo llevara a una ventana <br>
			en la cual usted decidesi quiere hacer una venta nueva o quiere revisar el historial de las ventas realizadas, si elige <br>
			realizar ventas, le saldra un formulario el cual solo le pide el nombre del producto el cual ya tiene que haber registrado <br>
			anteriormente y automaticamente se llenara el formulario, mostradno la cantidad de este productouna descriccion del producto,<br>
			el precio y una imagen del producto seleccionado. Luego de llenar el formulario saldra un boton el cual le indicara si quiere agregar<br> 
			el producto al carro de compras luego de agregarlo, luego de agragar el producto al carro de compras puede agreagar todos los<br>
			productos que quiera, claramente solo puede agregar al carro de compras la cantidad de productos diponibles. sobre la tabla del <br>
			carro de compras
			sale un boton el cual genera la compra, las compras realizadas las puede consultar en el historial de ventas.
		</b></span></h4>

		<h4><span style="background-color:#FFFFFF"><b>
			El usuario ADMIN es aquier que tiene como usuario "admin" este entra permisos adicionales tales como editar, eliminar y <br>
			agragar ya sea un producto o tambine usuarios.
		</span></b></h4>

		<h4><span style="background-color:#FFFFFF"><b>
			El boton <img src="../img/bInventario.png" height="30"/> muestra un menut desplegable como este <img src="../img/bAInventario.png" height="40"/> el boton categoria, sirve para poder clasificarlos<br> 
			que quiere agregar a su inventario, con el boton de productos disponibles puede conusltar el inventario que tiene disponible<br>
			mostrando el nombre del producto, el precio, la cantidad disponible, la fecha de ingreso etc. Aquí tambine puede agragar, <br>
			editar y eliminar sus producto, llenando el formulario que se encuntra a la izquierda (los productos y las categorias <br>
			solo las puede agragar, editar y eliminar el usuario ADMIN).
		</span></b></h4>
		

	</div>		

</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>