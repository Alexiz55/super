<?php
session_start();
// Verificar si se ha recibido un ID de producto válido
if($_GET['id_producto']) {

    $id_producto = $_GET['id_producto'];
    echo json_encode(array('status' => 'ok'));

   // var_dump($_GET);
    //var_dump($id_producto);

    // Conectar a la base de datos (ajusta la conexión según tu configuración)
    include('cone.php');
    $conexion = conecta();

    // Obtener información del producto desde la base de datos
    $consulta_producto = $conexion->prepare("SELECT * FROM inventario WHERE id_producto = ?");
    $consulta_producto->bind_param("i", $id_producto);
    $consulta_producto->execute();
    $resultado_producto = $consulta_producto->get_result();

    if ($producto = $resultado_producto->fetch_assoc()) {
        // Verificar si existe la variable de sesión para el carrito
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        // Agregar el producto al carrito
        $_SESSION['carrito'][] = array(
            'id_producto' => $producto['id_producto'],
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio']
        );

        // Mensaje de éxito (puedes ajustar según tus necesidades)
        echo json_encode(array('status' => 'success', 'message' => 'Producto agregado al carrito correctamente'));
    } else {
        // Mensaje de error si no se encuentra el producto
        echo json_encode(array('status' => 'error', 'message' => 'Producto no encontrado'));
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Mensaje de error si no se proporciona un ID de producto válido
    echo json_encode(array('status' => 'error', 'message' => 'ID de producto no válido'));
}
?>
