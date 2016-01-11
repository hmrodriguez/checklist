<?php

namespace App\Http\Controllers;

use Auth;
use App\Checklist;
use App\Tecnologia;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
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
        $checklist = Auth::user()->checklist()->get();

        return view('checklist', [
            'checklist' => $checklist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnologias = Tecnologia::all();

        return view('checklist-create', [
            'tecnologias' => $tecnologias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Si la tecnologia seleccionada por el usuario ya existe, regresa un mensaje de notificacion
        if (Auth::user()->checklist()->where('id', $request->get('tecnologia_id'))->first()) {
            $request->session()->flash('tipo', 'warning');
            
            $request->session()->flash('mensaje', '¡La tecnologia que seleccionaste ya esta registrada! por favor selecciona otra');

            return redirect()->back();
        }

        Auth::user()->checklist()->create($request->all());

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos grabados!');

        return redirect('checklist');
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
        $tecnologias = Tecnologia::all();

        $checklist = Checklist::find($id);

        return view('checklist-edit', [
            'tecnologias' => $tecnologias,
            'checklist' => $checklist
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
        $checklist = Checklist::where('id', $id)->update($request->only(['tecnologia_id','nivel','usado_en']));

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos grabados!');

        return redirect('checklist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $checklist = Checklist::destroy($id);

        $request->session()->flash('tipo', 'success');
        $request->session()->flash('mensaje', '¡Datos borrados!');

        return redirect('checklist');
    }
}
