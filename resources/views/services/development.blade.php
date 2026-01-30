@extends('layouts.app')

@section('title', 'Web Development Services - AKAAT Technologies')
@section('description', 'Modern, responsive websites and web applications built with the latest technologies and best practices.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Services', 'url' => '#'],
    ['title' => 'Web Development', 'url' => route('services.development')]
]" />
@endsection

@section('content')
    <!-- Modern Hero Section - Consistent with Home Page -->
    <section class="hero-section bg-white">
        <div class="max-w-7xl mx-auto px-10 pt-8 pb-0 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side -->
            <div class="relative z-10">
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-blue-50 rounded-lg mb-8 border border-blue-100">
                    <span class="text-akaat-blue font-bold text-xs">💻 WEB DEVELOPMENT</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    Modern Web <br/>
                    <span class="text-brand-orange italic font-['Inter']">Development</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    Modern, responsive websites and web applications that drive results. We build digital experiences that engage your audience and grow your business.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <a href="{{ route('contact') }}" class="bg-brand-orange text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Start Your Project
                    </a>
                    <a href="#services" class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-brand-orange transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        View Services 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="flex items-center gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-blue mb-1">100+</div>
                        <div class="text-sm text-gray-400">Websites Built</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-green mb-1">99%</div>
                        <div class="text-sm text-gray-400">Uptime</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-brand-orange mb-1">24/7</div>
                        <div class="text-sm text-gray-400">Support</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main Development Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-blue-50 z-10">
                    <img src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?q=80&w=800&auto=format&fit=crop" alt="Web Development" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Building Modern Websites...
                    </div>
                </div>
                
                <!-- Floating Card: Technology Stack -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Tech Stack</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ Modern</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">React</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">Laravel & Vue.js</div>
                </div>
                
                <!-- Floating Card: Performance -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Performance</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ +95%</span>
                    </div>
                    <!-- Performance Gauge -->
                    <div class="relative flex flex-col items-center">
                        <svg class="w-24 h-12" viewBox="0 0 100 50">
                            <path d="M 10 50 A 40 40 0 0 1 90 50" fill="none" stroke="#fef2f2" stroke-width="12" />
                            <path d="M 10 50 A 40 40 0 0 1 85 15" fill="none" stroke="#2ECC71" stroke-width="12" stroke-linecap="round" />
                        </svg>
                        <span class="text-xl font-black text-slate-900 -mt-2">95%</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-akaat-blue" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">🎨</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">⚡</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📱</div>
                </div>
                
                <!-- Modern Badge -->
                <div class="absolute bottom-24 -right-12 bg-akaat-green text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>🚀</span> Modern
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

    <!-- Modern Services Section -->
    <section id="services" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                        <span class="text-xs font-bold text-brand-orange">🛠 OUR SERVICES</span>
                    </div>
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">Web Development <br/> <span class="text-brand-orange italic">Services</span></h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">From simple websites to complex web applications, we deliver solutions that meet your business objectives.</p>
                </div>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Responsive Web Design -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Responsive Web Design</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Beautiful, mobile-first websites that work perfectly on all devices and screen sizes.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Mobile-first approach
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Cross-browser compatibility
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Fast loading speeds
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            SEO optimized
                        </li>
                    </ul>
                </div>

                <!-- E-commerce Solutions -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">E-commerce Solutions</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Complete online stores with secure payment processing and inventory management systems.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Shopping cart functionality
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Payment gateway integration
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Inventory management
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Order tracking system
                        </li>
                    </ul>
                </div>

                <!-- CMS Development -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange/20 transition-colors">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">CMS Development</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Easy-to-manage content management systems for dynamic websites and blogs.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            WordPress development
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Custom CMS solutions
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            User-friendly admin panels
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Content scheduling
                        </li>
                    </ul>
                </div>

                <!-- Web Applications -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Web Applications</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Custom web applications tailored to your specific business needs and workflows.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Custom functionality
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Database integration
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            User authentication
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            API development
                        </li>
                    </ul>
                </div>

                <!-- Website Maintenance -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Website Maintenance</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Ongoing support and maintenance to keep your website running smoothly and securely.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Regular updates
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Security monitoring
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Performance optimization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Backup management
                        </li>
                    </ul>
                </div>

                <!-- SEO Optimization -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">SEO Optimization</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Search engine optimization to improve your website's visibility and ranking on Google.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Keyword research
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            On-page optimization
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Technical SEO
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Performance tracking
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">⚡ TECHNOLOGIES</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Modern <span class="text-brand-orange italic">Tech Stack</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    We work with modern, proven technologies to deliver robust and scalable solutions.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-akaat-blue font-['Plus_Jakarta_Sans']">HTML</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">HTML5</p>
                </div>
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-akaat-green font-['Plus_Jakarta_Sans']">CSS</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">CSS3</p>
                </div>
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-brand-orange font-['Plus_Jakarta_Sans']">JS</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">JavaScript</p>
                </div>
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-akaat-blue font-['Plus_Jakarta_Sans']">PHP</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">PHP</p>
                </div>
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-akaat-green font-['Plus_Jakarta_Sans']">WP</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">WordPress</p>
                </div>
                <div class="group text-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4 group-hover:shadow-xl transition-shadow border border-gray-100">
                        <span class="text-2xl font-bold text-brand-orange font-['Plus_Jakarta_Sans']">LV</span>
                    </div>
                    <p class="text-sm text-gray-600 font-medium font-['Inter']">Laravel</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">🔄 OUR PROCESS</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Development <span class="text-brand-orange italic">Process</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    A proven methodology that ensures your project is delivered on time, within budget, and exceeds expectations.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Discovery</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Understanding your goals, requirements, and target audience through detailed consultation.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-green rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Planning</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Creating wireframes, mockups, and detailed project timeline with clear milestones.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-brand-orange rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Development</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Building your website with clean, efficient code following best practices.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-500 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Testing</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Thorough testing across all devices, browsers, and performance optimization.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">5</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Launch</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Deployment, training, and ongoing support for your continued success.</p>
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
                        <span class="text-xs font-bold text-brand-orange">🚀 READY TO BUILD?</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-[#111827] leading-tight mb-8 font-['Plus_Jakarta_Sans']">
                        Ready to Build Your 
                        <span class="text-brand-orange italic">Website?</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-lg font-['Inter']">
                        Let's create a website that represents your brand and drives results for your business with modern technology.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-12">
                        <a href="{{ route('contact') }}" class="group bg-brand-orange hover:bg-[#e14a30] text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            Start Your Project
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                            </div>
                        </a>
                        
                        <a href="tel:+256123456789" class="group bg-white border-2 border-gray-200 hover:border-akaat-blue text-[#111827] hover:text-akaat-blue px-10 py-5 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Discuss Your Ideas
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-blue mb-1">100+</div>
                            <div class="text-sm text-gray-500">Websites Built</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-green mb-1">99%</div>
                            <div class="text-sm text-gray-500">Uptime Guarantee</div>
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
                                <div class="w-12 h-12 bg-akaat-blue rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">W</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827]">Web Development</div>
                                    <div class="text-sm text-gray-500">Modern & Responsive</div>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                        
                        <!-- Features List -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-blue rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Responsive Design</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-green rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">SEO Optimized</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-xl">
                                <div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Fast Loading</span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
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