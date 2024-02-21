<html>
    <head>
    <meta charset="UTF-8">
    <title>Guardando...</title>
    <script src="assets/js/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    </head>
    <body>
 
    <?php

include('cone.php');
$conexion = Conecta();

if (isset($_GET['idpizza'])) {
    $idpizza = $_GET['idpizza'];

    //eliminar la pizza
    $borrar_query = "DELETE FROM pizzas WHERE Id = $idpizza";
    $borrar_resultado = mysqli_query($conexion, $borrar_query);

    if ($borrar_resultado) {
        echo "<script>swal({title: 'Listo!', text: '¡Se borró con éxito!', type: 'success', confirmButtonText: '¡Ok!'}, function() {location.href = 'busca_pizzas.php';});</script>";
    } else {
        echo "<script>swal({title: 'Error', text: '¡Error al intentar borrar la información!', type: 'error', confirmButtonText: '¡Ok!'}, function() {location.href = 'busca_pizzas.php';});</script>";
    }
} else {
    echo "<script>swal({title: 'Error', text: '¡ID de pizza no proporcionado!', type: 'error', confirmButtonText: '¡Ok!'}, function() {location.href = 'busca_pizzas.php';});</script>";
}
?>
</body>