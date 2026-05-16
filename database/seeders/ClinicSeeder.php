<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1. Departments
        $deptId = DB::table('departments')->insertGetId([
            'name' => 'Cardiology',
            'description' => 'Heart and cardiovascular diseases',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('departments')->insert([
            ['name' => 'Neurology', 'description' => 'Brain and nervous system', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pediatrics', 'description' => 'Medical care for infants and children', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'General Practice', 'description' => 'General medical care', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // 2. Medicines
        DB::table('medicines')->insert([
            ['name' => 'Paracetamol 500mg', 'category' => 'Painkiller', 'price' => 5.00, 'stock_quantity' => 100, 'expiry_date' => Carbon::now()->addYear(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Amoxicillin 250mg', 'category' => 'Antibiotic', 'price' => 15.50, 'stock_quantity' => 50, 'expiry_date' => Carbon::now()->addMonths(6), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ibuprofen 400mg', 'category' => 'Anti-inflammatory', 'price' => 8.00, 'stock_quantity' => 200, 'expiry_date' => Carbon::now()->addYears(2), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // Get the doctor user and patient user from the database
        $doctorUser = DB::table('users')->where('email', 'doctor@clinictrack.com')->first();
        $patientUser = DB::table('users')->where('email', 'patient@clinictrack.com')->first();

        $doctorId = null;
        $patientId = null;

        if ($doctorUser) {
            $doctorId = DB::table('doctors')->insertGetId([
                'user_id' => $doctorUser->id,
                'department_id' => $deptId,
                'specialization' => 'Cardiologist',
                'designation' => 'Senior Consultant',
                'consultation_fee' => 150.00,
                'education_details' => 'MD, MBBS',
                'license_number' => 'DOC-123456',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('doctor_schedules')->insert([
                ['doctor_id' => $doctorId, 'day_of_week' => 'Monday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'slot_duration' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['doctor_id' => $doctorId, 'day_of_week' => 'Wednesday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'slot_duration' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]);
        }

        if ($patientUser) {
            $patientId = DB::table('patients')->insertGetId([
                'user_id' => $patientUser->id,
                'phone' => '+1234567890',
                'address' => '123 Main St, Cityville',
                'emergency_contact' => '+0987654321',
                'date_of_birth' => '1990-05-15',
                'gender' => 'male',
                'marital_status' => 'single',
                'blood_type' => 'O+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        if ($doctorId && $patientId) {
            DB::table('appointments')->insert([
                [
                    'patient_id' => $patientId,
                    'doctor_id' => $doctorId,
                    'appointment_date' => Carbon::tomorrow()->toDateString(),
                    'appointment_time' => '10:00:00',
                    'symptoms' => 'Mild chest pain and shortness of breath.',
                    'status' => 'scheduled',
                    'payment_status' => 'unpaid',
                    'notes' => 'Patient requested morning slot.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        }
    }
}
