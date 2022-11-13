<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		art.nombre,
        art.precio,
        art.descripcion
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";

$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];

 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de venta</title>
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
 </head>
 <body>
 		
 		<br>
 		<table class="table">
 			<tr>
 				<td>Fecha: <?php echo $fecha; ?></td>
 			</tr>
 			<tr>
 				<td>Folio: <?php echo $folio ?></td>
 			</tr>

 		</table>


 		<table class="table">
 			<tr>
 				<td>Producto</td>
 				<td>Precio</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
 			</tr>

 			
			
			<?php 
				$sql="SELECT ve.id_venta,
							ve.fechaCompra,
							art.nombre,
							art.precio,
							art.descripcion
						from ventas  as ve 
						inner join articulos as art
						on ve.id_producto=art.id_producto
						and ve.id_venta='$idventa'";

				$result=mysqli_query($conexion,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
				?>

				<tr>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[3]; ?></td>
					<td>1</td>
					<td><?php echo $mostrar[4]; ?></td>
				</tr>
				<?php 
					$total=$total + $mostrar[3];
					}
				?>
				<tr>
					<td>Total=  <?php echo " $".$total; ?></td>
				</tr>
 		</table>
 </body>
 </html>