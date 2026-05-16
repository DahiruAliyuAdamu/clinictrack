<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-blue-600">Welcome, {{ auth()->user()->first_name }}!</h3>
                    <p>Access your medical records, view past invoices, and book new appointments.</p>
                    
                    <div class="mt-8 flex gap-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">Book Appointment</button>
                        <button class="bg-gray-100 text-gray-800 px-4 py-2 rounded shadow hover:bg-gray-200 transition">View History</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
