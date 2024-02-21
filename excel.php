<?php

include('cone.php');
$conexion = Conecta();
$query="select * from pizzas order by nombre";
$resultado = mysqli_query($conexion,$query);

	$excel = "<table border='1'><tr>";
	$excel .= "<th>Id_Reporte</th>";
	$excel .= "<th>Nombre</th>";
	$excel .= "<th>Ingredientes</th>";
	$excel .= "<th>Precio</th>";
	$excel .= "</tr>";
while( $row = mysqli_fetch_array($resultado) )
{
    $excel .= "<tr>";
	$excel .= "<td>".strtoupper($row['Id'])."</td>";
    $excel .= "<td>".strtoupper($row['Nombre'])."</td>";
    $excel .= "<td>".strtoupper($row['Detalle'])."</td>";
    $excel .= "<td>".strtoupper($row['Precio'])."</td>";
	$excel .= "</tr>";						
}
	$excel .= "</table>";

    $fp=fopen('Reporte_excel.xls','w');
	fwrite($fp,$excel);
	fclose($fp);

    echo '<script>';
    echo 'window.location = \'Reporte_excel.xls\';
    setTimeout(function(){window.close();},2000);';
    echo '</script>';

?>