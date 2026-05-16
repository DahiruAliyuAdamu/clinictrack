<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Staff & Patient Login</h2>
        <p class="text-sm text-slate-500 mt-1">Access Dahasma Specialist Hospital portal.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Medical ID / Email')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-2" />
            <x-text-input id="email" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <x-input-label for="password" :value="__('Security Password')" class="text-[11px] font-bold uppercase tracking-widest text-slate-400" />
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-bold uppercase tracking-widest text-teal-700 hover:text-teal-800" href="{{ route('password.request') }}">
                        {{ __('Recover Access?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block w-full border-slate-200 focus:border-teal-500 focus:ring-teal-500 rounded-xl shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-teal-800 shadow-sm focus:ring-teal-500 w-5 h-5" name="remember">
            <span class="ms-3 text-xs font-bold uppercase tracking-widest text-slate-400">{{ __('Stay Signed In') }}</span>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center bg-teal-800 hover:bg-teal-900 text-white font-bold py-4 rounded-xl shadow-lg shadow-teal-900/10 transition-all active:scale-[0.98]">
                {{ __('Authorize & Enter') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <p class="text-xs text-slate-400 font-medium tracking-wide">
                {{ __('New to Dahasma?') }} 
                <a class="text-teal-700 font-bold hover:text-teal-800 transition-colors" href="{{ route('register') }}">
                    {{ __('Create Account') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
