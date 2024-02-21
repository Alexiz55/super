<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <style>
        .productos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .producto {
            width: 300px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .producto:hover {
            transform: scale(1.05);
        }

        .producto img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .producto figcaption {
            padding: 15px;
            text-align: center;
        }

        .producto h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .producto p {
            margin-bottom: 15px;
            color: #007bff;
            font-weight: bold;
        }

        .producto button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .producto button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include('templates/header.php');?>
    <div class="productos-container">
        <?php
        
        include('cone.php');

        // Establecer conexión
        $conexion = conecta();
        $id_empleado= $_POST['id_empleado'];
        // Consulta SQL para obtener los productos
        $consulta = $conexion->query("SELECT * FROM inventario");

        // Bucle para mostrar los productos
        while ($producto = $consulta->fetch_assoc()) {
        ?>
            <div class="producto">
                <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
                <figcaption>
                    <h3><?= $producto['nombre'] ?></h3>
                    <p>Precio: $<?= $producto['precio'] ?></p>
                    <button onclick="agregarAlCarrito(<?=$producto['id_producto']?>)">Agregar al carrito</button>
                  </figcaption>
            </div>
        <?php
        }

        // Cerrar conexión
        $conexion->close();
        ?>
    </div>
    <div id="carrito">
    <form class="row g-3" action="obtener_carrito.php" method="GET">
    <h2>Carrito</h2>
    <div class="col-1">
  <br>
    <button type="submit" class="btn btn-primary mb-3" name="Enviar" value="Ver carrito">Ver carrito</button>
    <br><br>
  </div>
      </form>
</div>
    <?php include ('templates/footer.php');?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
