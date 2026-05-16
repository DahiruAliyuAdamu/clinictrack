<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medical Records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="space-y-4">
                        @forelse($records as $record)
                            <div class="bg-gray-50 border-l-4 border-blue-500 p-4 rounded shadow-sm">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-lg text-blue-800">Date: {{ $record->created_at->format('M d, Y') }}</h4>
                                    <span class="text-sm text-gray-500">Dr. {{ $record->doctor->user->last_name }}</span>
                                </div>
                                <p><strong>Diagnosis:</strong> {{ $record->diagnosis }}</p>
                                @if($record->symptoms) <p><strong>Symptoms:</strong> {{ $record->symptoms }}</p> @endif
                                @if($record->notes) <p class="mt-2 text-sm text-gray-600"><em>Notes: {{ $record->notes }}</em></p> @endif
                            </div>
                        @empty
                            <p class="text-gray-500">No medical records found.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
