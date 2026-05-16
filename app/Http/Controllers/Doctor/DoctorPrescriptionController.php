<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DoctorPrescriptionController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;
        $prescriptions = Prescription::where('doctor_id', $doctor->id ?? 0)
                                    ->with('patient.user')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        return view('doctor.prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get();
        $medicines = Medicine::all();
        return view('doctor.prescriptions.create', compact('patients', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'notes' => 'nullable|string',
        ]);

        $doctor = auth()->user()->doctor;

        Prescription::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $request->patient_id,
            'notes' => $request->notes,
        ]);

        return redirect()->route('doctor.prescriptions.index')->with('success', 'Prescription generated.');
    }
}
