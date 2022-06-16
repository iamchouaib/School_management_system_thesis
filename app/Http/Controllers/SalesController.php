<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\TypeOfSale;

class SalesController extends Controller
{
    public function index(){

        return view('admin.sales.home' , [
            'types' => TypeOfSale::withCount('sales')->get(),
            ]);
    }
}
