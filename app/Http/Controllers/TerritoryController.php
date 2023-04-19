<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $territories = Territory::all();
        return view('territory.index', compact('territories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('territory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TerritoryID' => 'required',
            'TerritoryDescription' => 'required',
            'RegionID' => 'required',
        ]);

        Territory::create($request->all());

        return redirect()->route('territory.index')
            ->with('success', 'Territory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Territory $territory)
    {
        return view('territory.show', compact('territory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Territory $territory)
    {
        return view('territory.edit', compact('territory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Territory $territory)
    {
        $request->validate([
            'TerritoryID' => 'required',
            'TerritoryDescription' => 'required',
            'RegionID' => 'required',
        ]);

        $territory->update($request->all());

        return redirect()->route('territory.index')
            ->with('success', 'Territory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Territory $territory)
    {
        $territory->delete();
        return redirect()->route('territory.index')
            ->with('success', 'Territory deleted successfully');
    }
}
