<?php

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;


			include('cone.php');
			$conexion = Conecta();


 
		 
		$traeinfo="select * from pizzas";
		 
		 	$resultado=mysqli_query($conexion,$traeinfo);
				while($fila=mysqli_fetch_array($resultado))
					{ 
                         $id=$fila['Id'];
                         $nombre=$fila['Nombre'];
                         $detalle=$fila['Detalle'];
                         $precio=$fila['Precio'];

					}

					mysqli_close($conexion); 

$templateWord = new TemplateProcessor('Plantilla.docx');
 
 
 


// --- Asignamos valores a la plantilla
 
$templateWord->setValue('Id',$id);
$templateWord->setValue('Nombre',$nombre);
$templateWord->setValue('Detalle',$detalle);
$templateWord->setValue('Precio',$precio);
 
// --- Guardamos el documento
$templateWord->saveAs('Documento02.docx');

header("Content-Disposition: attachment; filename=Documento02.docx; charset=iso-8859-1");
echo file_get_contents('Documento02.docx');
        
?>