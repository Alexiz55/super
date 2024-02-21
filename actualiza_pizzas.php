<html>
    <head>
    <meta charset="UTF-8">
    <title>Guardando...</title>
    <script src="assets/js/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    </head>
    <body>
 
<?php
     
            //conexcion a la BD
            include ('cone.php');
            $conexion = Conecta();
        //recibe parametros del formulario  
    if (isset($_POST['Actualizar']))
        {    
           
            $nombre=$_POST['nombre'];
            $detalle=$_POST['detalle'];
            $precio=$_POST['precio'];
            $id=$_POST['idpizza'];
             
 
 
         // iActualiza a la base de datos
            $actualiza="update pizzas set nombre='$nombre',detalle='$detalle',precio=$precio where id=$id";  
            $actualizasql=mysqli_query($conexion,$actualiza) ;
 
                   
           
            if (mysqli_affected_rows($conexion) != 0)
            {
                  echo "<script>swal({title: 'Listo!',text: '¡Se modifico con exito!',type: 'success',confirmButtonText: '¡Ok!'},function() {location.href = 'busca_pizzas.php';});</script>";
            }
           
           
            else
            {
                echo "<script>swal({title: 'Error',text: '¡Error al intentar guardar la informacion!',type: 'error',confirmButtonText: '¡Ok!'},function() {location.href = 'busca_pizzas.php';});</script>";
            }
 
        }
        ?>
        </body>