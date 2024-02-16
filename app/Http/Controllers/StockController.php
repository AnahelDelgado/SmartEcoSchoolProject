<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Stock');
    }
}
