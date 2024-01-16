<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancion;
use App\Models\Artista;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canciones = Cancion::all();

        return view(
            'canciones/index',
            ['canciones' => $canciones]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones/create', ['artistas' => Artista::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cancion = new Cancion;
        $cancion->titulo_cancion = $request->input('titulo_cancion');
        $cancion->genero_cancion = $request->input('genero_cancion');
        $cancion->duracion = $request->input('duracion');
        $cancion->artista_id = $request->input('artista');
        $cancion->save();

        return redirect('canciones');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('canciones/show', ['cancion' => Cancion::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('canciones/edit', ['cancion' => Cancion::find($id), 'artistas' => Artista::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cancion = Cancion::find($id);

        $cancion->titulo_cancion = $request->input('titulo_cancion');
        $cancion->genero_cancion = $request->input('genero_cancion');
        $cancion->duracion = $request->input('duracion');
        $cancion->artista_id = $request->input('artista');
        $cancion->save();

        return redirect('canciones');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cancion::find($id)->delete();
        return redirect('canciones');
    }
}
