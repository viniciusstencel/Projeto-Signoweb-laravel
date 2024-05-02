<?php

namespace App\Http\Controllers;
use App\Models\Voto;
use App\Models\Enquete;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $enquetes = Enquete::all();
        
        return view('welcome', compact('enquetes'));
    }
}
