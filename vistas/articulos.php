<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>articulos</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php";
		require_once "dependencias.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombreCategoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
		<style>
			body {
			background: url("../img/fondo.jpg"); 
			background-size: cover;
			background-repeat: repeat;
			margin: 0;
			height: 10px;
			}
		</style>
	</head>
	<body>
		<div class="container" style="background-color:#FFFFFF">
			<h3><b>AGREGA UN</b></h3>
			<h3><b>PRODUCTO NUEVO</b></h3>
			<div class="row">
				<?php
					if($_SESSION['usuario']=="admin"):
				?>
					<div class="col-sm-4">
						<form id="frmArticulos" enctype="multipart/form-data">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
								<option value="A">Selecciona Categoria</option>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nombre Del Producto</label>
							<input type="text" class="form-control input-sm" id="nombre" name="nombre">
							<label>Descripcion Del Prodcuto</label>
							<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
							<label>Cantidad Disponible</label>
							<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
							<label>Precio Del Producto</label>
							<input type="text" class="form-control input-sm" id="precio" name="precio">
							<label>Imagen De Referencia</label>
							<input type="file" id="imagen" name="imagen">
							<p></p>
							<span id="btnAgregaArticulo" class="btn btn-primary">AGREGAR EL PRODUCTO</span>
							
						</form>
					</div>
				<?php 
					endif;
				?>

				<div class="col-sm-8">
					<div id="tablaArticulosLoad"></div>
				</div>
			</div>
			<br>
		</div>		
		<!--metodo para editar los productos-->
			<?php
					if($_SESSION['usuario']=="admin"):
				?>
					<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Actualizar Productos</h4>
								</div>
								<div class="modal-body">
									<form id="frmArticulosU" enctype="multipart/form-data">
										<input type="text" id="idArticulo" hidden="" name="idArticulo">
										<label>Categoria</label>
										<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
											<option value="A">Selecciona Categoria</option>
											<?php 
											$sql="SELECT id_categoria,nombreCategoria
											from categorias";
											$result=mysqli_query($conexion,$sql);
											?>
											<?php while($ver=mysqli_fetch_row($result)): ?>
												<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
											<?php endwhile; ?>
										</select>
										<label>Nombre Del Producto</label>
										<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
										<label>Descripcion</label>
										<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
										<label>Cantidad Disponible</label>
										<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
										<label>Precio</label>
										<input type="text" class="form-control input-sm" id="precioU" name="precioU">
										
									</form>
								</div>
								<div class="modal-footer">
									<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

								</div>
							</div>
						</div>
					</div>
				<?php 
					endif;
				?>


	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosArticulo(idarticulo){
			$.ajax({
				type:"POST",
				data:"idart=" + idarticulo,
				url:"../procesos/articulos/obtenDatosArticulo.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idArticulo').val(dato['id_producto']);
					$('#categoriaSelectU').val(dato['id_categoria']);
					$('#nombreU').val(dato['nombre']);
					$('#descripcionU').val(dato['descripcion']);
					$('#cantidadU').val(dato['cantidad']);
					$('#precioU').val(dato['precio']);

				}
			});
		}

		//metodo para eliminar los productos
		<?php
			if($_SESSION['usuario']=="admin"):
		?>
			function eliminaArticulo(idArticulo){
				alertify.confirm('¿Desea eliminar este producto?', function(){ 
					$.ajax({
						type:"POST",
						data:"idarticulo=" + idArticulo,
						url:"../procesos/articulos/eliminarArticulo.php",
						success:function(r){
							if(r==1){
								$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
								alertify.success("Eliminado con exito!!");
							}else{
								alertify.error("No se pudo eliminar :(");
							}
						}
					});
				}, function(){ 
					alertify.error('Cancelo !')
				});
			}		
		<?php 
			endif;
		?>


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaarticulo').click(function(){
				vacios=validarFormVacio('frmArticulosU');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmArticulosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/articulos/actualizaArticulos.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("Error al actualizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

			$('#btnAgregaArticulo').click(function(){

				vacios=validarFormVacio('frmArticulos');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmArticulos"));

				$.ajax({
					url: "../procesos/articulos/insertaArticulos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmArticulos')[0].reset();
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Agregado con exito :D");
						}else{
							alertify.error("Fallo al subir el archivo :(");
						}
					}
				});
				
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>