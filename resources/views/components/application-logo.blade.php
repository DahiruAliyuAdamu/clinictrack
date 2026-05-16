<div {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>
    <div class="relative group">
        <!-- Refined Logo Shape -->
        <div class="w-10 h-10 bg-teal-800 rounded-xl flex items-center justify-center shadow-sm transform transition-all duration-500">
            <!-- Simplified Medical Symbol -->
            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20M4 12H20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M7 7L17 17M17 7L7 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" class="opacity-40"/>
            </svg>
        </div>
    </div>
    
    <div class="flex flex-col">
        <span class="text-lg font-bold tracking-tight text-slate-800 leading-none">
            DAHASMA
        </span>
        <span class="text-[9px] font-bold tracking-[0.25em] text-teal-800/60 uppercase mt-1">
            Specialist Hospital
        </span>
    </div>
</div>
