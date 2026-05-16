<nav x-data="{ open: false }" class="bg-white border-b border-slate-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="scale-[0.8] origin-left" />
                    </a>
                </div>

                <div class="hidden space-x-10 sm:-my-px sm:ms-16 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-xs font-bold uppercase tracking-widest">
                        {{ __('Portal') }}
                    </x-nav-link>

                    @role('admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" class="text-xs font-bold uppercase tracking-widest">Users</x-nav-link>
                        <x-nav-link :href="route('admin.departments.index')" :active="request()->routeIs('admin.departments.*')" class="text-xs font-bold uppercase tracking-widest">Clinics</x-nav-link>
                    @endrole

                    @role('doctor')
                        <x-nav-link :href="route('doctor.appointments.index')" :active="request()->routeIs('doctor.appointments.*')" class="text-xs font-bold uppercase tracking-widest">Patients</x-nav-link>
                        <x-nav-link :href="route('doctor.schedules.index')" :active="request()->routeIs('doctor.schedules.*')" class="text-xs font-bold uppercase tracking-widest">Schedule</x-nav-link>
                    @endrole

                    @role('patient')
                        <x-nav-link :href="route('patient.appointments.index')" :active="request()->routeIs('patient.appointments.*')" class="text-xs font-bold uppercase tracking-widest">My Care</x-nav-link>
                        <x-nav-link :href="route('patient.medical-records.index')" :active="request()->routeIs('patient.medical-records.*')" class="text-xs font-bold uppercase tracking-widest">Health Records</x-nav-link>
                    @endrole

                    @role('receptionist')
                        <x-nav-link :href="route('receptionist.appointments.index')" :active="request()->routeIs('receptionist.appointments.*')" class="text-xs font-bold uppercase tracking-widest">Reception</x-nav-link>
                        <x-nav-link :href="route('receptionist.invoices.index')" :active="request()->routeIs('receptionist.invoices.*')" class="text-xs font-bold uppercase tracking-widest">Finance</x-nav-link>
                    @endrole

                    @role('pharmacist')
                        <x-nav-link :href="route('pharmacist.medicines.index')" :active="request()->routeIs('pharmacist.medicines.*')" class="text-xs font-bold uppercase tracking-widest">Inventory</x-nav-link>
                        <x-nav-link :href="route('pharmacist.prescriptions.index')" :active="request()->routeIs('pharmacist.prescriptions.*')" class="text-xs font-bold uppercase tracking-widest">Prescriptions</x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-5 py-2.5 border border-slate-100 text-[11px] font-bold uppercase tracking-widest rounded-xl text-slate-500 bg-slate-50/50 hover:bg-slate-100 transition duration-150">
                            <div class="flex items-center gap-2">
                                <div class="w-1.5 h-1.5 rounded-full bg-teal-600"></div>
                                {{ Auth::user()->first_name }}
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-bold uppercase tracking-widest text-slate-500">
                            {{ __('Account Settings') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-xs font-bold uppercase tracking-widest text-red-500">
                                {{ __('Sign Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-xs font-bold uppercase tracking-widest">
                {{ __('Portal') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-50">
            <div class="px-6">
                <div class="font-bold text-xs uppercase tracking-widest text-slate-800">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                <div class="font-medium text-[10px] text-slate-400 uppercase tracking-widest">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-xs font-bold uppercase tracking-widest">
                    {{ __('Account') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-xs font-bold uppercase tracking-widest text-red-500">
                        {{ __('Sign Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
