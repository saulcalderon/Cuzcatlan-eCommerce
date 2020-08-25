<?php
require_once('../../helpers/report_copy.php');
require('../../models/clientes.php');
require('../../models/usuarios.php');


session_start();
$cliente = new Clientes;
$user = new Usuarios;

if (isset($_SESSION['id_usuario'])) {
    $pdf = new Report;
    $pdf->startReport('Reporte Tipos de Usuarios');
    try {
        if ($user->setId($_SESSION['id_usuario'])) {
            if ($data = $user->readTipoUser()) {
                if ($user = $user->readOneUsuario()) {
                    // Apartado : nombre del cliente.
                    $pdf->SetFont('Helvetica', 'B', 14);
                    $pdf->Cell(25, 7, utf8_decode($user['nombre']), 0, 0, 'L');
                    $pdf->Ln();
                    // Apartado : correo electrónico cliente.
                    $pdf->SetTextColor(60, 60, 60);
                    $pdf->SetFont('Poppins', '', 10);
                    $pdf->Cell(25, 7, utf8_decode($user['apellido']), 0, 0, 'L');
                    // Apartado : correo electrónico cliente.
                    $pdf->SetTextColor(60, 60, 60);
                    $pdf->SetFont('Poppins', '', 10);
                    $pdf->Cell(25, 7, utf8_decode($user['correo']), 0, 0, 'L');
                    // Apartado: Información de la factura
                    $pdf->Ln();
                    $pdf->Cell(25, 7, utf8_decode('Administrador'), 0, 0, 'L');
                    // Apartado : líneas de división.
                    $pdf->Line(15, 61, 200, 61);
                    // Apartado : títulos de la tabla.
                    $pdf->SetFont('Helvetica', 'B', 12);
                    $pdf->SetTextColor(233, 30, 99);
                    $pdf->Ln(15);
                    $pdf->Cell(35, 10, utf8_decode('Nombre'), 0, 0, '', false);
                    $pdf->Cell(35, 10, utf8_decode('Apellido'), 0, 0, '', false);
                    $pdf->Cell(55, 10, utf8_decode('Correo'), 0, 0, '', false);
                    $pdf->Cell(25, 10, utf8_decode('Teléfono'), 0, 0, '', false);
                    $pdf->Cell(55, 10, utf8_decode('Cargo'), 0, 0, '', false);
                    $pdf->Ln(8);
                    $pdf->SetTextColor(0, 0, 0);
                    $i = true;
                    $y = 85;
                    $num = 0;
                    $line = 8;
                    $total = 0;
                    foreach ($data as $row) {
                        if ($num == $line) {
                            $y = 20; 
                            $pdf->setState(false);
                            $pdf->AddPage('p', 'letter');
                            $line += 10;
                        }
                        $num++;
                        if ($i) {
                            $pdf->SetFillColor(237, 237, 237);
                            $i = false;
                        } else {
                            $pdf->SetFillColor(255, 255, 255);
                            $i = true;
                        }
                        $pdf->SetFont('Poppins', '', 9);
                        // Apartado : Rectángulo gris y blanco.
                        $pdf->Rect(15, $y - 8, 185, 23, 'F');
                        // Apartado : Nombre del cliente.
                        $pdf->SetY($y);
                        $pdf->MultiCell(30, 4, utf8_decode($row['nombre']), 0, 'L');
                        //Apartado: 
                        $pdf->SetY($y);
                        $x = $pdf->GetX();
                        $pdf->SetX($x + 35);
                        $pdf->MultiCell(50, 4, utf8_decode($row['apellido']), 0, 'L');
                        //     // Apartado : Correo del cliente
                        $pdf->SetY($y);
                        $x = $pdf->GetX();
                        $pdf->SetX($x + 50);
                        $pdf->MultiCell(60, 4, utf8_decode($row['correo']), 0, 0, 'L');
                        // Apartado : Cantidad del producto.
                        $pdf->SetY($y);
                        $pdf->SetX($x + 90);
                        $pdf->Cell(85, 5, utf8_decode($row['telefono']), 0, 0, 'C');
                        // Apartado : Precio unitario del producto.
                        $pdf->SetY($y);
                        $pdf->SetX($x + 120);
                        $pdf->Cell(90, 5, utf8_decode($row['cargo']), 0, 0, 'C');
                        $y += 23;
                    }
                } else {
                    $pdf->Cell(40, 20, utf8_decode('Fallo'), 1, 0, '', false);
                }
            } else {
                $pdf->Cell(40, 20, utf8_decode('sdhahaudhas'), 1, 0, '', false);
            }
        } else {
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    $pdf->Output();
} else {
    exit('Acceso no disponible');
}