<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorMedicalRecordController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;
        $records = MedicalRecord::where('doctor_id', $doctor->id ?? 0)
                                ->with('patient.user')
                                ->orderBy('created_at', 'desc')
                                ->get();
        return view('doctor.medical_records.index', compact('records'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get();
        return view('doctor.medical_records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'symptoms' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        $doctor = auth()->user()->doctor;

        MedicalRecord::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'symptoms' => $request->symptoms,
            'blood_pressure' => $request->blood_pressure,
            'weight' => $request->weight,
            'notes' => $request->notes,
        ]);

        return redirect()->route('doctor.medical-records.index')->with('success', 'Medical record added.');
    }
}
