<?php include("includes/cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php 

//Consultar datos de tabla proyectos
$objConexion=new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>

<br/>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
  				<div class="card-body">
    				<h5 class="card-title">Registrar proyecto</h5>
					<br/>
					<form action="create.php" method="post" enctype="multipart/form-data" >
						Nombre del proyecto: <input required class="form-control" type="text" name="proyecto" autofocus>
						<br/>
						Imagen: <input required onchange="preview()" class="form-control" type="file" name="imagen">
						<br/>
						<img width="120" id="thumb">
						<br/>
						Descripción: <textarea required class="form-control" rows="3" name="descripcion"></textarea>
						<br/>
						<input class="btn btn-success btn-block" type="submit" value="Crear proyecto">
					</form>
  				</div>
			</div>
			<br/>
			<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?php echo $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?php echo $_SESSION['message']; ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php unset($_SESSION['message']);
				  unset($_SESSION['message_type']); } ?>
		</div>
		<div class="col-md-8">
			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col">ID</th>
      					<th scope="col">Proyecto</th>
      					<th scope="col">Imagen</th>
      					<th scope="col">Descripcion</th>
						<th scope="col">Acciones</th>
    				</tr>
  				</thead>
  				<tbody>
					<?php foreach($proyectos as $proyecto){ ?>
    				<tr>
      					<th scope="row"><?php echo $proyecto['id']; ?></th>
      					<td><?php echo $proyecto['nombre']; ?></td>
      					<td>
							<img width="120" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="imagen-proyecto"></td>
      					<td><?php echo $proyecto['descripcion']; ?></td>
						<td>
							<a class="btn btn-secondary" href="edit.php?id=<?php echo $proyecto['id']; ?>">
								<i class="bi bi-pencil-square"></i>
							</a>
							<a class="btn btn-danger" href="delete.php?id=<?php echo $proyecto['id']; ?>">
								<i class="bi bi-trash"></i>
							</a>
						</td>
    				</tr>
					<?php } ?>
  				</tbody>
			</table>
		</div>
	</div>
</div>


<?php include('includes/pie.php'); ?>