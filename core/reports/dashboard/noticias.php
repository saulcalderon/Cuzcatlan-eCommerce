<?php
require_once('../../helpers/report_dashboard.php');
require('../../models/noticias.php');

$noticias = new Noticias;

//Se verifica que existan noticias existentes.
if($noticias->readAllProductos()){
    //Se instancia el reporte
    $pdf = new Report;
    $pdf->startReport('Noticias Publicadas');

    //Se colocan los elementos dentro del reporte
    try{
        if($dataTotal = $noticias->readCantidadProductos()){
            if($dataTotalActivos = $noticias->readCantidadProductosEstado()){
                //Apartado: línea de arriba
                $pdf->Line(15, 40, 200, 40);

                $pdf->SetFont('Helvetica', 'B', 14);
                //Apartado: Estadisticas de noticias
                $pdf->Cell(25, 7, utf8_decode('Estadisticas Generales'), 0, 0, 'L');
                //Apartado: Cantidad de noticias totales
                $pdf->Ln();
                $pdf->Ln();
                $pdf->SetFont('Poppins', '', 10);
                $pdf->Cell(25, 7, utf8_decode('Noticias totales: '.implode($dataTotal[0]). ' agregadas.'), 0, 0, 'L');
                
                //Apartado: Cantidad de noticias activas
                
                $pdf->SetFont('Poppins', '', 10);
                $pdf->SetX(160);
                $pdf->Cell(25, 7, utf8_decode('Noticias activas: '.implode($dataTotalActivos[0]). ' activas.'), 0, 0, 'C');

                //Apartado: línea de abajo
                $pdf->Line(15, 75, 200, 75);

                // Apartado : títulos de la tabla.
                $pdf->SetFont('Helvetica', 'B', 12);
                $pdf->SetTextColor(233, 30, 99);
                $pdf->Ln(15);
                $pdf->Cell(25, 10, utf8_decode('ID'), 0, 0, '', false);
                $pdf->Cell(35, 10, utf8_decode('Título'), 0, 0, 'L', false);
                $pdf->Cell(100, 10, utf8_decode('Contenido'), 0, 0, 'L', false);
                $pdf->Cell(20, 10, utf8_decode('Fecha'), 0, 0, 'L', false);
                $pdf->Ln(8);
                $pdf->SetTextColor(0, 0, 0);
                $i = true;
                $y = 105;

                if($data = $noticias->readAllProductos()){
                    if (count($data) > 3) {
                        $pdf->AddPage('p', 'letter');
                        $y = 105;
                    }
    
                    array_chunk($data,2);
                    foreach ($data as $row) {
                        if ($i) {
                            $pdf->SetFillColor(237, 237, 237);
                            $i = false;
                        } else {
                            $pdf->SetFillColor(255,255, 255);
                            $i = true;
                        }
    
                        $pdf->SetFont('Poppins', '', 9);
                        // Apartado : Rectángulo gris y blanco.
                            $pdf->Rect(15, $y - 8, 185, 23, 'F');
    
                        // Apartado : Nombre del producto.
                        $pdf->SetY($y);
                        $pdf->MultiCell(25, 4, utf8_decode($row['id_noticia']), 0, 'L');

                        // Apartado : titulo de noticia
                        $pdf->SetY($y);
                        $x = $pdf->GetX();
                        $pdf->SetX($x+10);
                        $pdf->MultiCell(35, 4, substr(utf8_decode($row['titulo']), 0, 50) . ' ' . '...', 0, 'L');

                        // Apartado : Contenido de la noticia
                        $pdf->SetY($y);
                        $pdf->SetX($x+30);
                        $pdf->Cell(100, 5, utf8_decode($row['contenido']), 0, 0, 'C');

                        $pdf->SetY($y);
                        $pdf->SetX($x + 135);
                        $pdf->Cell(20, 5, utf8_decode($row['fecha_registro']), 0, 0, 'C');
    
                        $y += 23;   
                    }
                }else{
                    $pdf->Cell(40, 20, utf8_decode('Fallo'), 1, 0, '', false);
                }
            }else{
                $pdf->Cell(40, 20, utf8_decode('sdhahaudhas'), 1, 0, '', false);
            }
        }else{
            $pdf->Cell(40, 20, utf8_decode('sdhahaudhas'), 1, 0, '', false);
        }


    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    //Se imprime el reporte en el sitio
    $pdf->Output();
}else{
    exit('Recurso denegado, no existen noticias');
}
?>