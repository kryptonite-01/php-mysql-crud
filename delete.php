<?php 
include("conexion.php");
session_start(); 

if($_GET){
	echo "<script>alert('Seguro que desea eliminar la informacion?')</script>";

	$id=$_GET['id'];
	$objConexion=new conexion();

	//eliminar imagen de la carpeta "imagenes"
	$imagen=$objConexion->consultar("SELECT imagen FROM proyectos WHERE id=".$id);
	unlink("imagenes/".$imagen[0]["imagen"]);

	//eliminar registro de la base de datos
	$sql="DELETE FROM `proyectos` WHERE `proyectos`.`id`=".$id;
	$objConexion->ejecutar($sql);

	$_SESSION['message'] = 'Proyecto eliminado exitosamente.';
  	$_SESSION['message_type'] = 'danger';

	header('location:portafolio.php');
}
?>