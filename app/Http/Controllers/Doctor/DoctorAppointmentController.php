<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DoctorAppointmentController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;
        $appointments = Appointment::where('doctor_id', $doctor->id ?? 0)
                                    ->whereDate('appointment_date', '>=', Carbon::today())
                                    ->with('patient.user')
                                    ->orderBy('appointment_date')
                                    ->orderBy('appointment_time')
                                    ->get();
        
        return view('doctor.appointments.index', compact('appointments'));
    }
}
