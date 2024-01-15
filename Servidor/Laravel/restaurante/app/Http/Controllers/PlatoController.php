<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensaje = "Estos son mis platos";
        $platos = Plato::all();

        return view(
            'platos/index',
            ['mensaje' => $mensaje, 'platos' => $platos]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('platos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plato = new Plato;
        $plato->nombre = $request->input('nombre');
        $plato->precio = $request->input('precio');
        $plato->tipo_plato_id = $request->input('tipo');
        $plato->save();

        return redirect('platos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('platos/show', ['plato' => Plato::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('platos/edit', ['plato' => Plato::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plato = Plato::find($id);

        $plato->nombre = $request->input('nombre');
        $plato->precio = $request->input('precio');
        $plato->tipo_plato_id = $request->input('tipo');
        $plato->save();

        return redirect('platos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Plato::find($id)->delete();
        return redirect('platos');
    }
}
