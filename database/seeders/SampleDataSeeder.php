<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Medicine;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // 1. Ensure Departments exist
        $departments = Department::all();
        if ($departments->isEmpty()) {
            $deptNames = ['Cardiology', 'Neurology', 'Pediatrics', 'Oncology', 'General Practice', 'Dermatology'];
            foreach ($deptNames as $name) {
                Department::create(['name' => $name, 'description' => $faker->sentence()]);
            }
            $departments = Department::all();
        }

        // 2. Create Doctors (10 more)
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'first_name' => $faker->firstName('male'),
                'last_name' => $faker->lastName,
                'email' => "doctor{$i}@dahasma.com",
                'password' => Hash::make('password'),
            ]);
            $user->assignRole('doctor');

            Doctor::create([
                'user_id' => $user->id,
                'department_id' => $departments->random()->id,
                'specialization' => $faker->word . ' Specialist',
                'designation' => 'Senior Consultant',
                'consultation_fee' => $faker->randomFloat(2, 50, 500),
                'license_number' => 'LIC-' . $faker->unique()->numberBetween(10000, 99999),
            ]);
        }

        // 3. Create Patients (30 more)
        for ($i = 0; $i < 30; $i++) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => "patient{$i}@dahasma.com",
                'password' => Hash::make('password'),
            ]);
            $user->assignRole('patient');

            Patient::create([
                'user_id' => $user->id,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'date_of_birth' => $faker->date('Y-m-d', '2010-01-01'),
                'gender' => $faker->randomElement(['male', 'female']),
                'blood_type' => $faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'O-']),
            ]);
        }

        // 4. Create Medicines (30 more)
        for ($i = 0; $i < 30; $i++) {
            Medicine::create([
                'name' => $faker->word . ' ' . $faker->randomElement(['Tablet', 'Syrup', 'Injection']),
                'category' => $faker->randomElement(['Antibiotic', 'Painkiller', 'Antiviral', 'Vitamin']),
                'price' => $faker->randomFloat(2, 5, 100),
                'stock_quantity' => $faker->numberBetween(10, 500),
                'expiry_date' => Carbon::now()->addMonths($faker->numberBetween(6, 36)),
            ]);
        }

        // 5. Create Appointments (100)
        $patients = Patient::all();
        $doctors = Doctor::all();
        $statuses = ['scheduled', 'completed', 'cancelled'];

        for ($i = 0; $i < 100; $i++) {
            Appointment::create([
                'patient_id' => $patients->random()->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'appointment_time' => $faker->time('H:i:s'),
                'status' => $faker->randomElement($statuses),
                'symptoms' => $faker->sentence(),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
            ]);
        }

        // 6. Create Medical Records & Invoices
        $appointments = Appointment::where('status', 'completed')->get();
        foreach ($appointments as $apt) {
            MedicalRecord::create([
                'patient_id' => $apt->patient_id,
                'doctor_id' => $apt->doctor_id,
                'appointment_id' => $apt->id,
                'diagnosis' => $faker->sentence(),
                'symptoms' => $apt->symptoms ?? $faker->sentence(),
                'blood_pressure' => $faker->numberBetween(110, 140) . '/' . $faker->numberBetween(70, 90),
                'weight' => $faker->randomFloat(2, 40, 120),
                'notes' => $faker->sentence(),
            ]);

            Invoice::create([
                'patient_id' => $apt->patient_id,
                'title' => 'Consultation Fee - ' . $apt->appointment_date,
                'amount' => $faker->randomFloat(2, 100, 1000),
                'status' => $faker->randomElement(['paid', 'unpaid', 'partial']),
            ]);
        }

        // 7. Create Prescriptions
        $records = MedicalRecord::take(20)->get();
        $medicines = Medicine::all();
        foreach ($records as $record) {
            $prescription = Prescription::create([
                'patient_id' => $record->patient_id,
                'doctor_id' => $record->doctor_id,
                'notes' => $faker->sentence(),
            ]);

            for ($j = 0; $j < 3; $j++) {
                PrescriptionItem::create([
                    'prescription_id' => $prescription->id,
                    'medicine_id' => $medicines->random()->id,
                    'dosage' => '1 tablet ' . $faker->randomElement(['daily', 'twice a day', 'thrice a day']),
                    'duration_days' => $faker->numberBetween(3, 14),
                ]);
            }
        }
    }
}
