<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;
        $schedules = DoctorSchedule::where('doctor_id', $doctor->id ?? 0)->get();
        return view('doctor.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('doctor.schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'slot_duration' => 'required|integer|min:10',
        ]);

        $doctor = auth()->user()->doctor;
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor profile not found.');
        }

        DoctorSchedule::create([
            'doctor_id' => $doctor->id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'slot_duration' => $request->slot_duration,
        ]);

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule added successfully.');
    }
}
