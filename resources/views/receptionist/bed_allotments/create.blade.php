<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Allot Bed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('receptionist.bed-allotments.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                            <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="bed_number" class="block text-sm font-medium text-gray-700">Bed Number</label>
                            <input type="text" name="bed_number" id="bed_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="allotment_time" class="block text-sm font-medium text-gray-700">Allotment Time</label>
                            <input type="datetime-local" name="allotment_time" id="allotment_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500" required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded shadow hover:bg-amber-700 transition">Save Allotment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
