<?php
session_start();
// Verificar si existe la variable de sesión para el carrito
if (isset($_SESSION['carrito'])) {
    // Obtener el contenido del carrito desde la variable de sesión
    $carrito = $_SESSION['carrito'];
    // Mostrar el contenido del carrito
    echo '<ul>';
foreach($_SESSION['carrito'] as $producto) {
  echo '<li>' . $producto['nombre'] . ' - $' . $producto['precio'] . '</li>'; 
}
echo '</ul>';
} else {
    // Si no hay productos en el carrito, mostrar un mensaje
    echo '<p>El carrito está vacío</p>';
}
?>
