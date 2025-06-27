<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\FoodPackage;
use App\Models\Customer;
use Illuminate\Http\Request;

class FoodPackageController extends Controller
{
    public function index()
    {
        $packages = FoodPackage::with('customer')->get();
        return view('employee.food_packages.index', compact('packages'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('employee.food_packages.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'composition_date' => 'required|date',
            'distribution_date' => 'nullable|date',
        ]);

        FoodPackage::create($request->all());

        return redirect()->route('employee.food_packages.index')->with('success', 'Package created.');
    }

    public function show(FoodPackage $foodPackage)
    {
        return view('employee.food_packages.show', compact('foodPackage'));
    }

    public function edit(FoodPackage $foodPackage)
    {
        $customers = Customer::all();
        return view('employee.food_packages.edit', compact('foodPackage', 'customers'));
    }

    public function update(Request $request, FoodPackage $foodPackage)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'composition_date' => 'required|date',
            'distribution_date' => 'nullable|date',
        ]);

        $foodPackage->update($request->all());

        return redirect()->route('employee.food_packages.index')->with('success', 'Package updated.');
    }

    public function destroy(FoodPackage $foodPackage)
    {
        $foodPackage->delete();
        return redirect()->route('employee.food_packages.index')->with('success', 'Package deleted.');
    }
}
