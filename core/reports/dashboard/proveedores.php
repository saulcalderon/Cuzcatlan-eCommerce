<?php
require_once('../../helpers/report_dashboard.php');
require('../../models/proveedores.php');
require('../../models/departamento.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Proveedores por departamento');

//Se instancia la clase de proveedores
$departamento = new Departamento;


//Verificamos si existen registros de proveedores
if($dataDepartamento = $departamento->readAll()){
    //Se evalua cada registro brindado por la consulta
    foreach($dataDepartamento as $rowDepartamento){
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Helvetica', 'B', 14);
        // Se imprime una celda con el nombre de la categoría.
        
        $pdf->Cell(0, 10, utf8_decode('Departamento: '.$rowDepartamento['departamento']), 1, 1, 'C', 1);
        
        $proveedores = new Proveedores;
        
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if($proveedores->setIdDepartamento($rowDepartamento['id_departamento'])){
              if($dataProveedores = $proveedores->readAllProveedoresDepartamento()){
                   // Se establece un color de relleno para los encabezados.
               $pdf->SetFillColor(225);
               // Se establece la fuente para los encabezados.
               $pdf->SetFont('Helvetica', 'B', 10);
               // Se imprimen las celdas con los encabezados.
               $pdf->Cell(69, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
               $pdf->Cell(67, 10, utf8_decode('Empresa'), 1, 0, 'C', 1);
               $pdf->Cell(50, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);
               // Se establece la fuente para los datos de los productos.
               $pdf->SetFont('Helvetica', '', 11);
                foreach ($dataProveedores as $rowProveedores) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(69, 10, utf8_decode($rowProveedores['nombre_contacto']), 1, 0);
                    $pdf->Cell(67, 10, utf8_decode($rowProveedores['nombre_empresa']), 1, 0);
                    $pdf->Cell(50, 10, $rowProveedores['telefono'], 1, 1);
                }
              }else{
                $pdf->Cell(0, 10, utf8_decode('No hay proveedores para este departamento'), 1, 1);
              }
        }else{
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en un departamento'), 1, 1);
        }
    }

}else{
    $pdf->Cell(0, 10, utf8_decode('No hay departamentos para mostrar'), 1, 1);
}

$pdf->Output();
?>