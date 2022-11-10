<?php

namespace App\Http\Controllers;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index(Request $request){

        $filename = 'demo.pdf';
        $data = [
            'title' => 'Generate PDF using Laravel TCPDF '
        ];
        $html = view()->make('pdfSample', $data)->render();
        $pdf = new TCPDF;
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, 'hhhhhhhhh');
        $pdf::Output(public_path($filename), 'F');
        return response()->download(public_path($filename));

    }
}
