
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT art.nombre,
					art.descripcion,
					cat.nombreCategoria,
					art.cantidad,
					art.precio,
					art.fechaCaptura,
					img.ruta,
					art.id_producto
		  from articulos as art 
		  inner join imagenes as img
		  on art.id_imagen=img.id_imagen
		  inner join categorias as cat
		  on art.id_categoria=cat.id_categoria";
	$result=mysqli_query($conexion,$sql);

 ?>
<div style="background-color:#FFFFFF">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<br>
		<caption><label>.INVENTARIO DISPONIBLE</label></caption>
		<tr>
			<td></td>
			<td><b>Productos</b></td>
			<td><b>Descripcion</b></td>
			<td><b>Categoria</b></td>
			<td><b>Cantidad Disponible</b></td>
			<td><b>Precio</b></td>
			<td><b>Fecha y hora de ingreso</b></td>
			<td><b>Imagen</b></td>
			<td><b>Editar</b></td>
			<td><b>Eliminar</b></td>
			<td></td>
		</tr>

		<?php while($ver=mysqli_fetch_row($result)): ?>

		<tr>
			<td></td>
			<td><?php echo $ver[0]; ?></td>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td>
				<?php 
				$imgVer=explode("/", $ver[6]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
				?>
				<img width="80" height="80" src="<?php echo $imgruta ?>">
			</td>
			<td>
				<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[6] ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[6] ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
			<td></td>
		</tr>
	<?php endwhile; ?>
	</table>
	<br>
</div>