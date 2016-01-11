<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

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
     * @return Response
     */
    public function index()
    {        
        return view('home', [
            'usuarios' => User::all()
        ]);
    }

    /**
     * Obtiene los datos del usuario y los muestra para consultarlos
     * 
     * @param  [type] $id. El id del usuario seleccionado
     * @return Response    La vista en html
     */
    public function show($id)
    {
        return view('usuario', ['usuario' => User::find($id)]);
    }
}
