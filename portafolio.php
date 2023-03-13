<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php 
if($_POST){
	
	$nombre=$_POST['proyecto'];
	$descripcion=$_POST['descripcion'];

	$fecha= new DateTime();

	$imagen=$fecha->getTimeStamp()."_".$_FILES['imagen']['name'];

	$imagen_temporal=$_FILES['imagen']['tmp_name'];

	move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

	$objConexion=new conexion();
	$sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
	$objConexion->ejecutar($sql);

	header('location:portafolio.php');
}

if($_GET){
	$id=$_GET['borrar'];
	$objConexion=new conexion();

	//eliminar imagen de la carpeta "imagenes"
	$imagen=$objConexion->consultar("SELECT imagen FROM proyectos WHERE id=".$id);
	unlink("imagenes/".$imagen[0]["imagen"]);

	//eliminar registro de la base de datos
	$sql="DELETE FROM `proyectos` WHERE `proyectos`.`id`=".$id;
	$objConexion->ejecutar($sql);

	header('location:portafolio.php');
}

$objConexion=new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>

<br/>
<div class="container">
	<div class="row">
		<div class="col-md-6">

			<div class="card">
  				<div class="card-body">
    				<h5 class="card-title">Registrar proyecto</h5>
					<br/>
					<form action="portafolio.php" method="post" enctype="multipart/form-data" >
						Nombre del proyecto: <input required class="form-control" type="text" name="proyecto">
						<br/>
						Imagen: <input required class="form-control" type="file" name="imagen">
						<br/>
						Descripción: <textarea required class="form-control" rows="3" name="descripcion"></textarea>
						<br/>
						<input class="btn btn-success" type="submit" value="Crear proyecto">
					</form>
  				</div>
			</div>
		</div>
		<div class="col-md-6">
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
						<td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
    				</tr>
					<?php } ?>
  				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('pie.php'); ?>