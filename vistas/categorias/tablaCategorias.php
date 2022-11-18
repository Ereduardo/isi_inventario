

	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_categoria,nombreCategoria 
					FROM categorias";
			$result=mysqli_query($conexion,$sql);
	 ?>

<div style="background-color:#FFFFFF">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>CATEGORIAS</label></caption>
	<tr>
		<td></td>
		<td>Categoria</td>
		<td>Editar</td>
		<td>Eliminar</td>
		<td></td>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td></td>
		<td><?php echo $ver[1] ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaCategoria('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		<td></td>
	</tr>

<?php endwhile; ?>
</table>
<br>
</div>