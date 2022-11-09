<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new ventas();

	$sql="SELECT id_venta,
				fechaCompra
			from ventas group by id_venta";
	$result=mysqli_query($conexion,$sql); 
	?>

<div class="row" style="background-color:#FFFFFF">
	<h4>.Ventas</h4>
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<tr>
					<td>Venta</td>
					<td>Fecha</td>
					<td>Productos</td>
					<td># productos</td>
					<td>Total de compra</td>
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td>
						producto
					</td>
					<td>
						cantidad
					</td>
					<td>
						<?php 
							echo "$".$obj->obtenerTotal($ver[0]);
						 ?>
					</td>
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>