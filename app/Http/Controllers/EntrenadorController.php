<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrenadorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-entrenador|crear-entrenador|editar-entrenador|eliminar-entrenador')->only('index');
        $this->middleware('permission:crear-entrenador', ['only' => ['create','store']]);
        $this->middleware('permission:editar-entrenador', ['only' => ['edit','update']]);
        $this->middleware('permission:eliminar-entrenador', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenadores = Entrenador::paginate(5);
        return view('entrenadores.index', compact('entrenadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenadores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required',
            'sexo' => 'required',
        ]);

        $data_all = $request->all();
        if ($request->hasFile('image')) {
            $data_all['image'] = $request->file('image')->store('uploads', 'public');
        }

        Entrenador::create($request->all());

        return redirect()->route('entrenadores.index');
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
    public function edit(Entrenador $entrenador)
    {
        return view('entrenadores.editar', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrenador $entrenador)
    {
        request()->validate([
            'nombre' => 'required',
            'apellidoo' => 'required',
            'ci' => 'required',
            'sexo' => 'required',
        ]);

        $data_all = $request->all();
        if ($request->hasFile('image')) {
            $entrenador = Entrenador::find($request->entrenadorId);
            if ($entrenador->image) {
                Storage::disk('public')->delete($entrenador->image);
            }
            $data_all['image'] = $request->file('image')->store('uploads', 'public');
        }
        $entrenador = Entrenador::find($request->entrenadorId);
        $data_all['disiplina'] = $request->id_disiplina;
        $entrenador->update($data_all);

        $entrenador->update($request->all());

        return redirect()->route('entrenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrenador $entrenador)
    {
        $entrenador->delete();

        return redirect()->route('entrenadores.index');
    }
}
