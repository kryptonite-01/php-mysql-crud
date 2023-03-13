<?php 
session_start();
if($_POST){
	if(($_POST['usuario']=='kryptonite') && ($_POST['contrasenia']=='12345')){
		$_SESSION['usuario']='kryptonite';
		header('location:portafolio.php');
	}
	else {
		echo "<script>alert('Usuario o contraseña incorrecta')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
  					<div class="card-body">
    					<h5 class="card-title">Iniciar sesión</h5>
    					<br/>
    					<form action="login.php" method="post">
							Usuario: <input required class="form-control" type="text" name="usuario">
							<br/>
							Contraseña: <input required class="form-control" type="password" name="contrasenia">
							<br/>
							<button class="btn btn-success" type="submit">Entrar al portafolio</button>
						</form>
  					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>