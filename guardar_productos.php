<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
</head>
<body>
<?php
include('cone.php');
$conexion=conecta();

if (isset($_POST['Enviar']))
{
    $nombre= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $precio= $_POST['precio'];
    $existencias= $_POST['existencias'];
    $imagen= $_POST['imagen'];

    $insertar="insert into inventario (nombre,descripcion,precio,existencias,imagen) values ('$nombre','$descripcion',$precio,$existencias,'$imagen')";
    $insertaslq=mysqli_query($conexion,$insertar);

if ($insertaslq)
            {
                  echo "<script>swal({title: 'Listo!',text: '¡Se guardo con exito!',type: 'success',confirmButtonText: '¡Ok!'},function() {location.href = 'agregar_productos.php';});</script>";
            }
           
           
            else
            {
                echo "<script>swal({title: 'Error',text: '¡Error al intentar guardar la informacion!',type: 'error',confirmButtonText: '¡Ok!'},function() {location.href = 'agregar_productos.php';});</script>";
            }
        }
?>
</body>