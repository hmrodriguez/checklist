<?php

namespace App\Http\Controllers;

use App\Tecnologia;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TecnologiasController extends Controller
{
    /**
     * Establece el middleware de la instancia
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologias = Tecnologia::paginate(20);
        return view('tecnologias', [
            'tecnologias' => Tecnologia::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tecnologias-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tecnologia::create($request->all());

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos grabados!');

        return redirect('tecnologias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecnologia = Tecnologia::find($id);

        return view('tecnologias-edit', [
            'tecnologia' => $tecnologia
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tecnologia = Tecnologia::find($id);

        $tecnologia->nombre = $request->get('nombre');

        $tecnologia->save();

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos actualizados!');

        return redirect('tecnologias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Tecnologia::destroy($id);

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos borrados!');

        return redirect('tecnologias');
    }
}
