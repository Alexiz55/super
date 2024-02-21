<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    
</head>
 
<body>
<?php include ('templates/header.php');?>
<?php
include 'cone.php';
$conexion=Conecta();
$id=$_GET['idpizza'];

//echo "ID: " . $id;
//var_dump($id);


$busca="select * from pizzas where id=$id";
$buscasql = mysqli_query($conexion, $busca);

if ($buscasql) {
    $fila = mysqli_fetch_array($buscasql);

    if ($fila) {
        $nombre = isset($fila["Nombre"]) ? $fila["Nombre"] : '';
        $detalle = isset($fila["Detalle"]) ? $fila["Detalle"] : '';
        $precio = isset($fila["Precio"]) ? $fila["Precio"] : '';
       // var_dump( $nombre, $detalle, $precio);

      } else {
        echo "No se encontraron resultados para el ID: " . $id;
    }
} else {
    echo "Error en la consulta SQL: " . mysqli_error($conexion);
}

?>
<div class="container">
 <form class="row g-3" action="actualiza_pizzas.php" method="POST">
  <div class="col-2">
  <input type="number" class="form-control" name="idpizza" value="<?php echo $id;?>" hidden>
    <label>Nombre de la pizza:</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>" autofocus>
  </div>
  <div class="col-1">
    <label>Detalle:</label>
    <input type="text" class="form-control" name="detalle" value="<?php echo $detalle;?>">
  </div>
  <div class="col-1">
    <label>Precio:</label>
    <input type="number" class="form-control" name="precio" value="<?php echo $precio;?>">
  </div>
  <div class="col-1">
  <br>
    <input type="submit" class="btn btn-primary mb-3" name="Actualizar" value="Agregar"/>
    <br><br>
  </div>
</div>
</form>
 <?php include ('templates/footer.php');?>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>