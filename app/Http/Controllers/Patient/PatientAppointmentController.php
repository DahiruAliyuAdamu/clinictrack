<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientAppointmentController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;
        $appointments = Appointment::where('patient_id', $patient->id ?? 0)
                                    ->with('doctor.user')
                                    ->orderBy('appointment_date', 'desc')
                                    ->get();
        return view('patient.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::with(['user', 'department'])->get();
        return view('patient.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'symptoms' => 'nullable|string',
        ]);

        $patient = auth()->user()->patient;
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient profile not found.');
        }

        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'symptoms' => $request->symptoms,
            'status' => 'scheduled',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->route('patient.appointments.index')->with('success', 'Appointment booked successfully!');
    }
}
