<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderDetails = OrderDetail::all();

        return view('orderDetails.index', compact('orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'OrderID' => 'required',
            'ProductID' => 'required',
            'UnitPrice' => 'required',
            'Quantity' => 'required',
            'Discount' => 'required'
        ]);

        OrderDetail::create($request->all());

        return redirect()->route('orderDetails.index')
            ->with('success', 'OrderDetail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        return view('orderDetails.show', compact('orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        return view('orderDetails.edit', compact('orderDetail'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'OrderID' => 'required',
            'ProductID' => 'required',
            'UnitPrice' => 'required',
            'Quantity' => 'required',
            'Discount' => 'required'
        ]);

        $orderDetail->update($request->all());

        return redirect()->route('orderDetails.index')
            ->with('success', 'OrderDetail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();

        return redirect()->route('orderDetails.index')
            ->with('success', 'OrderDetail deleted successfully');
    }

}
