<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerCustomerDemo;

class CustomerCustomerDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerCustomerDemos = CustomerCustomerDemo::all();

        return view('customer_customer_demos.index', compact('customerCustomerDemos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer_customer_demos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CustomerID' => 'required',
            'CustomerTypeID' => 'required',
        ]);

        CustomerCustomerDemo::create($request->all());

        return redirect()->route('customer_customer_demos.index')
            ->with('success', 'Customer Customer Demo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerCustomerDemo $customerCustomerDemo)
    {
        return view('customer_customer_demos.show', compact('customerCustomerDemo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerCustomerDemo $customerCustomerDemo)
    {
        return view('customer_customer_demos.edit', compact('customerCustomerDemo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerCustomerDemo $customerCustomerDemo)
    {
        $request->validate([
            'CustomerID' => 'required',
            'CustomerTypeID' => 'required',
        ]);

        $customerCustomerDemo->update($request->all());

        return redirect()->route('customer_customer_demos.index')
            ->with('success', 'Customer Customer Demo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerCustomerDemo $customerCustomerDemo)
    {
        $customerCustomerDemo->delete();

        return redirect()->route('customer_customer_demos.index')
            ->with('success', 'Customer Customer Demo deleted successfully');
    }
}
