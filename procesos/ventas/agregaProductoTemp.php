<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();

	
	$idproducto=$_POST['productoVenta'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$precio=$_POST['precioV'];

	$sql="SELECT nombre 
			from articulos 
			where id_producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];
		
			if($cantidad >= 1){
				$cantidad--;
				$parar++;

			$articulo=$idproducto."||".
						$nombreproducto."||".
						$descripcion."||".
						$precio;
			
			$_SESSION['tablaComprasTemp'][]=$articulo;

			}
		
 ?>