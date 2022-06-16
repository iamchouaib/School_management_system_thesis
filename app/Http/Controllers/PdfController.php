<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index($id)
    {


        $student =  Student::find($id);
   view('secretary.certification' , ['student' => $student]);
        $pdf = PDF::loadView('secretary.certification', ['student'=>$student]);
        return $pdf->stream('invoice.pdf');
    }
}
