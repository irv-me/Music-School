<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = \App\Models\Instrument::all();
        return view('instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instruments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        \App\Models\Instrument::create($request->all());

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Instrument $instrument)
    {
        return view('instruments.edit', compact('instrument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Instrument $instrument)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $instrument->update($request->all());

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Instrument $instrument)
    {
        $instrument->delete();

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument deleted successfully.');
    }
}
