<?php
//Creamos sesión y una conexión con la base de datos.
//ob_start("ob_gzhandler");
session_start();
include('cone.php');
$conexion=conecta();
$conexion->set_charset("utf8");
//Comprobamos que la variable $carro tenga valor.
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
//Hacemos la consulta a la base de datos para mostrar los productos
$sql=$conexion->query("SELECT * FROM inventario WHERE id='$id'", $conexion) or
die("Query error: ". $mysqli->error);
...
<!DOCTYPE html PUBLIC ...
...
 <?php if($carro){ // Si $carro tiene algo lo muestra en la tabla. ?>
<table>
    <tr>
      <td width="9%">Identificador</td>
      <td width="14%">Nombre</td>
      <td width="48%">descripcion</td>
      <td width="19%">PRECIO</td>
      <td width="10%">BORRAR</td>
    </tr>
<?php $color=array("#666666","#777777");
$contador=0;
$suma=0;
foreach($carro as $k => $v){
       $row = $sql->fetch_assoc();
       $subto=$v['existencias']*$v['precio'];
       $suma=$suma+$subto;
       $contador++; ?>
<form name="a<?php echo $v['id_producto'] ?>" method="post" action="
agregacar.php?<?php echo SID ?>&id=<?php echo $row['id_producto']?>"
id="a<?php echo $v['id_producto'] ?>">
    <tr bgcolor="<?php echo $color[$contador%2]; ?>">
      <td>
        <?php //cogemos como código el nombre de la imagen menos el .jpg.
        $codigoImagen = substr($v['imagen'],0,-4);
        echo $codigoImagen  ?>
      </td>
      <td>
          <?php //ponemos la miniatura del producto con link a su detalle. ?>
        <a href="detalle-producto.php?<?php echo SID ?>&id=<?php echo $v['id']?>">
        <img src="img/obras/mini/<?php echo $v['imagenproducto'] ?>"/></a>
      </td>
      <td>
        <?php ////ponemos el título del producto con link a su detalle. ?>
        <a href="detalle-producto.php?<?php echo SID ?>&id=<?php echo
        $v['id_producto']?>"><?php echo $v['nombre'] ?></a>
      </td>
      <td>
      <?php //ponemos el precio del producto. ?>
      <?php echo $v['precio'] ?> €<br />
      </td>
      <td><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id_producto'] ?>
      &precio=<?php echo $precio ?>"><img src="img/btBorrar.gif" alt="Borrar
       obra de pedido" width="20" height="20" /></a><a href="borracar.php?<?php echo
       SID ?>&id=<?php echo $v['id_producto'] ?>&precio=<?php echo $precio ?>"></a>
      </td>
     </tr></form>
     <tr>
<?php } //fin foreach ?>
      <td colspan="5"><p>TOTAL  PRODUCTOS:
      <?php echo count($carro); ?><br />
      TOTAL PRECIO: <?php echo number_format($suma,2); ?> &euro;</p></td>
    </tr>
</table>
<div id="boton"><a href="index.php?<?php echo SID?>">CONTINUAR COMPRA</a></div>
<div id="boton"><a href="pedido.php?<?php echo SID?>&precio=<?php echo $precio ?>">FINALIZAR COMPRA</a></div>
<?php }else{ // // Si $carro NO tiene nada solo muestra un link a index.php.?>
<p>El carrito de compra está vacío.</p>
<div id="boton"><a href="index.php<?php echo SID?>">CONTINUAR COMPRA</a></div>
<?php }?>
<?php //Al final del archivo liberamos recursos
$sql->free();
$conn->close();
ob_end_flush(); ?>