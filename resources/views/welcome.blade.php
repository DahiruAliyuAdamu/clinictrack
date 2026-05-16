<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dahasma | Professional Healthcare Management</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .hero-pattern {
                background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px);
                background-size: 24px 24px;
            }
        </style>
    </head>
    <body class="antialiased selection:bg-teal-100 selection:text-teal-900">
        <!-- Minimal Navigation -->
        <nav class="glass-nav h-20 border-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-12 h-full flex justify-between items-center">
                <a href="/" class="flex items-center">
                    <x-application-logo class="scale-90 origin-left" />
                </a>

                <div class="hidden md:flex items-center gap-12">
                    <div class="flex gap-8">
                        <a href="#specialties" class="text-[11px] font-bold text-slate-400 hover:text-teal-800 transition-colors uppercase tracking-[0.2em]">Specialties</a>
                        <a href="#technology" class="text-[11px] font-bold text-slate-400 hover:text-teal-800 transition-colors uppercase tracking-[0.2em]">Technology</a>
                    </div>
                    <div class="h-4 w-[1px] bg-slate-100"></div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-clinical-primary text-xs py-2.5 px-8">Portal</a>
                        @else
                            <div class="flex items-center gap-4">
                                <a href="{{ route('login') }}" class="text-[11px] font-bold text-slate-500 hover:text-teal-800 transition-colors uppercase tracking-widest">Sign In</a>
                                <a href="{{ route('register') }}" class="btn-clinical-primary text-xs py-2.5 px-8">Register</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <main>
            <!-- Hero: The Calm Entry -->
            <section class="relative pt-24 pb-40 hero-pattern overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white via-white to-slate-50/50 -z-10"></div>
                <div class="max-w-7xl mx-auto px-6 lg:px-12">
                    <div class="max-w-4xl">
                        <div class="inline-flex items-center gap-3 px-3 py-1.5 rounded-full bg-teal-50/50 border border-teal-100 text-[10px] font-bold text-teal-800 tracking-widest uppercase mb-10">
                            Professional Medical Ecosystem
                        </div>
                        <h1 class="text-7xl lg:text-[100px] font-bold text-slate-900 leading-[0.95] tracking-tight mb-12">
                            Empowering Care <br/>
                            <span class="text-slate-300">Through Design.</span>
                        </h1>
                        <p class="text-xl text-slate-500 leading-relaxed max-w-2xl mb-16 font-medium">
                            Dahasma is a specialist healthcare platform designed to reduce cognitive load for clinicians and provide a seamless, calm journey for patients.
                        </p>
                        <div class="flex flex-wrap gap-6">
                            <a href="{{ route('register') }}" class="btn-clinical-primary text-lg px-12 py-5 rounded-2xl shadow-2xl shadow-teal-900/10 transition-all hover:scale-[1.02]">Get Started</a>
                            <a href="#specialties" class="btn-clinical-outline text-lg px-12 py-5 rounded-2xl">Our Services</a>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Minimalist Abstract Component -->
                <div class="absolute top-40 right-[-100px] w-[600px] h-[600px] bg-teal-50/30 rounded-full blur-[100px] -z-10"></div>
            </section>

            <!-- Stats: Clear & Objective -->
            <section class="py-24 bg-white border-y border-slate-50">
                <div class="max-w-7xl mx-auto px-6 lg:px-12">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                        <div>
                            <div class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-2">Patients Served</div>
                            <div class="text-4xl font-bold text-slate-800 tracking-tight">12.5k+</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-2">Specialists</div>
                            <div class="text-4xl font-bold text-slate-800 tracking-tight">85+</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-2">Departments</div>
                            <div class="text-4xl font-bold text-slate-800 tracking-tight">18</div>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-300 uppercase tracking-widest mb-2">Satisfaction</div>
                            <div class="text-4xl font-bold text-slate-800 tracking-tight">99.2%</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Specialties: The Clinical Grid -->
            <section id="specialties" class="py-32 bg-slate-50/50">
                <div class="max-w-7xl mx-auto px-6 lg:px-12">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-24 gap-8">
                        <div class="max-w-xl">
                            <h2 class="text-4xl font-bold text-slate-900 tracking-tight mb-6">World-Class Specialties</h2>
                            <p class="text-slate-500 font-medium leading-relaxed">Our clinical departments are staffed by leading specialists and equipped with the latest diagnostic technology.</p>
                        </div>
                        <a href="#" class="text-xs font-bold text-teal-800 tracking-widest uppercase border-b-2 border-teal-100 pb-2 hover:border-teal-800 transition-all">View All Departments</a>
                    </div>

                    <div class="grid md:grid-cols-3 gap-12">
                        <div class="clinic-card p-12 bg-white group">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-400 mb-10 transition-all group-hover:bg-teal-800 group-hover:text-white group-hover:shadow-xl group-hover:shadow-teal-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Cardiology</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-10">Advanced cardiac diagnostics and intervention programs focused on heart longevity.</p>
                            <div class="flex items-center gap-2 text-[10px] font-bold text-teal-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-all">
                                Learn More <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2"/></svg>
                            </div>
                        </div>

                        <div class="clinic-card p-12 bg-white group">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-400 mb-10 transition-all group-hover:bg-teal-800 group-hover:text-white group-hover:shadow-xl group-hover:shadow-teal-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Diagnostics</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-10">High-resolution imaging and laboratory analysis with rapid digital reporting.</p>
                            <div class="flex items-center gap-2 text-[10px] font-bold text-teal-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-all">
                                Learn More <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2"/></svg>
                            </div>
                        </div>

                        <div class="clinic-card p-12 bg-white group">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-400 mb-10 transition-all group-hover:bg-teal-800 group-hover:text-white group-hover:shadow-xl group-hover:shadow-teal-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.183.31l-.443.31a2 2 0 00-.765 1.572v.428h16.5v-.428a2 2 0 00-.765-1.572l-.443-.31z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 11a4 4 0 100-8 4 4 0 000 8z" stroke-width="2"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Pediatrics</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-10">Compassionate, specialized care for the smallest members of our community.</p>
                            <div class="flex items-center gap-2 text-[10px] font-bold text-teal-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-all">
                                Learn More <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-white py-32 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-6 lg:px-12">
                <div class="flex flex-col md:flex-row justify-between items-start gap-16">
                    <div class="max-w-xs">
                        <x-application-logo class="mb-10 scale-90 origin-left" />
                        <p class="text-slate-400 font-medium leading-relaxed text-sm">
                            Setting the global standard for professional clinical management and patient-centric design.
                        </p>
                    </div>
                    <div class="flex gap-24">
                        <div>
                            <h4 class="text-[10px] font-bold text-slate-300 uppercase tracking-widest mb-10">Contact</h4>
                            <ul class="space-y-6 text-sm font-bold text-slate-600">
                                <li>Emergency: 911</li>
                                <li>Office: 555-DAHASMA</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-bold text-slate-300 uppercase tracking-widest mb-10">Legal</h4>
                            <ul class="space-y-6 text-sm font-bold text-slate-600">
                                <li>Privacy</li>
                                <li>Compliance</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-32 pt-12 border-t border-slate-50 text-center">
                    <span class="text-[9px] font-bold text-slate-300 uppercase tracking-[0.4em]">
                        &copy; {{ date('Y') }} DAHASMA SPECIALIST HOSPITAL
                    </span>
                </div>
            </div>
        </footer>
    </body>
</html>
