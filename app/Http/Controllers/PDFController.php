<?php

namespace App\Http\Controllers;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Artista;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //

    public function index(){
        //Crear el objeto p
        $pdf = new Fpdf();
        //Añadir page
        $pdf->AddPage();
        //establecer punto (10,10) para comenzar a pintar
        $pdf->SetXY(10,10);
        //establecer el tipo de letra 
        $pdf->SetFont('Arial','b',14);
        //Establecer un contenido
        $pdf->SetDrawColor(55,255,240);
        $pdf->SetTextColor(255,51,172);
        $pdf->Cell(110,10,"Nombre artista",1,0,"C");
  
        $pdf->Cell(50,10,utf8_decode("Número Albumes"),1,1,"C");
        $pdf->SetTextColor(76,255,51);
        //Recorrer el arreglo de artista para mostrar
        //artistas y numero de disco por artistas
        $artistas= Artista::all();
        $pdf->SetFont('Arial','I',11);
        foreach($artistas as $a){
            $pdf->Cell(110,10,substr(utf8_decode($a->Name),0,50),1,0,"L");
            $pdf->Cell(50,10,$a->albumes()->count(),1,1,"C");
        }
        //utilizar objeto response
        $response = response($pdf->Output());
        //Definir el tipo mine
        $response->header("Content-Type",'application/pdf');
        //retornar respuesta al navegador
        return $response;


    }
}
