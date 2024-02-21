<?php
 
//conexcion a la BD
include("cone.php");
 $conexion = Conecta();
 date_default_timezone_set('America/Los_Angeles');
    					 
 
    $query="select * from pizzas";
	$lista = mysqli_query($conexion,$query);

			if (mysqli_num_rows($lista)==0)//condiciono para saber si no hay resultados
				{
						echo "<script>alert('NO Existe datos para desplegar!!');</script>"; 
					    echo "<script>history.back()</script>";
						exit;
				}
			else
				{			 
									 
									
 
		// lista pizzas
		    require('fpdf.php');
			class PDF extends FPDF
			{
			// Cabecera de página
				function Header()
						
				{
				  
				 	// imagenes a desplegar en los lados	
					 
					$this->SetFont('Helvetica','B',8.5);
					$this->Ln(4);
					// Título
					$this->Cell(0,6,'Pizza Pizza',0,0,'C');
					$this->Ln(5);
					$this->Cell(0,6,'Listado De Pizzas ',0,0,'C');
					$this->Ln(5);
					 
											
						$this->SetFont('Helvetica','B',8);
						 
					
						$this->Cell(10,10,'Id '); 						
						$this->Cell(50,10,'Nombre');
						$this->Cell(50,10,'Ingredientes');
						$this->Cell(50,10,'Precio');
						 
						$this->Ln(8);
					 
					 
					 
				}

				// Pie de página
				function Footer()
				{
					// Posición: a 1,5 cm del final
					$this->SetY(-15);					 
					$this->SetFont('helvetica','I',8);					
					$this->cell(160,10,date("d-m-Y H:i:s"));					
					 
					$this->ln(4);
				}
			}

		// Creación del objeto de la clase heredada
		   $pdf = new PDF('L','mm','A4'); $pdf->AliasNbPages();
		   $pdf->AddPage();
		   $pdf->SetFont('helvetica','',6);
		   
		    
			
			//Consulta de tablas
						    
				            
				        while ($row=mysqli_fetch_array($lista))
							 {
												 	
												
								$id=$row['Id'];
								$nombre=$row['Nombre'];
								$precio=$row['Precio'];
								$detalle=$row['Detalle'];
												 
												
								// Imprime detalle del query
												  
														 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(10,10,$id,1,0,'L');
								$pdf->Cell(50,10,$nombre,1,0,'L'); 
								$pdf->Cell(50,10,$detalle,1,0,'L'); 
						        $pdf->Cell(20,10,number_format($precio,2),1,0,'R');
												 
								 
								$pdf->Output();	
									
								}
										
						mysqli_close($sqlconnect);	
                        
        }
?>	
