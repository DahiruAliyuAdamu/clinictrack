<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-emerald-600">Welcome, Dr. {{ auth()->user()->last_name }}!</h3>
                    <p>Manage your daily appointments and update patient medical records from here.</p>
                    
                    <div class="mt-8">
                        <h4 class="font-bold text-lg mb-2">Today's Overview</h4>
                        <div class="bg-emerald-50 p-4 rounded-lg shadow border-l-4 border-emerald-500">
                            <p class="text-gray-700">You have <span class="font-bold text-emerald-700">0</span> appointments scheduled for today.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
