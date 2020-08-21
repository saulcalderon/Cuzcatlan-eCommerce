<?php
require_once('../../helpers/report.php');
require('../../models/commerce/carrito.php');

if (isset($_GET['action'])) {
    session_start();
    $factura = new Carrito;

    if (isset($_SESSION['id_cliente'])) {

        switch ($_GET['action']) {
            case 'comprobante':
                $pdf = new Report;
                $pdf->startReport('Comprobante de Compra');
                try {
                    if ($factura->setIdFactura($_SESSION['last_id_factura'])) {
                        if ($profile = $factura->profileData()) {
                            if ($data = $factura->comprobante()) {

                                // Apartado : nombre del cliente.
                                $pdf->SetFont('Helvetica', 'B', 14);
                                $pdf->Cell(25, 7, utf8_decode($profile['nombre'] . ' ' . $profile['apellido']), 0, 0, 'L');
                                // Apartado: Información de la factura
                                $pdf->SetFont('Poppins', '', 10);
                                $pdf->SetX(160);
                                $pdf->Cell(25, 7, utf8_decode('Factura : 12'), 0, 0, 'L');
                                $pdf->Ln();

                                // Apartado : correo electrónico cliente.
                                $pdf->SetTextColor(60, 60, 60);
                                $pdf->SetFont('Poppins', '', 10);
                                $pdf->Cell(25, 7, utf8_decode($profile['correo']), 0, 0, 'L');
                                // Apartado: Información de la factura
                                $pdf->SetFont('Poppins', '', 10);
                                $pdf->SetX(160);
                                $pdf->Cell(25, 7, utf8_decode('Pago : Compra-venta'), 0, 0, 'L');
                                $pdf->Ln();
                                // Apartado : dirección del cliente.
                                $pdf->SetFont('Poppins', '', 8);
                                $pdf->MultiCell(60, 5, substr(utf8_decode($profile['direccion']), 0, 70) . ' ' . '...', 0, 'L');

                                // Apartado : líneas de división.
                                $pdf->Line(15, 40, 200, 40);
                                $pdf->Line(15, 80, 200, 80);
                                // Apartado : títulos de la tabla.
                                $pdf->SetFont('Helvetica', 'B', 12);
                                $pdf->SetTextColor(233, 30, 99);
                                $pdf->Ln(15);
                                $pdf->Cell(40, 10, utf8_decode('Producto'), 0, 0, '', false);
                                $pdf->Cell(70, 10, utf8_decode('Descripción'), 0, 0, '', false);
                                $pdf->Cell(25, 10, utf8_decode('Unidad'), 0, 0, 'C', false);
                                $pdf->Cell(25, 10, utf8_decode('Cantidad'), 0, 0, 'C', false);
                                $pdf->Cell(25, 10, utf8_decode('Subtotal'), 0, 0, 'C', false);
                                $pdf->Ln(8);
                                $pdf->SetTextColor(0, 0, 0);
                                $i = true;
                                $y = 105;
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
                                    $pdf->MultiCell(40, 4, utf8_decode($row['nombre']), 0, 'L');
                                    // Apartado : Descripción del producto.
                                    $pdf->SetY($y);
                                    $x = $pdf->GetX();
                                    $pdf->SetX($x + 40);
                                    $pdf->MultiCell(70, 4, substr(utf8_decode($row['descripcion']), 0, 50) . ' ' . '...', 0, 'L');
                                    // Apartado : Cantidad del producto.
                                    $pdf->SetY($y);
                                    $pdf->SetX($x + 110);
                                    $pdf->Cell(25, 5, utf8_decode($row['cantidad']), 0, 0, 'C');
                                    // Apartado : Precio unitario del producto.
                                    $pdf->SetY($y);
                                    $pdf->SetX($x + 135);
                                    $pdf->Cell(25, 5, '$' . utf8_decode($row['precio_unitario']), 0, 0, 'C');
                                    // Apartado : Subtotal de la cantidad por el precio unitario.
                                    $pdf->SetY($y);
                                    $pdf->SetX($x + 160);
                                    $pdf->Cell(25, 5, '$' . doubleval(utf8_decode($row['cantidad']) * utf8_decode($row['precio_unitario'])), 0, 0, 'C');

                                    $y += 23;
                                   
                                    
                                }
                                
                            } else {
                                $pdf->Cell(40, 20, utf8_decode('Fallo'), 1, 0, '', false);
                            }
                        } else {
                            $pdf->Cell(40, 20, utf8_decode('sdhahaudhas'), 1, 0, '', false);
                        }
                    } else {
                        $pdf->Cell(40, 20, utf8_decode('sdhahaudhas'), 1, 0, '', false);
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                break;
            default:
                exit('Acción no disponible');
                break;
        }

        $pdf->Output();
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
