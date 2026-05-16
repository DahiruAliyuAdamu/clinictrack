<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Prescriptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        @foreach($prescriptions as $presc)
                            <div class="bg-gray-50 border-l-4 border-teal-500 p-4 rounded shadow-sm">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-lg text-teal-800">Patient: {{ $presc->patient->user->first_name }} {{ $presc->patient->user->last_name }}</h4>
                                    <span class="text-sm text-gray-500">Dr. {{ $presc->doctor->user->last_name }} - {{ $presc->created_at->format('M d, Y') }}</span>
                                </div>
                                <p><strong>Notes/Instructions:</strong> {{ $presc->notes }}</p>
                                
                                @if($presc->items->count() > 0)
                                <div class="mt-3">
                                    <h5 class="font-semibold text-sm uppercase text-gray-500 tracking-wider">Medicines</h5>
                                    <ul class="list-disc list-inside text-sm text-gray-700 mt-1">
                                        @foreach($presc->items as $item)
                                            <li>{{ $item->medicine->name }} - {{ $item->dosage }} for {{ $item->duration_days }} days</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
