<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'CustomerID' => 'required',
          'CompanyName' => 'required',
          'ContactName' => 'required',
          'ContactTitle' => 'required',
          'Address' => 'required',
          'City' => 'required',
          'Region' => 'required',
          'PostalCode' => 'required',
          'Country' => 'required',
          'Phone' => 'required',
          'Fax' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
                         ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
          'CustomerID' => 'required',
          'CompanyName' => 'required',
          'ContactName' => 'required',
          'ContactTitle' => 'required',
          'Address' => 'required',
          'City' => 'required',
          'Region' => 'required',
          'PostalCode' => 'required',
          'Country' => 'required',
          'Phone' => 'required',
          'Fax' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
                         ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
                         ->with('success','Customer deleted successfully');
    }

}
