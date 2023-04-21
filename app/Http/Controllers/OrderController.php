<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ShipName' => 'required',
            'ShipAddress' => 'required',
            'ShipCity' => 'required',
            'ShipRegion' => 'required',
            'ShipPostalCode' => 'required',
            'ShipCountry' => 'required'
        ]);

        Order::create($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'ShipName' => 'required',
            'ShipAddress' => 'required',
            'ShipCity' => 'required',
            'ShipRegion' => 'required',
            'ShipPostalCode' => 'required',
            'ShipCountry' => 'required'
        ]);

        $order->update($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully');
    }
}
