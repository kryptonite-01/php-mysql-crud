<?php
include("conexion.php");
session_start();

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

	$_SESSION['message'] = 'Proyecto creado exitosamente.';
  	$_SESSION['message_type'] = 'success';

	header('location:portafolio.php');
}

?>