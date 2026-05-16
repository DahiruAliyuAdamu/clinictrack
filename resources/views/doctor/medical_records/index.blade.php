<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Medical Records') }}
            </h2>
            <a href="{{ route('doctor.medical-records.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded">
                Add Record
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="space-y-4">
                        @forelse($records as $record)
                            <div class="bg-gray-50 border-l-4 border-emerald-500 p-4 rounded shadow-sm">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-lg text-emerald-800">Patient: {{ $record->patient->user->first_name }} {{ $record->patient->user->last_name }}</h4>
                                    <span class="text-sm text-gray-500">{{ $record->created_at->format('M d, Y') }}</span>
                                </div>
                                <p><strong>Diagnosis:</strong> {{ $record->diagnosis }}</p>
                                @if($record->symptoms) <p><strong>Symptoms:</strong> {{ $record->symptoms }}</p> @endif
                                <div class="grid grid-cols-2 gap-4 mt-2 text-sm text-gray-700">
                                    @if($record->blood_pressure) <div><strong>BP:</strong> {{ $record->blood_pressure }}</div> @endif
                                    @if($record->weight) <div><strong>Weight:</strong> {{ $record->weight }} kg</div> @endif
                                </div>
                                @if($record->notes) <p class="mt-2 text-sm text-gray-600 border-t pt-2"><em>Notes: {{ $record->notes }}</em></p> @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No medical records created yet.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
