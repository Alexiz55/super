<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <style>
        /* Estilos CSS (puedes personalizarlos) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Ventas</h2>
        <form action="carrito.php" method="post">
            <input type="hidden" id="fecha_hora_actual" name="fecha_hora_actual">
            <label for="id_empleado">ID del Empleado:</label>
            <input type="text" id="id_empleado" name="id_empleado" required>
            <input type="submit" name="Enviar" value="Registrar Venta">
        </form>
    </div>
    <center><img src="templates/shopper.gif" alt="GIF"></center>
    <script>
        const fechaHoraActual = new Date().toISOString().slice(0, 16);
        document.getElementById('fecha_hora_actual').value = fechaHoraActual;
    </script>
</body>
</html>
