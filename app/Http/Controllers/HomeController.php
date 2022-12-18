<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $personas = Persona::where('estatus', 1)
               ->orderBy('nombre')
               ->take(10)
               ->get();
        return view('home', compact('personas'));

    }

    public function store()
    {
        return view('persona');
    }
}
