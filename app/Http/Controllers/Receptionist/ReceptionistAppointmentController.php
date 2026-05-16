<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReceptionistAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient.user', 'doctor.user'])
                                    ->orderBy('appointment_date', 'desc')
                                    ->orderBy('appointment_time', 'desc')
                                    ->get();
        return view('receptionist.appointments.index', compact('appointments'));
    }
}
