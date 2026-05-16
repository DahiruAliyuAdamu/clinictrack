<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReceptionistInvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('patient.user')->orderBy('created_at', 'desc')->get();
        return view('receptionist.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get();
        return view('receptionist.invoices.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid,partial',
        ]);

        Invoice::create($request->all());

        return redirect()->route('receptionist.invoices.index')->with('success', 'Invoice created successfully.');
    }
}
