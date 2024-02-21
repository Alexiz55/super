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
    
      <style>
        .container {
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php include ('templates/header.php');
//include('cone.php');
$conexion=conecta();

?>
<center><h2>Ticket</h2></center>
<div class="container">
    <form action="ticket.php" method="POST">
    <select name="producto_id">
        <?php
    $sqlquery = "SELECT * FROM inventario ORDER BY nombre";
    $results = mysqli_query($conexion, $sqlquery) or die("Error al verificar existencia");
    while ($fila = mysqli_fetch_array($results)) {
        echo '<option value="' . $fila["id_producto"] . '">' . utf8_encode($fila["nombre"]) . '</option>';
    }
    ?>
    </select>
    <div class="col-1">
    <label>ID del ticket:</label>
            <input type="text" name="id_ticket" required>
    </div>
    <br><br>
    <div class="col-1">
        <input type="submit" class="btn btn-primary mb-3" name="Enviar" value="Agregar"/>
    </div>
    </form>

    <center><form action="listado.php" method="POST">
    <div class="col-2">
        <input type="submit" class="btn btn-primary mb-3" name="Terminar" value="Terminar"/>
    </div>
    
    </form></center>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$id_ticket = $_POST['id_ticket']; 

echo ("ticket #".$id_ticket);

?>
