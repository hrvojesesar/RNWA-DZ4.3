<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'RegionID' => 'required',
            'RegionDescription' => 'required'
        ]);

          Region::create($request->all());
          return redirect()->route('region.index')
                          ->with('success','Region created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return view('region.show',compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('region.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'RegionID' => 'required',
            'RegionDescription' => 'required'
        ]);

        $region->update($request->all());
        return redirect()->route('region.index')
                        ->with('success','Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('region.index')
                        ->with('success','Region deleted successfully');

    }

    public function getRegion($id)
{
    // Dohvat podataka o odabranoj regiji iz baze ili drugog izvora
    $region = Region::find($id);

    // Provjera je li regija pronađena
    if (!$region) {
        return response()->json(['error' => 'Regija nije pronađena'], 404);
    }

    // Priprema podataka za odgovor
    $data = [
        'region_id' => $region->RegionID,
        'region_description' => $region->RegionDescription,
        // Dodajte ostale relevantne atribute regije
    ];

    // Vraćanje podataka u JSON formatu
    return response()->json($data);
}


}
