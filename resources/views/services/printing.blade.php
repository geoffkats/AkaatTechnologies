@extends('layouts.app')

@section('title', 'Printing & Stationery Services - AKAAT Technologies')
@section('description', 'Professional printing services including business cards, flyers, banners, and custom stationery solutions.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Services', 'url' => '#'],
    ['title' => 'Printing & Stationery', 'url' => route('services.printing')]
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
                    <span class="text-brand-orange font-bold text-xs">🖨️ PRINTING SERVICES</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    Professional <br/>
                    <span class="text-brand-orange italic font-['Inter']">Printing</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    High-quality printing services for all your business and personal needs. From business cards to large format banners, we deliver exceptional results.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <a href="{{ route('printing.order') }}" class="bg-brand-orange text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Place Order
                    </a>
                    <a href="#services" class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-brand-orange transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        View Services 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="flex items-center gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-blue mb-1">1000+</div>
                        <div class="text-sm text-gray-400">Projects Printed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-akaat-green mb-1">24hr</div>
                        <div class="text-sm text-gray-400">Fast Turnaround</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-brand-orange mb-1">100%</div>
                        <div class="text-sm text-gray-400">Quality Guarantee</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main Printing Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-orange-50 z-10">
                    <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07?q=80&w=800&auto=format&fit=crop" alt="Professional Printing" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        Printing in Progress...
                    </div>
                </div>
                
                <!-- Floating Card: Print Quality -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Print Quality</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ Premium</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">4K DPI</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">Ultra High Resolution</div>
                </div>
                
                <!-- Floating Card: Speed -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Speed</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ Fast</span>
                    </div>
                    <!-- Speed Gauge -->
                    <div class="relative flex flex-col items-center">
                        <svg class="w-24 h-12" viewBox="0 0 100 50">
                            <path d="M 10 50 A 40 40 0 0 1 90 50" fill="none" stroke="#fef2f2" stroke-width="12" />
                            <path d="M 10 50 A 40 40 0 0 1 85 15" fill="none" stroke="#F39C12" stroke-width="12" stroke-linecap="round" />
                        </svg>
                        <span class="text-xl font-black text-slate-900 -mt-2">24hr</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-brand-orange" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                            <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📄</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">🎨</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📐</div>
                </div>
                
                <!-- Modern Badge -->
                <div class="absolute bottom-24 -right-12 bg-akaat-green text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>✨</span> Premium
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
                        <span class="text-xs font-bold text-brand-orange">🖨️ OUR SERVICES</span>
                    </div>
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">Printing <br/> <span class="text-brand-orange italic">Services</span></h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">From small business cards to large format displays, we handle all your printing needs with precision and care.</p>
                </div>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Business Cards -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange/20 transition-colors">
                        <svg class="h-10 w-10 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Business Cards</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Professional business cards that make a lasting impression.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Standard & Premium finishes
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Matte, Gloss, or UV coating
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Custom designs available
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-brand-orange rounded-full"></div>
                            Quick turnaround time
                        </li>
                    </ul>
                </div>

                <!-- Flyers & Brochures -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-blue/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Flyers & Brochures</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Eye-catching marketing materials to promote your business.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Single & multi-fold options
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Various paper weights
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Full-color printing
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-blue rounded-full"></div>
                            Bulk pricing available
                        </li>
                    </ul>
                </div>

                <!-- Banners & Signage -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-akaat-green/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-akaat-green/20 transition-colors">
                        <svg class="h-10 w-10 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Banners & Signage</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Large format printing for events, promotions, and displays.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Indoor & outdoor materials
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Weather-resistant options
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Custom sizes available
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-akaat-green rounded-full"></div>
                            Mounting hardware included
                        </li>
                    </ul>
                </div>

                <!-- Letterheads & Envelopes -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-10 w-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Letterheads & Envelopes</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Professional stationery for your business correspondence.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Matching letterhead sets
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Various envelope sizes
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Premium paper options
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-purple-600 rounded-full"></div>
                            Brand consistency guaranteed
                        </li>
                    </ul>
                </div>

                <!-- Stickers & Labels -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-pink-200 transition-colors">
                        <svg class="h-10 w-10 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Stickers & Labels</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Custom stickers and labels for branding and organization.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Die-cut shapes available
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Waterproof materials
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Removable or permanent
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-pink-600 rounded-full"></div>
                            Small to large quantities
                        </li>
                    </ul>
                </div>

                <!-- Booklets & Catalogs -->
                <div class="group bg-white rounded-[32px] p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                    <div class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-indigo-200 transition-colors">
                        <svg class="h-10 w-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">Booklets & Catalogs</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed font-['Inter']">Multi-page publications for detailed information sharing.</p>
                    <ul class="text-sm text-gray-500 space-y-3 font-['Inter']">
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Saddle-stitched binding
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Perfect bound options
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Full-color throughout
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                            Professional layout services
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">🔄 OUR PROCESS</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Printing <span class="text-brand-orange italic">Process</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Simple, efficient workflow to get your printing projects completed on time and within budget.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 bg-brand-orange rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-orange/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Consultation</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Discuss your requirements and get expert recommendations for your printing needs.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-blue rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-blue/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Design & Quote</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Receive design mockups and detailed pricing information for your project.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-akaat-green rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-akaat-green/90 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Production</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Your project goes into production with quality checks at every stage.</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-500 transition-colors shadow-lg">
                        <span class="text-white font-bold text-2xl font-['Plus_Jakarta_Sans']">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans']">Delivery</h3>
                    <p class="text-gray-600 leading-relaxed font-['Inter']">Fast delivery or pickup options available for your convenience.</p>
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
                        <span class="text-xs font-bold text-brand-orange">🖨️ READY TO PRINT?</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-6xl font-extrabold text-[#111827] leading-tight mb-8 font-['Plus_Jakarta_Sans']">
                        Ready for Quality 
                        <span class="text-brand-orange italic">Printing?</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-lg font-['Inter']">
                        Get a free quote for your printing needs. Our team is ready to help bring your vision to life with professional quality.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-12">
                        <a href="{{ route('contact') }}" class="group bg-brand-orange hover:bg-[#e14a30] text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                            Get Free Quote
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
                            Call Now
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-blue mb-1">1000+</div>
                            <div class="text-sm text-gray-500">Projects Printed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-akaat-green mb-1">24hr</div>
                            <div class="text-sm text-gray-500">Fast Turnaround</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-orange mb-1">100%</div>
                            <div class="text-sm text-gray-500">Quality Guarantee</div>
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
                                    <span class="text-white font-bold text-lg">P</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827]">Printing Services</div>
                                    <div class="text-sm text-gray-500">Professional Quality</div>
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
                                <span class="font-medium text-[#111827]">High Quality Printing</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-blue rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Fast Turnaround</span>
                            </div>
                            
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-8 h-8 bg-akaat-green rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-[#111827]">Competitive Pricing</span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
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