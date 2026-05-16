<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PharmacistPrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with(['doctor.user', 'patient.user', 'items.medicine'])
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        return view('pharmacist.prescriptions.index', compact('prescriptions'));
    }
}
