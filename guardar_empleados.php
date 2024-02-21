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
    $nombre= $_POST['nombre_empleado'];
    $apellido= $_POST['apellido_empleado'];
    $telefono= $_POST['numero_telefonico'];

    $insertar="insert into empleados (nombre_empleado,apellido_empleado,numero_telefonico) values ('$nombre','$apellido','$telefono')";
    $insertaslq=mysqli_query($conexion,$insertar);

if ($insertaslq)
            {
                  echo "<script>swal({title: 'Listo!',text: '¡Se guardo con exito!',type: 'success',confirmButtonText: '¡Ok!'},function() {location.href = 'agregar_empleados.php';});</script>";
            }
           
           
            else
            {
                echo "<script>swal({title: 'Error',text: '¡Error al intentar guardar la informacion!',type: 'error',confirmButtonText: '¡Ok!'},function() {location.href = 'agregar_empleados.php';});</script>";
            }
        }
?>
</body>






