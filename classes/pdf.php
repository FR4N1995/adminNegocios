<?php
//Aqui nada mas no le pusimos namespace
namespace Classes;
use FPDF;
class pdf 
{

    
    
    public function generarPDF($parametros)
    {
        
        //  debuguear($parametros);
        // $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle('Reporte de venta por dia');
        $pdf->SetFont('Arial', 'B', 25);
        $pdf->Cell(180, 20, 'Corte del dia', 0, 1, 'C') ;
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(150, 10, 'Fecha:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(27, 10, $parametros[0]->fecha, 0, 1, 'R') ;
        //Encabezado del PDF
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(15, 5, 'Cant', 0, 0, 'L') ;
        $pdf->Cell(118, 5, 'Descripcion', 0, 0, 'L') ;
        $pdf->Cell(35, 5, 'Precio', 0, 0, 'L') ;
        $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'L') ;

        // $pdf->Cell(40, 10, '¡Hola, Mundo!');
        $total = 0;
        foreach($parametros as $parametro){
            $total = $total + $parametro->subtotal;
            $pdf->SetFont('Arial', '', 15);
            $pdf->Cell(15, 5, $parametro->cantidad, 0, 0, 'L') ;
            $pdf->SetFont('Arial', '', 14);
            $pdf->Cell(118, 5, $parametro->productos, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(30, 5, $parametro->precio, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(10, 5, $parametro->subtotal, 0, 1, 'L') ; 
        }
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(170, 20, 'Total venta del dia:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(3, 20, '$', 0, 0, 'L') ;
        $pdf->Cell(15, 20, $total, 0, 1, 'R') ;
        $pdf->Output();
    }


    public function generarfechasPdf($ventas, $fechainicio, $fechafinal){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle('Reporte de venta por fechas');
        $pdf->SetFont('Arial', 'B', 25);
        $pdf->Cell(180, 20, 'Corte por fechas', 0, 1, 'C') ;
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(90, 10, 'Desde la Fecha:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(27, 10, $fechainicio, 0, 0, 'R') ;
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(40, 10, 'Hasta la Fecha:', 0, 0, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(27, 10, $fechafinal, 0, 1, 'R') ;
        //Encabezado del PDF
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(15, 5, 'Cant', 0, 0, 'L') ;
        $pdf->Cell(118, 5, 'Descripcion', 0, 0, 'L') ;
        $pdf->Cell(35, 5, 'Precio', 0, 0, 'L') ;
        $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'L') ;
        $total = 0;
        foreach($ventas as $venta){
            $total = $total + $venta->subtotal;
            $pdf->SetFont('Arial', '', 15);
            $pdf->Cell(15, 5, $venta->cantidad, 0, 0, 'L') ;
            $pdf->SetFont('Arial', '', 14);
            $pdf->Cell(118, 5, $venta->productos, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(30, 5, $venta->precio, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(10, 5, $venta->subtotal, 0, 1, 'L') ; 
        }
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(170, 20, 'Total venta del dia:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(3, 20, '$', 0, 0, 'L') ;
        $pdf->Cell(15, 20, $total, 0, 1, 'R');
        $pdf->Output();
   
    }


    public function generarempleadoPdf($ventas){
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle('Reporte de venta por Empleado');
        $pdf->SetFont('Arial', 'B', 25);
        $pdf->Cell(180, 20, 'Corte del dia por Empleado', 0, 1, 'C') ;
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(90, 10, 'Fecha:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(27, 10, $ventas[0]->fecha, 0, 0, 'R') ;
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(30, 10, 'Empleado:', 0, 0, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(28, 10, $ventas[0]->nombre, 0, 1, 'R') ;
        //Encabezado del PDF
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(15, 5, 'Cant', 0, 0, 'L') ;
        $pdf->Cell(118, 5, 'Descripcion', 0, 0, 'L') ;
        $pdf->Cell(35, 5, 'Precio', 0, 0, 'L') ;
        $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'L') ;

        // $pdf->Cell(40, 10, '¡Hola, Mundo!');
        $total = 0;
        foreach($ventas as $venta){
            $total = $total + $venta->subtotal;
            $pdf->SetFont('Arial', '', 15);
            $pdf->Cell(15, 5, $venta->cantidad, 0, 0, 'L') ;
            $pdf->SetFont('Arial', '', 14);
            $pdf->Cell(118, 5, $venta->productos, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(30, 5, $venta->precio, 0, 0, 'L') ;
            $pdf->Cell(3, 5, '$', 0, 0, 'L') ;
            $pdf->Cell(10, 5, $venta->subtotal, 0, 1, 'L') ; 
        }
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(170, 20, 'Total venta del dia:', 0, 0, 'R') ;
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(3, 20, '$', 0, 0, 'L') ;
        $pdf->Cell(15, 20, $total, 0, 1, 'R') ;
        $pdf->Output();
    }
}
