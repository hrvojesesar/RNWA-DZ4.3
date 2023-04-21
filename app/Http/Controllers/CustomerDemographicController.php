<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerDemographic;
use Illuminate\Http\Request;

class CustomerDemographicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerdemographics = CustomerDemographic::all();
        return view('customerdemographic.index', compact('customerdemographics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customerdemographic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'CustomerTypeID' => 'required',
            'CustomerDesc' => 'required'
        ]);

          CustomerDemographic::create($request->all());
          return redirect()->route('customerdemographic.index')
                          ->with('success','Customer Demographic created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerDemographic $customerdemographic)
    {
        return view('customerdemographic.show',compact('customerdemographic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerDemographic $customerdemographic)
    {
        return view('customerdemographic.edit',compact('customerdemographic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerDemographic $customerdemographic)
    {
        $request->validate([
            'CustomerTypeID' => 'required',
            'CustomerDesc' => 'required'
        ]);

        $customerdemographic->update($request->all());
        return redirect()->route('customerdemographic.index')
                        ->with('success','Customer Demographic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerDemographic $customerdemographic)
    {
        $customerdemographic->delete();
        return redirect()->route('customerdemographic.index')
                        ->with('success','Customer Demographic deleted successfully');

    }
}
