<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\Train;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets/index', ['tickets' => Ticket::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets/create', ['ticket_types' => TicketType::all(), 'trains' => Train::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ticket::create($request->all());
        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('tickets/show', ['ticket' => Ticket::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tickets/edit', ['ticket' => Ticket::find($id), 'ticket_types' => TicketType::all(), 'trains' => Train::all()]);
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Ticket::find($id)->fill($request->all())->save();
        return redirect('tickets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ticket::find($id)->delete();
        return redirect('tickets');
    }
}
