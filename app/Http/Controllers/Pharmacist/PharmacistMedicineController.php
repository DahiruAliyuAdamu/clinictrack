<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PharmacistMedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('name')->get();
        return view('pharmacist.medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('pharmacist.medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date|after:today',
        ]);

        Medicine::create($request->all());

        return redirect()->route('pharmacist.medicines.index')->with('success', 'Medicine added to inventory.');
    }

    public function edit(Medicine $medicine)
    {
        return view('pharmacist.medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
        ]);

        $medicine->update($request->all());

        return redirect()->route('pharmacist.medicines.index')->with('success', 'Medicine updated.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('pharmacist.medicines.index')->with('success', 'Medicine removed.');
    }
}
