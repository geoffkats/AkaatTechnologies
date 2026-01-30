@extends('layouts.app')

@section('title', 'Software Development Services - AKAAT Technologies')
@section('description', 'Custom software solutions tailored to your business needs, from desktop applications to mobile apps.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Services', 'url' => '#'],
    ['title' => 'Software Development', 'url' => route('services.software')]
]" />
@endsection

@section('content')
    <!-- Modern Hero Section - Consistent with Home Page -->
    <section class="hero-section bg-white">
        <div class="max-w-7xl mx-auto px-10 pt-8 pb-0 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side -->
            <div class="relative z-10">
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-green-50 rounded-lg mb-8 border border-green-100">
                    <span class="text-akaat-green font-bold text-xs">💻 SOFTWARE DEVELOPMENT</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    Custom <br/>
                    <span class="text-akaat-green italic font-['Inter']">Software</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    Custom software solutions designed to streamline your business processes and drive efficiency. From desktop applications to mobile apps, we build software that works for you.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <a href="{{ route('contact') }}" class="bg-akaat-green text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-green-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Discuss Your Project
                    </a>
                    <a href="#services" class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-akaat-green transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        View Solutions 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="flex items-center gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-blue mb-1">50+</div>
                        <div class="text-sm text-gray-400">Apps Built</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-green mb-1">99%</div>
                        <div class="text-sm text-gray-400">Client Satisfaction</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-brand-orange mb-1">24/7</div>
                        <div class="text-sm text-gray-400">Support</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main Software Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-green-50 z-10">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=800&auto=format&fit=crop" alt="Software Development" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Coding in Progress...
                    </div>
                </div>
                
                <!-- Floating Card: Technology -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Technology</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ Modern</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">Python</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">Laravel & React</div>
                </div>
                
                <!-- Floating Card: Performance -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Performance</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ +99%</span>
                    </div>
                    <!-- Performance Gauge -->
                    <div class="relative flex flex-col items-center">
                        <svg class="w-24 h-12" viewBox="0 0 100 50">
                            <path d="M 10 50 A 40 40 0 0 1 90 50" fill="none" stroke="#fef2f2" stroke-width="12" />
                            <path d="M 10 50 A 40 40 0 0 1 85 15" fill="none" stroke="#2ECC71" stroke-width="12" stroke-linecap="round" />
                        </svg>
                        <span class="text-xl font-black text-slate-900 -mt-2">99%</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-akaat-green" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📱</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">💾</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">⚡</div>
                </div>
                
                <!-- Modern Badge -->
                <div class="absolute bottom-24 -right-12 bg-akaat-blue text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>🚀</span> Custom
                </div>
                
                <!-- Decorative Logo Badge -->
                <div class="absolute -top-10 -left-10 w-16 h-16 bg-white rounded-3xl shadow-xl flex items-center justify-center z-0">
                    <div class="w-8 h-8 bg-akaat-green rotate-45 rounded-md flex items-center justify-center overflow-hidden">
                        <div class="w-4 h-4 bg-white/20 -rotate-45"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Services Section -->
    <section id="services" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                        <span class="text-xs font-bold text-akaat-green">💻 OUR SERVICES</span>
                    </div>
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">Software Development <br/> <span class="text-akaat-green italic">Services</span></h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">We create powerful, scalable software solutions that solve real business problems and drive growth.</p>
                </div>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Desktop Applications -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Desktop Applications</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Powerful desktop software for Windows, Mac, and Linux platforms.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Cross-platform compatibility
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Rich user interfaces
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Database integration
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Offline functionality
                        </li>
                    </ul>
                </div>

                <!-- Mobile Applications -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Mobile Applications</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Native and cross-platform mobile apps for iOS and Android.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Native iOS & Android
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Cross-platform solutions
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            App store deployment
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Push notifications
                        </li>
                    </ul>
                </div>

                <!-- Database Solutions -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange/20 transition-colors">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Database Solutions</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Robust database design and management systems for your data needs.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Database design & optimization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Data migration services
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Backup & recovery systems
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Performance tuning
                        </li>
                    </ul>
                </div>

                <!-- System Integration -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">System Integration</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Connect your existing systems and streamline business processes.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            API development & integration
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Third-party system connections
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Data synchronization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Workflow automation
                        </li>
                    </ul>
                </div>

                <!-- Business Intelligence -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-pink-200 transition-colors">
                        <svg class="h-10 w-10 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Business Intelligence</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Transform your data into actionable insights with custom BI solutions.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Custom dashboards
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Data visualization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Reporting systems
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Analytics platforms
                        </li>
                    </ul>
                </div>

                <!-- Cloud Solutions -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-indigo-200 transition-colors">
                        <svg class="h-10 w-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Cloud Solutions</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Scalable cloud-based applications and migration services.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Cloud application development
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Migration to cloud platforms
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Scalable architecture
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            DevOps implementation
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-akaat-green">🏢 INDUSTRIES</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Industries <span class="text-akaat-green italic">We Serve</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Our software solutions have helped businesses across various industries optimize their operations.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Healthcare</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Patient management and medical record systems</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Finance</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Banking and financial management solutions</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/20 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Retail</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Inventory and point-of-sale systems</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-colors shadow-lg">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Education</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Learning management and student information systems</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-akaat-green">🔄 OUR PROCESS</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Development <span class="text-akaat-green italic">Process</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    A systematic approach to software development that ensures quality, efficiency, and client satisfaction.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-green rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Analysis</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Requirements gathering and feasibility study</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Design</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">System architecture and UI/UX design</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-brand-orange rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Development</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Coding and implementation phase</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-500 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Testing</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Quality assurance and bug fixing</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-pink-500 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">5</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Deployment</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">System deployment and go-live</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-500 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">6</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Support</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Ongoing maintenance and support</p>
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
                        <span class="text-xs font-bold text-akaat-green">💻 READY TO BUILD?</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-[#111827] leading-tight mb-8 font-['Plus_Jakarta_Sans']">
                        Ready to Build Your 
                        <span class="text-akaat-green italic">Software?</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-lg font-['Inter']">
                        Let's discuss your software requirements and create a solution that transforms your business operations.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-12">
                        <a href="{{ route('contact') }}" class="group bg-akaat-green hover:bg-green-600 text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-green-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            Get Started Today
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                            </div>
                        </a>
                        
                        <a href="tel:+256123456789" class="group bg-white border-2 border-gray-200 hover:border-akaat-green text-[#111827] hover:text-akaat-green px-10 py-5 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Schedule Consultation
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-blue mb-1">50+</div>
                            <div class="text-sm text-gray-500">Apps Built</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-green mb-1">99%</div>
                            <div class="text-sm text-gray-500">Client Satisfaction</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-orange mb-1">24/7</div>
                            <div class="text-sm text-gray-500">Support Available</div>
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
                                <div class="w-12 h-12 bg-akaat-green rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">S</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827]">Software Development</div>
                                    <div class="text-sm text-gray-500">Custom Solutions</div>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                        
                        <!-- Features List -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-green rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Custom Development</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-blue rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Scalable Architecture</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-xl">
                                <div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Ongoing Support</span>
                            </div>
                        </div>
                        
                        <!-- Bottom Action -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="text-sm text-gray-600">Ready to get started?</div>
                            <div class="flex items-center gap-2 text-akaat-green font-medium text-sm">
                                <span>Contact Us</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-akaat-green/10 rounded-full flex items-center justify-center">
                        <div class="w-12 h-12 bg-akaat-green rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-akaat-blue/20 rounded-full"></div>
                    <div class="absolute top-1/2 -left-8 w-8 h-8 bg-brand-orange/30 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>
@endsection