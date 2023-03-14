<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap 5 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- Bootstrap 5 icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<title>Portafolio</title>
</head>
<body>
	<div class="container">
		<a href="index.php">Inicio</a> |
		<a href="<?php if(isset($_SESSION['usuario']) == 'kryptonite'){echo "portafolio.php";}else{echo "login.php";}?>">Portafolio Admin</a> |
		<?php if(isset($_SESSION['usuario']) == 'kryptonite'){echo '<a href="cerrar.php">Cerrar</a>';}?>	
	<br/>