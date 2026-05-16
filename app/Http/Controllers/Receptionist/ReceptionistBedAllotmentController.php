<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\BedAllotment;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReceptionistBedAllotmentController extends Controller
{
    public function index()
    {
        $allotments = BedAllotment::with('patient.user')->orderBy('allotment_time', 'desc')->get();
        return view('receptionist.bed_allotments.index', compact('allotments'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get();
        return view('receptionist.bed_allotments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'bed_number' => 'required|string|max:50',
            'allotment_time' => 'required|date',
            'discharge_time' => 'nullable|date|after_or_equal:allotment_time',
        ]);

        BedAllotment::create($request->all());

        return redirect()->route('receptionist.bed-allotments.index')->with('success', 'Bed allotted successfully.');
    }
}
