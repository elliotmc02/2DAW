<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainType;

class TrainTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('train_types/index', ['train_types' => TrainType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('train_types/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $train_type = new TrainType;
        $train_type->type = $request->input('type');
        $train_type->save();
        return redirect('train_types');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('train_types/show', ['train_type' => TrainType::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('train_types/edit', ['train_type' => TrainType::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $train_type = TrainType::find($id);
        $train_type->type = $request->input('type');
        $train_type->save();
        return redirect('train_types');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TrainType::find($id)->delete();
        return redirect('train_types');
    }
}
