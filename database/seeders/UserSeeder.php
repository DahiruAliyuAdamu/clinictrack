<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $roles = ['admin', 'doctor', 'patient', 'receptionist', 'pharmacist'];
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::firstOrCreate(['name' => $role]);
        }

        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@clinictrack.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'first_name' => 'Doctor',
                'last_name' => 'Dahiru',
                'email' => 'doctor@clinictrack.com',
                'password' => bcrypt('password'),
                'role' => 'doctor',
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Patient',
                'email' => 'patient@clinictrack.com',
                'password' => bcrypt('password'),
                'role' => 'patient',
            ],
            [
                'first_name' => 'Receptionist',
                'last_name' => 'Sarah',
                'email' => 'receptionist@clinictrack.com',
                'password' => bcrypt('password'),
                'role' => 'receptionist',
            ],
            [
                'first_name' => 'Pharmacist',
                'last_name' => 'Mike',
                'email' => 'pharmacist@clinictrack.com',
                'password' => bcrypt('password'),
                'role' => 'pharmacist',
            ],
        ];

        foreach ($users as $userData) {
            $role = $userData['role'];
            unset($userData['role']);
            $user = \App\Models\User::firstOrCreate(['email' => $userData['email']], $userData);
            $user->assignRole($role);
        }
    }
}
