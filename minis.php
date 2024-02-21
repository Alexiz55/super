<?php
//Creamos sesión y una conexión con la base de datos.

session_start();
include('cone.php');
$conexion=conecta();
extract($_REQUEST);
//Comprobamos que la variable $carro tenga valor.
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
...
<!DOCTYPE html PUBLIC ...
...
<h1>carrito de compra</h1>
<form class="formPedido" id="formPedido" name="formPedido" method="post" 
action="pedidoEnviarScript.php">
<table>
    <tr>
        <td width="9%">CÓDIGO</td>
        <td width="14%">IMAGEN</td>
        <td width="58%">T&Iacute;TULO</td>
        <td width="19%">PRECIO</td>
    </tr>
<?php
$color=array("#666666","#777777");
$contador=0;
$suma=0;
foreach($carro as $k => $v){
    $subto=$v['cantidad']*$v['precio'];
    $suma=$suma+$subto;
    $contador++;
?>
    <tr bgcolor="<?php echo $color[$contador%2]; ?>">
        <td><?php
//cogemos como código el nombre de la imagen menos el .jpg
$codigoImagen = substr($v['imagenproducto'],0,-4);
echo $codigoImagen ?></td>
        <td><img src="img/obras/mini/<?php echo $v['imagenproducto'] ?>" 
        height="40" /></td>
        <td><?php echo $v['titulo'] ?></td>
        <td><?php echo $v['precio'] ?> €</td>
    </tr>
    <tr>
<?php 
$codigos[]= $codigoImagen;
$cantidades[]= $v['cantidad'];       
$cantidadTotalProd= array_sum($cantidades);
}?>
        <td colspan="5"><p>TOTAL  OBRAS:
<?php echo count($carro); ?><br />
TOTAL PRECIO:<?php echo number_format($suma,2); ?> &euro;</p>
        </td>
    </tr>
</table>
<h2>Datos personales de entrega</h2>
<p><h3>Nombre</h3>
<input name="nombre" type="text" id="nombre"/></p>
<p><h3>Apellidos</h3>
<input name="apellidos" type="text" id="apellidos"/></p>
<p><h3>Teléfono</h3>
<input name="telefono" type="text" id="telefono" /></p>
<p><h3>N.I.F.:</h3>
<input name="nif" type="text" id="nif" size="15" /></p>
<p><h3>e-mail</h3>
<input name="email" type="text" id="email" /></p>
<h2>Dirección de envío de la/s obra/s</h2>              
<p><h3>Dirección</h3>
<input name="direccion" type="text" id="direccion" /></p>
<p><h3>Población</h3>
<input name="poblacion" type="text" id="poblacion" /></p>
<p><h3>Provincia</h3>
<input name="provincia" type="text" id="provincia" /></p>
<p><h3>C.P.</h3>
<input name="cp" type="text" id="cp" /></p>
<p><h3>País</h3>
<input name="pais" type="text" id="pais" /></p>
<p><h3>Observaciones</h3>
<textarea name="observaciones" cols="43" rows="5" wrap="virtual" 
id="observaciones"></textarea></p>
<p> 
<input id="enviar" name="enviar" type="image" src="img/btEnviarPedido.jpg" 
alt="ENVIAR EL PEDIDO DE PRODUCTOS" width="225" height="30" border="0"/>
</p>
</form>
<?php //Al final del archivo liberamos recursos
$conn->close();
?>