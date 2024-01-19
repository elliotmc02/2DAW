<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\TrainType;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('trains/index', ['trains' => Train::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trains/create', ['train_types' => TrainType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Train::create($request->all());
        return redirect('trains');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('trains/show', ['train' => Train::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('trains/edit', ['train' => Train::find($id), 'train_types' => TrainType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Train::find($id)->fill($request->all())->save();
        return redirect('trains');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Train::find($id)->delete();
        return redirect('trains');
    }
}
