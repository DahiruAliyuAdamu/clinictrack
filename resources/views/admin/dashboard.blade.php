<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-indigo-600">Welcome, {{ auth()->user()->first_name }}!</h3>
                    <p>This is the central administration panel. Use the navigation to manage users, roles, and clinic departments.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                        <div class="bg-indigo-50 p-4 rounded-lg shadow border-l-4 border-indigo-500">
                            <h4 class="font-bold text-lg">Total Users</h4>
                            <p class="text-3xl font-extrabold text-indigo-700 mt-2">{{ \App\Models\User::count() }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg shadow border-l-4 border-green-500">
                            <h4 class="font-bold text-lg">Total Doctors</h4>
                            <p class="text-3xl font-extrabold text-green-700 mt-2">{{ \App\Models\Doctor::count() }}</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg shadow border-l-4 border-blue-500">
                            <h4 class="font-bold text-lg">Total Patients</h4>
                            <p class="text-3xl font-extrabold text-blue-700 mt-2">{{ \App\Models\Patient::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
