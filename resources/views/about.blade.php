@extends('layouts.app')

@section('title', 'About Us - AKAAT Technologies')
@section('description', 'Learn about AKAAT Technologies, our mission, vision, and the team behind our technology solutions.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'About Us', 'url' => route('about')]
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
                    <span class="text-brand-orange font-bold text-xs">#1 TECHNOLOGY PARTNER</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    About <span class="text-brand-orange italic font-['Inter']">AKAAT</span><br/>
                    Technologies
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    We're passionate about technology and committed to helping businesses and individuals succeed in the digital world through innovation and excellence.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <button class="bg-brand-orange text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Our Services
                    </button>
                    <button class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-brand-orange transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        Contact Us 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </button>
                </div>
                
                <!-- Stats -->
                <div class="flex items-center gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-blue mb-1">500+</div>
                        <div class="text-sm text-gray-400">Projects</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-green mb-1">200+</div>
                        <div class="text-sm text-gray-400">Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-brand-orange mb-1">5+</div>
                        <div class="text-sm text-gray-400">Years</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main Team Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-blue-50 z-10">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop" alt="AKAAT Technologies Team" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Building Tomorrow's Technology...
                    </div>
                </div>
                
                <!-- Floating Card: Company Stats -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Client Success</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ +98%</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">200+</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">Happy Clients</div>
                </div>
                
                <!-- Floating Card: Experience -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Experience</span>
                        <span class="text-emerald-500 text-xs font-bold">Since 2019</span>
                    </div>
                    <!-- Years Badge -->
                    <div class="relative flex flex-col items-center">
                        <div class="w-20 h-20 bg-brand-orange rounded-full flex items-center justify-center mb-2">
                            <span class="text-white font-black text-2xl">5+</span>
                        </div>
                        <span class="text-sm font-bold text-slate-900">Years Strong</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-akaat-blue" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">💼</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">🎯</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">⚡</div>
                </div>
                
                <!-- Excellence Badge -->
                <div class="absolute bottom-24 -right-12 bg-akaat-blue text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>🏆</span> Excellence
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

    <!-- Our Story Section - Modern Design -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                        <span class="text-xs font-bold text-brand-orange">📖 OUR STORY</span>
                    </div>
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">How we started <br/> our <span class="text-brand-orange italic">journey</span></h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">From a small startup to a trusted technology partner serving clients across various industries.</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Side: Content -->
                <div class="space-y-6">
                    <p class="text-lg text-gray-600 leading-relaxed font-['Inter']">
                        Founded with a vision to bridge the technology gap for businesses and individuals, AKAAT Technologies has grown from a small startup to a trusted technology partner serving clients across various industries.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed font-['Inter']">
                        Our journey began with a simple belief: <strong class="text-[#111827]">technology should be accessible, reliable, and transformative</strong>. Today, we continue to uphold these values while expanding our services to meet the evolving needs of our clients.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed font-['Inter']">
                        From printing services to cutting-edge web development, from software solutions to professional training programs, we've built our reputation on quality, innovation, and exceptional customer service.
                    </p>
                    
                    <!-- Key Achievements -->
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <div class="text-3xl font-bold text-akaat-blue mb-2 font-['Plus_Jakarta_Sans']">500+</div>
                            <div class="text-gray-600 font-medium font-['Inter']">Projects Completed</div>
                        </div>
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <div class="text-3xl font-bold text-akaat-green mb-2 font-['Plus_Jakarta_Sans']">200+</div>
                            <div class="text-gray-600 font-medium font-['Inter']">Happy Clients</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Visual -->
                <div class="relative">
                    <div class="bg-white rounded-[32px] p-8 shadow-xl border border-gray-100">
                        <!-- Timeline -->
                        <div class="space-y-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-akaat-blue/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-akaat-blue font-bold text-sm">2019</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Company Founded</h4>
                                    <p class="text-gray-600 text-sm font-['Inter']">Started with a vision to make technology accessible to everyone</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-akaat-green/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-akaat-green font-bold text-sm">2021</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Service Expansion</h4>
                                    <p class="text-gray-600 text-sm font-['Inter']">Added web development and software solutions to our portfolio</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-brand-orange font-bold text-sm">2023</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Training Programs</h4>
                                    <p class="text-gray-600 text-sm font-['Inter']">Launched comprehensive technology training programs</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-purple-600 font-bold text-sm">2024</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Market Leadership</h4>
                                    <p class="text-gray-600 text-sm font-['Inter']">Became the leading technology partner in our region</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="absolute -top-6 -right-6 bg-brand-orange text-white p-4 rounded-2xl shadow-xl">
                        <div class="text-2xl font-bold">98%</div>
                        <div class="text-xs opacity-90">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section - Modern Cards -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">🎯 MISSION & VISION</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Our Purpose & <span class="text-brand-orange italic">Direction</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Driving innovation and empowering success through technology solutions that make a difference.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Mission Card -->
                <div class="relative group">
                    <div class="bg-white rounded-[32px] p-10 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300 h-full">
                        <!-- Icon -->
                        <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                            <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-3xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans']">Our Mission</h3>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed font-['Inter']">
                            To provide innovative, reliable, and accessible technology solutions that empower businesses and individuals to achieve their goals and thrive in the digital age.
                        </p>
                        
                        <!-- Mission Points -->
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-akaat-green/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Deliver exceptional quality in every project</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-akaat-green/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Foster long-term partnerships with our clients</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-akaat-green/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Continuously innovate and adapt to new technologies</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Element -->
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-akaat-blue rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-white font-bold text-sm">M</span>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="relative group">
                    <div class="bg-white rounded-[32px] p-10 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300 h-full">
                        <!-- Icon -->
                        <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                            <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-3xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans']">Our Vision</h3>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed font-['Inter']">
                            To be the leading technology partner in our region, recognized for our innovation, expertise, and commitment to client success across all our service areas.
                        </p>
                        
                        <!-- Vision Points -->
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brand-orange/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Expand our reach to serve more communities</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brand-orange/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Lead in emerging technology adoption</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brand-orange/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-3 w-3 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium font-['Inter']">Create positive impact through technology education</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Element -->
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-akaat-green rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-white font-bold text-sm">V</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section - Modern Grid -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">⭐ CORE VALUES</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    What Drives <span class="text-brand-orange italic">Us</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    The principles that guide everything we do at AKAAT Technologies and shape our culture.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Excellence -->
                <div class="group bg-white rounded-[24px] p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Excellence</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">
                        We strive for excellence in every project, delivering quality that exceeds expectations and sets new standards.
                    </p>
                </div>

                <!-- Innovation -->
                <div class="group bg-white rounded-[24px] p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Innovation</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">
                        We embrace new technologies and creative solutions to solve complex challenges and drive progress.
                    </p>
                </div>

                <!-- Integrity -->
                <div class="group bg-white rounded-[24px] p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/20 transition-colors">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Integrity</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">
                        We conduct business with honesty, transparency, and ethical practices in all our interactions.
                    </p>
                </div>

                <!-- Partnership -->
                <div class="group bg-white rounded-[24px] p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Partnership</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">
                        We build lasting relationships based on trust, collaboration, and mutual success with our clients.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section - Modern Cards -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">👥 OUR TEAM</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Meet the <span class="text-brand-orange italic">Experts</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Our diverse team of experts brings together years of experience and passion for technology innovation.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="group bg-white rounded-[32px] p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <!-- Profile Image -->
                    <div class="relative mb-8">
                        <div class="w-28 h-28 bg-akaat-blue/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-akaat-blue/20 transition-colors">
                            <span class="text-akaat-blue font-bold text-3xl font-['Plus_Jakarta_Sans']">AK</span>
                        </div>
                        <!-- Status Indicator -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Ahmed Khan</h3>
                    <p class="text-akaat-blue font-semibold mb-4 font-['Inter']">CEO & Founder</p>
                    <p class="text-gray-600 mb-8 leading-relaxed font-['Inter']">
                        Visionary leader with 10+ years in technology and business development. Passionate about innovation and client success.
                    </p>
                    
                    <!-- Skills -->
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-3 py-1 bg-akaat-blue/10 text-akaat-blue rounded-full text-xs font-medium">Leadership</span>
                        <span class="px-3 py-1 bg-akaat-blue/10 text-akaat-blue rounded-full text-xs font-medium">Strategy</span>
                        <span class="px-3 py-1 bg-akaat-blue/10 text-akaat-blue rounded-full text-xs font-medium">Innovation</span>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-akaat-blue rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-akaat-blue rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group bg-white rounded-[32px] p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <!-- Profile Image -->
                    <div class="relative mb-8">
                        <div class="w-28 h-28 bg-akaat-green/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-akaat-green/20 transition-colors">
                            <span class="text-akaat-green font-bold text-3xl font-['Plus_Jakarta_Sans']">SA</span>
                        </div>
                        <!-- Status Indicator -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Sarah Ahmed</h3>
                    <p class="text-akaat-green font-semibold mb-4 font-['Inter']">Lead Developer</p>
                    <p class="text-gray-600 mb-8 leading-relaxed font-['Inter']">
                        Full-stack developer with expertise in modern web technologies. Leads our development team with innovation and precision.
                    </p>
                    
                    <!-- Skills -->
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-3 py-1 bg-akaat-green/10 text-akaat-green rounded-full text-xs font-medium">React</span>
                        <span class="px-3 py-1 bg-akaat-green/10 text-akaat-green rounded-full text-xs font-medium">Laravel</span>
                        <span class="px-3 py-1 bg-akaat-green/10 text-akaat-green rounded-full text-xs font-medium">DevOps</span>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-akaat-green rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-akaat-green rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group bg-white rounded-[32px] p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <!-- Profile Image -->
                    <div class="relative mb-8">
                        <div class="w-28 h-28 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-brand-orange/20 transition-colors">
                            <span class="text-brand-orange font-bold text-3xl font-['Plus_Jakarta_Sans']">MT</span>
                        </div>
                        <!-- Status Indicator -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Michael Thompson</h3>
                    <p class="text-brand-orange font-semibold mb-4 font-['Inter']">Training Director</p>
                    <p class="text-gray-600 mb-8 leading-relaxed font-['Inter']">
                        Experienced educator and technology trainer. Passionate about empowering others through knowledge and skills development.
                    </p>
                    
                    <!-- Skills -->
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-3 py-1 bg-brand-orange/10 text-brand-orange rounded-full text-xs font-medium">Teaching</span>
                        <span class="px-3 py-1 bg-brand-orange/10 text-brand-orange rounded-full text-xs font-medium">Curriculum</span>
                        <span class="px-3 py-1 bg-brand-orange/10 text-brand-orange rounded-full text-xs font-medium">Mentoring</span>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-brand-orange rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-brand-orange rounded-full flex items-center justify-center transition-colors group">
                            <svg class="h-4 w-4 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                    </div>
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
                        <span class="text-xs font-bold text-brand-orange">🚀 READY TO START?</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-[#111827] leading-tight mb-8 font-['Plus_Jakarta_Sans']">
                        Ready to Work 
                        <span class="text-brand-orange italic">With Us?</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-lg font-['Inter']">
                        Let's discuss how AKAAT Technologies can help you achieve your goals with our comprehensive technology solutions and expert team.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-12">
                        <a href="{{ route('contact') }}" class="group bg-brand-orange hover:bg-[#e14a30] text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            Get In Touch
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                            </div>
                        </a>
                        
                        <a href="{{ route('services.development') }}" class="group bg-white border-2 border-gray-200 hover:border-akaat-blue text-[#111827] hover:text-akaat-blue px-10 py-5 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-3">
                            View Our Services
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-blue mb-1">500+</div>
                            <div class="text-sm text-gray-500">Projects Completed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-green mb-1">98%</div>
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
                                <div class="w-12 h-12 bg-akaat-blue rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">A</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827]">AKAAT Technologies</div>
                                    <div class="text-sm text-gray-500">Your Technology Partner</div>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                        
                        <!-- Contact Options -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-blue rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">+256 123 456 789</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-green rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">info@akaattech.com</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-xl">
                                <div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Kampala, Uganda</span>
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