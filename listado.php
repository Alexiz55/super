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
include('templates/header.php');
include('cone.php');

$conexion = conecta();
$id_ticket = $_POST['id_ticket']; 

echo $id_ticket;
if (isset($_POST['Terminar']))
{
$id_ticket = $_GET['id_ticket']; 

// Obtener detalles del ticket
$stmt = $conexion->prepare("SELECT t.id_ticket, t.id_venta, t.id_empleado,  
                             t.fecha, t.id_producto, t.precio
                             FROM ticket t 
                             WHERE t.id_ticket = ?");
                             
// Enlazar parámetro                          
$stmt->bind_param("i", $id_ticket);

// Ejecutar y obtener resultados
$stmt->execute();
$result = $stmt->get_result();   

// Mostrar detalles
while($row = $result->fetch_object()) {

  echo "ID Ticket: " . $row->id_ticket;
  echo "ID Venta: " . $row->id_venta;
  echo "ID Empleado: " . $row->id_empleado;
  echo "Fecha: " . $row->fecha;
  echo "ID Producto: " . $row->id_producto;
  echo "Precio: " . $row->precio;
  
}
}
?>
</body>
</html>
