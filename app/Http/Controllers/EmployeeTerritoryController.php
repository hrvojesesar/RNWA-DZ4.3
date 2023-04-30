<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeTerritory;

class EmployeeTerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeTerritories = EmployeeTerritory::all();

        return view('employee_territories.index', compact('employeeTerritories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee_territories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'EmployeeID' => 'required',
            'TerritoryID' => 'required',
        ]);

        EmployeeTerritory::create($request->all());

        return redirect()->route('employee_territories.index')
            ->with('success', 'Employee Territory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeTerritory $employeeTerritory)
    {
        return view('employee_territories.show', compact('employeeTerritory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeTerritory $employeeTerritory)
    {
        return view('employee_territories.edit', compact('employeeTerritory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeTerritory $employeeTerritory)
    {
        $request->validate([
            'EmployeeID' => 'required',
            'TerritoryID' => 'required',
        ]);

        $employeeTerritory->update($request->all());

        return redirect()->route('employee_territories.index')
            ->with('success', 'Employee Territory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeTerritory $employeeTerritory)
    {
        $employeeTerritory->delete();

        return redirect()->route('employee_territories.index')
            ->with('success', 'Employee Territory deleted successfully');
    }
}
