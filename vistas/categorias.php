<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>categorias</title>
		<?php require_once "menu.php"; ?>
		<style>
    body {
      background: url("../img/fondo.jpg"); 
      background-size: cover;
      background-repeat: repeat;
      margin: 0;
      height: 100vh;
    }
  </style>
	</head>
	<body>

		<div class="container" >
			<h1><span style="background-color:#FFFFFF">Categorias</span></h1>
				<?php
				if($_SESSION['usuario']=="admin"):
				?>
					<div class="row" >
						<div class="col-sm-4" style="background-color:#FFFFFF">
							<form id="frmCategorias">
								<br>
								<label>Categoria</label>
								<input type="text" class="form-control input-sm" name="categoria" id="categoria">
								<span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
							</form>
							<br>
					</div>
				<?php 
				endif;
				?>
				<div class="col-sm-6" >
					<div id="tablaCategoriaLoad"></div>
				</div>
		</div>

		<!-- Button trigger modal -->

		<!--metodo para editar las categorias-->
		<?php
              if($_SESSION['usuario']=="admin"):
            ?>
                <div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Actualiza categorias</h4>
							</div>
							<div class="modal-body">
								<form id="frmCategoriaU">
									<input type="text" hidden="" id="idcategoria" name="idcategoria">
									<label>Categoria</label>
									<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
								</form>


							</div>
							<div class="modal-footer">
								<button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>

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
		$(document).ready(function(){

			$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

			$('#btnAgregaCategoria').click(function(){

				vacios=validarFormVacio('frmCategorias');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmCategorias').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/agregaCategoria.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmCategorias')[0].reset();

					$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
					alertify.success("Categoria agregada con exito :D");
				}else{
					alertify.error("No se pudo agregar categoria");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaCategoria').click(function(){

				datos=$('#frmCategoriaU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/actualizaCategoria.php",
					success:function(r){
						if(r==1){
							$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actaulizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function agregaDato(idCategoria,categoria){
			$('#idcategoria').val(idCategoria);
			$('#categoriaU').val(categoria);
		}

		//metodo para eliminar las categorias
		<?php
              if($_SESSION['usuario']=="admin"):
            ?>
                function eliminaCategoria(idcategoria){
					alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
						$.ajax({
							type:"POST",
							data:"idcategoria=" + idcategoria,
							url:"../procesos/categorias/eliminarCategoria.php",
							success:function(r){
								if(r==1){
									$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
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
	<?php 
}else{
	header("location:../index.php");
}
?>