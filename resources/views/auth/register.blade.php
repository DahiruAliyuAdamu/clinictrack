<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Create Account</h2>
        <p class="text-sm text-slate-500 mt-1">Join Dahasma Specialist Hospital portal.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />
                <x-text-input id="first_name" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />
                <x-text-input id="last_name" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Medical Email')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />
            <x-text-input id="email" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Security Password')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />

            <x-text-input id="password" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Security Password')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />

            <x-text-input id="password_confirmation" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center bg-teal-800 hover:bg-teal-900 text-white font-bold py-4 rounded-xl shadow-lg shadow-teal-900/10 transition-all active:scale-[0.98]">
                {{ __('Initialize Account') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <p class="text-xs text-slate-400 font-medium tracking-wide">
                {{ __('Already have an account?') }} 
                <a class="text-teal-700 font-bold hover:text-teal-800 transition-colors" href="{{ route('login') }}">
                    {{ __('Sign In Here') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
