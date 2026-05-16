<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PatientInvoiceController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;
        $invoices = Invoice::where('patient_id', $patient->id ?? 0)
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('patient.invoices.index', compact('invoices'));
    }
}
