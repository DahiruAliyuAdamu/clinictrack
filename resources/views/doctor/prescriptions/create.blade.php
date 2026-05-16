<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Write Prescription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('doctor.prescriptions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                            <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                                <option value="">-- Select Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Complex prescriptions items would require JS to add dynamically. Keeping it simple for the base implementation -->

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Prescription Details & Notes</label>
                            <textarea name="notes" id="notes" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="E.g. Amoxicillin 250mg, twice daily for 7 days..."></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded shadow hover:bg-emerald-700 transition">Generate Prescription</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
