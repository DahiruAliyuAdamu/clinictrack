<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class PatientMedicalRecordController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;
        $records = MedicalRecord::where('patient_id', $patient->id ?? 0)
                                ->with('doctor.user')
                                ->orderBy('created_at', 'desc')
                                ->get();
        return view('patient.medical_records.index', compact('records'));
    }
}
