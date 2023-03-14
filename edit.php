<?php include("includes/cabecera.php"); ?>
<?php 
    include("conexion.php");

    //consultar registro que se va a actualizar
    if($_GET) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM proyectos WHERE id='$id'";

        $objConexion=new conexion();
        $proyecto = $objConexion->consultar($sql);

        $nombre = $proyecto[0]['nombre'];
        $imagen = $proyecto[0]['imagen'];
        $descripcion = $proyecto[0]['descripcion'];
    }

    //actualizar registro
    if ($_POST) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $fecha= new DateTime();
        $imagen=$fecha->getTimeStamp()."_".$_FILES['imagen']['name'];
        $imagen_temporal=$_FILES['imagen']['tmp_name'];
        move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

        $sql = "UPDATE `proyectos` SET `nombre` = '$nombre', `imagen` = '$imagen', `descripcion` = '$descripcion' WHERE `id` = $id;";

        $objConexion=new conexion();
        $objConexion->ejecutar($sql);

        $_SESSION['message'] = 'Proyecto modificado exitosamente.';
        $_SESSION['message_type'] = 'warning';

        header('location:portafolio.php');
    }
?>

<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Actualizar informacion</h5>
                <form action="edit.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" method="post" >
                    <div class="mb-3">
                        Nombre del proyecto:
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>">
                    </div>
                    <div class="mb-3">
                        Imagen:
                        <input onchange="preview()" class="form-control" type="file" name="imagen" required>
                        <br/>
                        <img width="120" src="imagenes/<?php echo $imagen; ?>" id="thumb">
                    </div>
                    <div class="mb-3">
                        Descripcion:
                        <textarea class="form-control" name="descripcion" rows="3"><?php echo $descripcion;?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="portafolio.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/pie.php'); ?>