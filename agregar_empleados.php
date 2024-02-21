<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    
</head>
 
<body>
 <?php include ('templates/header.php');?>
 <div class="container">
 <form class="row g-3" action="guardar_empleados.php" method="POST">
  <div class="col-2">
    <label>Nombre del empleado:</label>
    <input type="text" class="form-control" name="nombre_empleado">
  </div>
  <div class="col-2">
    <label>Apellidos del empleado:</label>
    <input type="text" class="form-control" name="apellido_empleado">
  </div>
  <div class="col-3">
    <label>Número telefónico del empleado:</label>
    <input type="text" class="form-control" name="numero_telefonico">
  </div>
  <div class="col-1">
  <br>
    <input type="submit" class="btn btn-primary mb-3" name="Enviar" value="Agregar"/>
    <br><br>
  </div>
</div>
</form>
 <?php include ('templates/footer.php');?>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>