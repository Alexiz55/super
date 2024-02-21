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
 <div class="container">
    <div class="row">
        <form name="pizzas" action="modi_pizza.php" method="POST">
            <div class="col-6">
                <label class="form-control-label">Pizzas</label>
                <select class="form-control" name="idpizza">
                    <?php
                    // Conexion y query
                    include 'cone.php';
                    $conexion = Conecta();
                    $sqlquery = "SELECT * FROM pizzas ORDER BY nombre";
                    $results = mysqli_query($conexion, $sqlquery) or die("Error al verificar Existe");
                    while ($fila = mysqli_fetch_array($results)) {
                        echo '<option value="' . $fila["Id"] . '">' . utf8_encode($fila["Nombre"]) . '</option>';
                    }
                    
                    ?>
                    <div class="col-1">
                      <br>
                        <input type="submit" class="btn btn-primary mb-3" name="Enviar" value="Buscar"/>
                        <br><br>
                      </div>
                </select>
            </div>
        </form>
</div>
</div>
 <?php include ('templates/footer.php');?>

   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>