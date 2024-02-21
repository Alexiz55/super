<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar (2)</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    
</head>
<body>
    <?php include('templates/header.php');?>


   <div class="container">
    <div class="p-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" >Detalle</th>
                    <th scope="col" >Precio</th>
                    <th scope="col" >Opciones</th>
                </tr>
            </thead>
            <tbody>
                    <?php include 'cone.php';
						 $conexion = Conecta();
						  $sqlquery="SELECT * from pizzas order by Nombre";
						 $results=mysqli_query($conexion,$sqlquery);
						 while($fila=mysqli_fetch_array($results))

                         {
                             
                            $videntificador=$fila['Id'];
                            echo "<tr>";
                            echo "<td align='Left' width='50'>".$fila['Id']."</td>";
                            echo "<td align='Left' width='50'>".$fila['Nombre']."</td>";
                            echo "<td align='Left' width='400'>".$fila['Detalle']."</td>";
                            echo "<td align='Left' width='50'>".$fila['Precio']."</td>";
                            echo "<td><a href='modi_pizzas.php?idpizza=$videntificador'><img src='assets/img/lapiz.png'width='30' height='20' ></a>";
                            echo " <a href='borrar_pizzas.php?idpizza=$videntificador'><img src='assets/img/borrar.png'width='30' height='20' ></a></td>";
                            echo "</tr>";
                         }

                    ?>
                   
                            
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


    <?php include('templates/footer.php');?>
 
</body>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</html>