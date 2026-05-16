<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bed Allotments') }}
            </h2>
            <a href="{{ route('receptionist.bed-allotments.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                Allot Bed
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bed Number</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Allotment Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discharge Time</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($allotments as $allotment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $allotment->bed_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $allotment->patient->user->first_name }} {{ $allotment->patient->user->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $allotment->allotment_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $allotment->discharge_time ?? 'Still Allotted' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
