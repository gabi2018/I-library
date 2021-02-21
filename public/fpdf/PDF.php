<?php
require('fpdf.php');
Class PDF extends FPDF{
    
    function Header()
    {
        // Logo
        
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'I-LIBRARY',1,0,'C');
        // Salto de línea
        $this->Ln(20);
        $this->Cell(1,0,'Comprobante de prestamo',0,0,'A');
        $this->Ln(10);
    }
    function UserAdmin($adm){

        $this->SetY(25);
        $this->Setx(-75);
        $this->SetFont('arial','U',12);
        $this->Cell(2,0,'Administrador  de biblioteca:'.$adm,0,0,'A');

    }
    function Body($param)
    {
        $this->SetXY(10,40);
        
        
        $this->SetFont('arial','B',10);
        $this->Cell(2,0,'n° prestamo: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'fecha del prestamo: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'fecha de devolucion del documento: '.$param,0,0,'A');
        $this->Ln(12);

        
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
   function  Socio($param){
       $this->Line(0,75,300,75);
    $this->SetFont('Arial','B',15);
    $this->Cell(1,0,'Socio',0,0,'A');
    $this->Ln(12);
    $this->SetFont('Arial','B',10);
        $this-> Cell(2,0,'Nombre  y apellido: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'DNI: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'Tipo de socio: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'Carrera: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'Escuela: '.$param,0,0,'A');
        $this->Ln(10);
   }
   function Book($param){
    $this->Line(0,137,300,137);
    $this->SetFont('Arial','B',15);
    $this->Cell(1,0,'Libro',0,0,'A');
    $this->Ln(12);
    $this->SetFont('Arial','B',10);
        $this->Cell(2,0,'Titulo: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'Autor principal: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'ISBN: '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'CodigoTopolografico : '.$param,0,0,'A');
        $this->Ln(10);
        $this->Cell(2,0,'Tema: ' .$param,0,0,'A');
        $this->Ln(10);

    
   }

    





}


/*require('/loans/model/Loan.php');
$loans=new loan();
$loans->*/
$pdf = new PDF();
$pdf->AddPage();
$pdf->UserAdmin('pepe');

$pdf->SetFont('arial','',12);
$pdf->Body('lala');
$pdf->Socio('lalo');
$pdf->Book('librito');

$pdf->Output();





?>