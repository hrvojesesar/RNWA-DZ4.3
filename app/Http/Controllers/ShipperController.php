<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shipper::all();
        return view('shipper.index', compact('shippers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipper.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ShipperID' => 'required',
            'CompanyName' => 'required',
            'Phone' => 'required'
        ]);

        Shipper::create($request->all());

        return redirect()->route('shipper.index')
            ->with('success', 'Shipper created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipper $shipper)
    {
        return view('shipper.show', compact('shipper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipper $shipper)
    {
        return view('shipper.edit', compact('shipper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipper $shipper)
    {
        $request->validate([
            'ShipperID' => 'required',
            'CompanyName' => 'required',
            'Phone' => 'required',
        ]);

        $shipper->update($request->all());

        return redirect()->route('shipper.index')
            ->with('success', 'Shipper updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipper $shipper)
    {
        $shipper->delete();
        return redirect()->route('shipper.index')
            ->with('success', 'Shipper deleted successfully');
    }
}
