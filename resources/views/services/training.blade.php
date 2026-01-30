@extends('layouts.app')

@section('title', 'Training Programs - AKAAT Technologies')
@section('description', 'Professional training courses in computer skills, graphic design, and programming to advance your career.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Services', 'url' => '#'],
    ['title' => 'Training Programs', 'url' => route('services.training')]
]" />
@endsection

@section('content')
    <!-- Modern Hero Section - Consistent with Home Page -->
    <section class="hero-section bg-white">
        <div class="max-w-7xl mx-auto px-10 pt-8 pb-0 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side -->
            <div class="relative z-10">
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-50 rounded-lg mb-8 border border-orange-100">
                    <span class="text-brand-orange font-bold text-xs">📚 TRAINING PROGRAMS</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    Professional <br/>
                    <span class="text-brand-orange italic font-['Inter']">Training</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    Advance your career with our comprehensive training programs. From computer basics to advanced programming, we provide hands-on learning experiences that prepare you for success.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <a href="{{ route('contact') }}" class="bg-brand-orange text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Enroll Now
                    </a>
                    <a href="#courses" class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-brand-orange transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        View Courses 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="flex items-center gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-blue mb-1">500+</div>
                        <div class="text-sm text-gray-400">Students Trained</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-green mb-1">95%</div>
                        <div class="text-sm text-gray-400">Success Rate</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-brand-orange mb-1">12</div>
                        <div class="text-sm text-gray-400">Course Options</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main Training Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-orange-50 z-10">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800&auto=format&fit=crop" alt="Professional Training" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Learning in Progress...
                    </div>
                </div>
                
                <!-- Floating Card: Course Progress -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Course Progress</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ 85%</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">Web Dev</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">12 weeks program</div>
                </div>
                
                <!-- Floating Card: Certification -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Certification</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ Ready</span>
                    </div>
                    <!-- Certification Badge -->
                    <div class="relative flex flex-col items-center">
                        <div class="w-16 h-16 bg-brand-orange rounded-full flex items-center justify-center mb-2">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-black text-slate-900">Certified</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-brand-orange" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">💻</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">🎨</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📊</div>
                </div>
                
                <!-- Modern Badge -->
                <div class="absolute bottom-24 -right-12 bg-akaat-green text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>🎓</span> Expert
                </div>
                
                <!-- Decorative Logo Badge -->
                <div class="absolute -top-10 -left-10 w-16 h-16 bg-white rounded-3xl shadow-xl flex items-center justify-center z-0">
                    <div class="w-8 h-8 bg-brand-orange rotate-45 rounded-md flex items-center justify-center overflow-hidden">
                        <div class="w-4 h-4 bg-white/20 -rotate-45"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Courses Section -->
    <section id="courses" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                        <span class="text-xs font-bold text-brand-orange">📚 OUR COURSES</span>
                    </div>
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">Training <br/> <span class="text-brand-orange italic">Courses</span></h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">Choose from our comprehensive range of courses designed to build practical skills and advance your career.</p>
                </div>
            </div>

            <!-- Course Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Computer Basics -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange/20 transition-colors">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Computer Basics</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Essential computer skills for beginners and those looking to improve their digital literacy.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Windows/Mac operating systems
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Microsoft Office Suite
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Internet and email basics
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            File management
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-brand-orange">$299</span>
                        <span class="text-sm text-gray-500">4 weeks</span>
                    </div>
                </div>

                <!-- Graphic Design -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5a2 2 0 00-2 2v12a4 4 0 004 4h2a2 2 0 002-2V5a2 2 0 00-2-2H7zM9 9h6m-6 4h6m2 5l-2-2 2-2"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Graphic Design</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Master the art of visual communication with industry-standard design software.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Adobe Photoshop
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Adobe Illustrator
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Design principles
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Portfolio development
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-akaat-blue">$599</span>
                        <span class="text-sm text-gray-500">8 weeks</span>
                    </div>
                </div>

                <!-- Web Development -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Web Development</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Learn to build modern websites and web applications from scratch.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            HTML, CSS, JavaScript
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Responsive design
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            PHP & MySQL
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Project-based learning
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-akaat-green">$899</span>
                        <span class="text-sm text-gray-500">12 weeks</span>
                    </div>
                </div>

                <!-- Programming Fundamentals -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Programming Fundamentals</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Start your programming journey with fundamental concepts and practical coding.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Programming logic
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Python basics
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Problem-solving techniques
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Hands-on projects
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-purple-600">$699</span>
                        <span class="text-sm text-gray-500">10 weeks</span>
                    </div>
                </div>

                <!-- Digital Marketing -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-pink-200 transition-colors">
                        <svg class="h-10 w-10 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Digital Marketing</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Master online marketing strategies and tools to grow your business or career.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Social media marketing
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Google Ads & Analytics
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Content marketing
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Email marketing
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-pink-600">$499</span>
                        <span class="text-sm text-gray-500">6 weeks</span>
                    </div>
                </div>

                <!-- Data Analysis -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-indigo-200 transition-colors">
                        <svg class="h-10 w-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Data Analysis</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Learn to analyze and visualize data to make informed business decisions.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter'] mb-6">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Excel advanced features
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Data visualization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Statistical analysis
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Business intelligence
                        </li>
                    </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-indigo-600">$799</span>
                        <span class="text-sm text-gray-500">8 weeks</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">⭐ WHY CHOOSE US</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Why Choose Our <span class="text-brand-orange italic">Training?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Our training programs are designed to provide practical, job-ready skills with personalized attention.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Expert Instructors</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Learn from industry professionals with years of real-world experience.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Small Class Sizes</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Personalized attention with maximum 12 students per class.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Hands-on Learning</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Practical projects and real-world applications in every course.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Certification</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Receive industry-recognized certificates upon course completion.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">📅 SCHEDULE</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Upcoming <span class="text-brand-orange italic">Sessions</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Choose from our flexible scheduling options to fit your lifestyle and commitments.
                </p>
            </div>

            <div class="bg-white rounded-[32px] p-12 shadow-xl border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/20 transition-colors">
                            <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Morning Sessions</h3>
                        <p class="text-gray-600 mb-2 text-lg font-medium">9:00 AM - 12:00 PM</p>
                        <p class="text-sm text-gray-500">Monday to Friday</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/20 transition-colors">
                            <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Evening Sessions</h3>
                        <p class="text-gray-600 mb-2 text-lg font-medium">6:00 PM - 9:00 PM</p>
                        <p class="text-sm text-gray-500">Monday to Friday</p>
                    </div>
                    <div class="text-center group">
                        <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/20 transition-colors">
                            <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Weekend Sessions</h3>
                        <p class="text-gray-600 mb-2 text-lg font-medium">10:00 AM - 4:00 PM</p>
                        <p class="text-sm text-gray-500">Saturday & Sunday</p>
                    </div>
                </div>
                <div class="text-center mt-12 pt-8 border-t border-gray-100">
                    <p class="text-gray-600 mb-6 text-lg">Next batch starts: <span class="font-bold text-akaat-blue">February 15, 2026</span></p>
                    <a href="{{ route('contact') }}" class="bg-brand-orange text-white px-10 py-4 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 inline-flex items-center gap-3">
                        Reserve Your Spot
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">💬 TESTIMONIALS</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Student Success <span class="text-brand-orange italic">Stories</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Hear from our graduates who have transformed their careers through our training programs.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 rounded-[32px] p-10 shadow-lg border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-brand-orange rounded-full flex items-center justify-center mr-6">
                            <span class="text-white font-bold text-xl">LM</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111827] text-lg">Lisa Martinez</h4>
                            <p class="text-sm text-gray-500">Web Development Graduate</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic leading-relaxed font-['Inter']">
                        "The web development course was exactly what I needed to transition into tech. The instructors were patient and the hands-on projects gave me a portfolio that landed me my first developer job!"
                    </p>
                </div>

                <div class="bg-gray-50 rounded-[32px] p-10 shadow-lg border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-akaat-blue rounded-full flex items-center justify-center mr-6">
                            <span class="text-white font-bold text-xl">DK</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111827] text-lg">David Kim</h4>
                            <p class="text-sm text-gray-500">Graphic Design Graduate</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic leading-relaxed font-['Inter']">
                        "I started with zero design experience and now I'm running my own freelance design business. The course covered everything from basics to advanced techniques. Highly recommended!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern CTA Section - Consistent with Home Page -->
    <section class="py-32 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #0F4C81 2px, transparent 2px), radial-gradient(circle at 75% 75%, #2ECC71 2px, transparent 2px); background-size: 60px 60px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-10 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Side: Content -->
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-8 border border-gray-200 shadow-sm">
                        <span class="text-xs font-bold text-brand-orange">📚 READY TO LEARN?</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-[#111827] leading-tight mb-8 font-['Plus_Jakarta_Sans']">
                        Ready to Start 
                        <span class="text-brand-orange italic">Learning?</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-lg font-['Inter']">
                        Take the first step towards advancing your career. Contact us to learn more about our courses and enrollment process.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-12">
                        <a href="{{ route('contact') }}" class="group bg-brand-orange hover:bg-[#e14a30] text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            Enroll Today
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                            </div>
                        </a>
                        
                        <a href="tel:+256123456789" class="group bg-white border-2 border-gray-200 hover:border-brand-orange text-[#111827] hover:text-brand-orange px-10 py-5 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Call for Info
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-blue mb-1">500+</div>
                            <div class="text-sm text-gray-500">Students Trained</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-green mb-1">95%</div>
                            <div class="text-sm text-gray-500">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-orange mb-1">12</div>
                            <div class="text-sm text-gray-500">Course Options</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Visual Element -->
                <div class="relative">
                    <!-- Main Card -->
                    <div class="relative bg-white rounded-[40px] p-8 shadow-2xl border border-gray-100">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-brand-orange rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">T</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827]">Training Programs</div>
                                    <div class="text-sm text-gray-500">Professional Learning</div>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                        
                        <!-- Features List -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-xl">
                                <div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Expert Instructors</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-blue rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Hands-on Learning</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-green rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Industry Certification</span>
                            </div>
                        </div>
                        
                        <!-- Bottom Action -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="text-sm text-gray-600">Ready to get started?</div>
                            <div class="flex items-center gap-2 text-brand-orange font-medium text-sm">
                                <span>Contact Us</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-brand-orange/10 rounded-full flex items-center justify-center">
                        <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-akaat-green/20 rounded-full"></div>
                    <div class="absolute top-1/2 -left-8 w-8 h-8 bg-akaat-blue/30 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>
@endsection