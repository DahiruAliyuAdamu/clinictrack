<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Medical Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('doctor.medical-records.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                            <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                                <option value="">-- Select Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->user->first_name }} {{ $patient->user->last_name }} (DOB: {{ $patient->date_of_birth }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="diagnosis" class="block text-sm font-medium text-gray-700">Diagnosis</label>
                            <input type="text" name="diagnosis" id="diagnosis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="symptoms" class="block text-sm font-medium text-gray-700">Symptoms</label>
                            <textarea name="symptoms" id="symptoms" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="blood_pressure" class="block text-sm font-medium text-gray-700">Blood Pressure (e.g. 120/80)</label>
                                <input type="text" name="blood_pressure" id="blood_pressure" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>
                            <div class="mb-4">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                                <input type="number" step="0.1" name="weight" id="weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Doctor's Notes</label>
                            <textarea name="notes" id="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded shadow hover:bg-emerald-700 transition">Save Record</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
