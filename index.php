<?php include("includes/cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php
$objConexion=new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");
?>
<!-- Jumbotron -->
<div class="p-4 shadow-4 rounded-3" style="background-color: hsl(0, 0%, 94%);">
  <h2>Bienvenid@s</h2>
  <p>Este es un portafolio privado</p>
  <hr class="my-4" />
  <button type="button" class="btn btn-primary">
    Mas información
  </button>
</div>
<!-- Jumbotron -->

<div class="row row-cols-1 row-cols-md-3 g-4">

<?php foreach($proyectos as $proyecto){ ?>
  <div class="col">
    <div class="card">
      <img src="imagenes/<?php echo $proyecto['imagen']; ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
        <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
      </div>
    </div>
  </div>
<?php } ?>

</div>

<?php include("includes/pie.php"); ?>