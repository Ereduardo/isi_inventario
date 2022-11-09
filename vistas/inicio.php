<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="icon" href="../img/icono.png">
	<?php require_once "menu.php"; ?>
</head>
<body>


</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>