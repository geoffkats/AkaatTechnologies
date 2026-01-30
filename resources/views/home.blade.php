@extends('layouts.app')

@section('title', 'AKAAT Technologies - Your Technology Partner')
@section('description', 'AKAAT Technologies offers printing & stationery, web development, software development, and computer training services.')

@section('content')
    <!-- Modern Hero Section - Marketive Style -->
  
    <!-- Hero Section -->
    <section class="hero-section bg-white">
        <div class="max-w-7xl mx-auto px-10 pt-4 pb-0 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side -->
            <div class="relative z-10">
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-50 rounded-lg mb-8 border border-orange-100">
                    <span class="text-brand-orange font-bold text-xs">#1 TECHNOLOGY SERVICES</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="hero-title text-[#111827] mb-8 font-['Plus_Jakarta_Sans']">
                    Smarter Technology<br/>
                    Bigger <span class="text-brand-orange italic font-['Inter']">Impacts</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-xl leading-relaxed max-w-lg mb-12 font-['Inter']">
                    AKAAT gives you tools to engage, and convert without the chaos. From automated campaigns to real-time insights.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex items-center gap-4 mb-14">
                    <button class="bg-brand-orange text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-orange-200 hover:-translate-y-1 transition duration-300 font-['Plus_Jakarta_Sans']">
                        Get Started
                    </button>
                    <button class="group bg-white border border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-brand-orange transition duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        Book a Demo 
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </button>
                </div>
                
                <!-- Social Proof -->
                <div class="flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 bg-akaat-blue rounded-full border-2 border-white flex items-center justify-center">
                            <span class="text-white text-xs font-bold">A</span>
                        </div>
                        <div class="w-10 h-10 bg-akaat-green rounded-full border-2 border-white flex items-center justify-center">
                            <span class="text-white text-xs font-bold">K</span>
                        </div>
                        <div class="w-10 h-10 bg-akaat-orange rounded-full border-2 border-white flex items-center justify-center">
                            <span class="text-white text-xs font-bold">T</span>
                        </div>
                    </div>
                    <div class="text-sm">
                        <span class="text-yellow-400">★</span> 
                        <span class="font-bold text-slate-900">4.8</span> 
                        <span class="text-gray-400 ml-1">(150K)</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative grid-bg min-h-[600px] flex items-center justify-center">
                <!-- Main AKAAT Hero Image -->
                <div class="relative w-[340px] h-[450px] geometric-frame border-[12px] border-white shadow-2xl overflow-hidden bg-orange-50 z-10">
                    <img src="{{ asset('storage/assets/akaat_hero.png') }}" alt="AKAAT Technologies Professional" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-10 left-4 bg-white/90 backdrop-blur px-3 py-2 rounded-lg text-[10px] font-bold shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 bg-purple-500 rounded-full"></span>
                        Creating Technology Solutions...
                    </div>
                </div>
                
                <!-- Floating Card: Project Traffic -->
                <div class="absolute top-20 left-0 bg-white p-5 rounded-3xl shadow-2xl border border-gray-50 z-20 float-slow w-48">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-400 text-xs font-semibold">Project Traffic</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ +16.5%</span>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900 mb-1">125,536</div>
                    <div class="text-[10px] text-gray-400 underline decoration-gray-200">Since last week</div>
                </div>
                
                <!-- Floating Card: Tech Analytics -->
                <div class="absolute bottom-4 right-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 z-20 float-medium w-52">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-900 text-xs font-bold">Tech Analytics</span>
                        <span class="text-emerald-500 text-xs font-bold">↗ +20%</span>
                    </div>
                    <!-- Semi-circle Gauge -->
                    <div class="relative flex flex-col items-center">
                        <svg class="w-24 h-12" viewBox="0 0 100 50">
                            <path d="M 10 50 A 40 40 0 0 1 90 50" fill="none" stroke="#fef2f2" stroke-width="12" />
                            <path d="M 10 50 A 40 40 0 0 1 80 18" fill="none" stroke="#f15a38" stroke-width="12" stroke-linecap="round" />
                        </svg>
                        <span class="text-xl font-black text-slate-900 -mt-2">80%</span>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-10 right-0 bg-white p-3 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-5 z-20">
                    <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-brand-orange" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">☰</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">📋</div>
                    <div class="w-8 h-8 text-gray-300 flex items-center justify-center">⚡</div>
                </div>
                
                <!-- AI Integrated Badge -->
                <div class="absolute bottom-24 -right-12 bg-rose-500 text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-xl flex items-center gap-2 z-30 float-slow" style="animation-delay: 1s;">
                    <span>✨</span> Trusted
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
    
    <!-- Trusted By Section - Very close to hero -->
    <section class="bg-white -mt-4">
        <div class="max-w-7xl mx-auto px-10">
            <p class="text-sm font-semibold text-gray-400 mb-4 tracking-wider font-['Inter']">Trusted by top companies</p>
            <div class="flex flex-wrap items-center gap-16 grayscale opacity-40 pb-8">
                <div class="flex items-center gap-2 font-black text-2xl tracking-tighter font-['Plus_Jakarta_Sans']">TechCorp</div>
                <div class="flex items-center gap-2 font-black text-2xl tracking-tighter font-['Plus_Jakarta_Sans']">InnovateLab</div>
                <div class="flex items-center gap-2 font-black text-2xl tracking-tighter font-['Plus_Jakarta_Sans']">DigitalPro</div>
                <div class="flex items-center gap-2 font-black text-2xl tracking-tighter font-['Plus_Jakarta_Sans']">StartupHub</div>
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
                    <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans']">What we can do <br/> for you</h2>
                </div>
                <div class="max-w-xs text-right mt-8 md:mt-0">
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-['Inter']">From strategy to implementation, we provide quality technology solutions tailored to your needs.</p>
                    <a href="{{ route('services.development') }}" class="inline-flex items-center gap-2 bg-brand-orange hover:bg-[#e14a30] text-white font-bold px-6 py-3 rounded-full transition-colors group">
                        See our services 
                        <span class="bg-white text-brand-orange w-6 h-6 rounded-full flex items-center justify-center text-[10px] group-hover:rotate-45 transition-transform">↗</span>
                    </a>
                </div>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Printing & Stationery -->
                <div class="service-card relative h-[400px] rounded-[32px] group">
                    <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07?q=80&w=600&auto=format&fit=crop" alt="Printing Services" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-akaat-blue/90 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-brand-orange/80 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity">↗</div>
                    <div class="absolute bottom-6 left-6">
                        <p class="text-white font-bold leading-tight">Printing & <br/>Stationery</p>
                    </div>
                </div>

                <!-- Web Development -->
                <div class="service-card relative h-[400px] rounded-[32px] group">
                    <img src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?q=80&w=600&auto=format&fit=crop" alt="Web Development" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-akaat-green/90 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-brand-orange/80 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity">↗</div>
                    <div class="absolute bottom-6 left-6">
                        <p class="text-white font-bold leading-tight">Web <br/>Development</p>
                    </div>
                </div>

                <!-- Software Development -->
                <div class="service-card relative h-[400px] rounded-[32px] group">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600&auto=format&fit=crop" alt="Software Development" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-akaat-blue/90 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-brand-orange/80 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity">↗</div>
                    <div class="absolute bottom-6 left-6">
                        <p class="text-white font-bold leading-tight">Software <br/>Development</p>
                    </div>
                </div>

                <!-- Training Programs -->
                <div class="service-card relative h-[400px] rounded-[32px] group">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=600&auto=format&fit=crop" alt="Training Programs" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-orange/90 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 bg-akaat-blue/80 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity">↗</div>
                    <div class="absolute bottom-6 left-6">
                        <p class="text-white font-bold leading-tight">Training <br/>Programs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Featured Products Section -->
    <section id="products" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <h2 class="text-4xl font-bold text-[#111827] font-['Plus_Jakarta_Sans']">Shop Products Easily <br> By Category</h2>
                <div class="flex gap-4 md:gap-8 mt-6 md:mt-0 text-gray-400 font-medium font-['Inter'] flex-wrap justify-center md:justify-end">
                    <button class="product-filter active text-[#111827] border-b-2 border-brand-orange pb-1" data-category="popular">Popular</button>
                    <button class="product-filter hover:text-[#111827] transition-colors" data-category="stationery">Stationery</button>
                    <button class="product-filter hover:text-[#111827] transition-colors" data-category="tech">Tech Accessories</button>
                    <button class="product-filter hover:text-[#111827] transition-colors" data-category="office">Office Equipment</button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="products-grid">
                <!-- Product Card 1 - Office Printer (Popular, Office) -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-blue-50 cursor-pointer" data-categories="popular office" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?q=80&w=800&auto=format&fit=crop" alt="Professional Printer" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Professional Printer</p>
                            <p class="font-bold text-lg">$299</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Product Card 2 - Office Stationery Set (Popular, Stationery) -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-green-50 cursor-pointer" data-categories="popular stationery" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?q=80&w=800&auto=format&fit=crop" alt="Office Stationery" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Stationery Bundle</p>
                            <p class="font-bold text-lg">$49</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Product Card 3 - Laptop (Popular, Tech) -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-orange-50 cursor-pointer" data-categories="popular tech" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=800&auto=format&fit=crop" alt="Business Laptop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Business Laptop</p>
                            <p class="font-bold text-lg">$899</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Product Card 4 - Tech Accessories (Popular, Tech) -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-purple-50 cursor-pointer" data-categories="popular tech" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1625842268584-8f3296236761?q=80&w=800&auto=format&fit=crop" alt="Tech Accessories" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Tech Accessories</p>
                            <p class="font-bold text-lg">$79</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Additional Products for Other Categories -->
                <!-- Stationery Only Products -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-yellow-50 cursor-pointer hidden" data-categories="stationery" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1606092195730-5d7b9af1efc5?q=80&w=800&auto=format&fit=crop" alt="Premium Notebooks" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Premium Notebooks</p>
                            <p class="font-bold text-lg">$25</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Office Equipment Only -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-indigo-50 cursor-pointer hidden" data-categories="office" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1541746972996-4e0b0f93e586?q=80&w=800&auto=format&fit=crop" alt="Office Chair" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Ergonomic Chair</p>
                            <p class="font-bold text-lg">$199</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>

                <!-- Tech Accessories Only -->
                <div class="product-card relative group h-[420px] rounded-[40px] overflow-hidden bg-pink-50 cursor-pointer hidden" data-categories="tech" onclick="window.location.href='{{ route('shop') }}'">
                    <img src="https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?q=80&w=800&auto=format&fit=crop" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute bottom-6 left-4 right-4 glass-tag p-4 rounded-3xl flex items-center justify-between">
                        <div class="text-slate-900">
                            <p class="text-xs font-bold opacity-70">Wireless Headphones</p>
                            <p class="font-bold text-lg">$129</p>
                        </div>
                        <button class="bg-brand-orange text-white px-4 py-2 rounded-full text-sm font-bold hover:scale-105 transition" onclick="event.stopPropagation(); window.location.href='{{ route('shop') }}'">Buy</button>
                    </div>
                </div>
            </div>

            <!-- View All Products Button -->
            <div class="text-center mt-12">
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-[#111827] hover:bg-gray-800 text-white font-bold px-8 py-4 rounded-full transition-colors group font-['Plus_Jakarta_Sans']">
                    View All Products
                    <span class="bg-brand-orange text-white w-6 h-6 rounded-full flex items-center justify-center text-[10px] group-hover:rotate-45 transition-transform">↗</span>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Product Filter Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.product-filter');
            const productCards = document.querySelectorAll('.product-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    // Update active button
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active', 'text-[#111827]', 'border-b-2', 'border-brand-orange');
                        btn.classList.add('text-gray-400');
                    });
                    
                    this.classList.add('active', 'text-[#111827]', 'border-b-2', 'border-brand-orange');
                    this.classList.remove('text-gray-400');
                    
                    // Filter products
                    productCards.forEach(card => {
                        const categories = card.getAttribute('data-categories').split(' ');
                        
                        if (categories.includes(category)) {
                            card.classList.remove('hidden');
                            // Add animation
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.transition = 'all 0.3s ease';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 100);
                        } else {
                            card.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>

    <!-- Modern Training Programs Section -->
    <section id="training" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">🎓 TRAINING PROGRAMS</span>
                </div>
                <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Learn & Grow <br/> With <span class="text-brand-orange italic">Expert Training</span>
                </h2>
                <p class="text-gray-600 text-xl max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Master essential digital skills with our comprehensive training programs designed for beginners and professionals alike.
                </p>
            </div>

            <!-- Training Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $trainingPrograms = \App\Models\Service::where('category', 'training')
                        ->where('featured', true)
                        ->where('status', 'active')
                        ->limit(3)
                        ->get();
                @endphp

                @foreach($trainingPrograms as $program)
                    @php
                        $portfolio = $program->portfolio ?? [];
                        $pricing = $program->pricing[0] ?? [];
                        $metaData = $program->meta_data ?? [];
                        
                        // Format price in UGX properly - Fix the formatting
                        $priceValue = $pricing['price'] ?? 0;
                        if ($priceValue >= 1000000) {
                            $millions = $priceValue / 1000000;
                            $price = 'UGX ' . number_format($millions, 1) . 'M';
                        } elseif ($priceValue >= 1000) {
                            $thousands = $priceValue / 1000;
                            $price = 'UGX ' . number_format($thousands) . 'K';
                        } else {
                            $price = $priceValue > 0 ? 'UGX ' . number_format($priceValue) : 'Contact for Price';
                        }
                        
                        // Get color class
                        $colorClass = $portfolio['color'] ?? 'akaat-blue';
                        
                        // Get image
                        $image = $portfolio['image'] ?? 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800&auto=format&fit=crop';
                    @endphp

                    <div class="training-card relative h-[520px] rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group cursor-pointer">
                        <!-- Background Image with better overlay -->
                        <img src="{{ $image }}" alt="{{ $program->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Enhanced Dark Overlay for Better Text Readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/70 to-black/50"></div>
                        
                        <!-- Brand Color Accent Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-{{ $colorClass }}/30 via-transparent to-transparent"></div>
                        
                        <!-- Floating Elements for Visual Interest -->
                        <div class="absolute top-6 right-6 w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                        
                        <!-- Content with Enhanced Styling -->
                        <div class="relative z-10 p-8 h-full flex flex-col justify-between">
                            <!-- Top Section -->
                            <div>
                                <!-- Enhanced Icon Container -->
                                <div class="w-18 h-18 bg-white/15 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/25 transition-all duration-300 shadow-lg">
                                    @if(($metaData['icon'] ?? '') === 'computer')
                                        <svg class="w-9 h-9 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    @elseif(($metaData['icon'] ?? '') === 'design')
                                        <svg class="w-9 h-9 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                        </svg>
                                    @elseif(($metaData['icon'] ?? '') === 'code')
                                        <svg class="w-9 h-9 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        </svg>
                                    @else
                                        <svg class="w-9 h-9 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    @endif
                                </div>
                                
                                <!-- Enhanced Title with Better Typography -->
                                <h3 class="text-2xl font-bold text-white mb-4 font-['Plus_Jakarta_Sans'] leading-tight" style="text-shadow: 0 4px 12px rgba(0,0,0,0.9), 0 2px 6px rgba(0,0,0,1);">
                                    {{ $program->name }}
                                </h3>
                                
                                <!-- Enhanced Description -->
                                <p class="text-white mb-6 leading-relaxed font-['Inter'] text-sm font-medium" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9), 0 1px 4px rgba(0,0,0,1);">
                                    {{ $program->short_description }}
                                </p>
                            </div>
                            
                            <!-- Middle Section - Enhanced Features -->
                            <div class="space-y-3 mb-6">
                                @if(isset($pricing['duration']))
                                    <div class="flex items-center text-sm text-white font-medium" style="text-shadow: 0 2px 6px rgba(0,0,0,0.9);">
                                        <div class="w-2 h-2 bg-white rounded-full mr-3 shadow-lg"></div>
                                        <span>Duration: {{ $pricing['duration'] }}</span>
                                    </div>
                                @endif
                                @if(isset($pricing['schedule']))
                                    <div class="flex items-center text-sm text-white font-medium" style="text-shadow: 0 2px 6px rgba(0,0,0,0.9);">
                                        <div class="w-2 h-2 bg-white rounded-full mr-3 shadow-lg"></div>
                                        <span>{{ $pricing['schedule'] }}</span>
                                    </div>
                                @endif
                                @if(isset($metaData['level']))
                                    <div class="flex items-center text-sm text-white font-medium" style="text-shadow: 0 2px 6px rgba(0,0,0,0.9);">
                                        <div class="w-2 h-2 bg-white rounded-full mr-3 shadow-lg"></div>
                                        <span>Level: {{ $metaData['level'] }}</span>
                                    </div>
                                @endif
                                @if(isset($metaData['students']))
                                    <div class="flex items-center text-sm text-white/90 font-medium" style="text-shadow: 0 2px 6px rgba(0,0,0,0.9);">
                                        <div class="w-2 h-2 bg-white/70 rounded-full mr-3 shadow-lg"></div>
                                        <span>{{ $metaData['students'] }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Bottom Section - Enhanced Price & CTA -->
                            <div class="flex items-center justify-between">
                                <div class="text-3xl font-bold text-white font-['Plus_Jakarta_Sans']" style="text-shadow: 0 4px 12px rgba(0,0,0,0.9), 0 2px 6px rgba(0,0,0,1);">
                                    {{ $price }}
                                </div>
                                <a href="{{ route('training.enroll') }}" class="bg-white/95 hover:bg-white text-gray-900 hover:text-{{ $colorClass }} px-6 py-3 rounded-full font-semibold transition-all duration-300 group-hover:scale-105 transform shadow-xl hover:shadow-2xl backdrop-blur-sm border border-white/20">
                                    Enroll Now
                                </a>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-{{ $colorClass }}/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @endforeach

                @if($trainingPrograms->count() === 0)
                    <!-- Fallback content if no training programs are found -->
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">Training programs will be available soon. Register to get notified when they're ready.</p>
                        <a href="{{ route('training.enroll') }}" class="inline-block mt-4 bg-brand-orange text-white px-6 py-3 rounded-full font-semibold hover:bg-[#e14a30] transition-colors">
                            Enroll Now
                        </a>
                    </div>
                @endif
            </div>

            <!-- Training Features -->
            <div class="mt-16 bg-white rounded-[40px] p-12 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-akaat-blue/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Expert Instructors</h4>
                        <p class="text-gray-600 font-['Inter']">Learn from industry professionals with years of practical experience</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-akaat-green/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Certification</h4>
                        <p class="text-gray-600 font-['Inter']">Receive recognized certificates upon successful course completion</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-brand-orange/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans']">Flexible Schedule</h4>
                        <p class="text-gray-600 font-['Inter']">Choose from morning, evening, or weekend classes that fit your lifestyle</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-12">
                <a href="{{ route('services.training') }}" class="inline-flex items-center gap-2 bg-[#111827] hover:bg-gray-800 text-white font-bold px-8 py-4 rounded-full transition-colors group font-['Plus_Jakarta_Sans']">
                    View All Training Programs
                    <span class="bg-brand-orange text-white w-6 h-6 rounded-full flex items-center justify-center text-[10px] group-hover:rotate-45 transition-transform">↗</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Portfolio Gallery Section -->
    <section id="gallery" class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-10 text-center mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                <span class="text-xs font-bold text-brand-orange">📸 OUR PORTFOLIO</span>
            </div>
            <h2 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                Our Work <span class="text-brand-orange italic">Gallery</span>
            </h2>
            <p class="text-gray-600 text-xl max-w-3xl mx-auto leading-relaxed font-['Inter']">
                Explore our portfolio of successful projects, from stunning print designs to cutting-edge web applications and satisfied training graduates.
            </p>
        </div>

        <!-- Filter Tags -->
        <div class="flex flex-wrap justify-center gap-3 mb-16 px-4">
            <button class="gallery-filter active px-6 py-2.5 rounded-full bg-akaat-blue text-white font-semibold text-sm transition" data-filter="all">
                All Projects
            </button>
            <button class="gallery-filter px-6 py-2.5 rounded-full border border-gray-200 text-gray-600 font-semibold text-sm hover:border-brand-orange transition" data-filter="printing">
                Printing
            </button>
            <button class="gallery-filter px-6 py-2.5 rounded-full border border-gray-200 text-gray-600 font-semibold text-sm hover:border-brand-orange transition" data-filter="web">
                Web Development
            </button>
            <button class="gallery-filter px-6 py-2.5 rounded-full border border-gray-200 text-gray-600 font-semibold text-sm hover:border-brand-orange transition" data-filter="software">
                Software
            </button>
            <button class="gallery-filter px-6 py-2.5 rounded-full border border-gray-200 text-gray-600 font-semibold text-sm hover:border-brand-orange transition" data-filter="training">
                Training
            </button>
        </div>

        <!-- Dynamic 3D Slider -->
        <div class="relative w-full overflow-visible">
            <div class="gallery-container">
                <div class="gallery-track" id="galleryTrack">
                    <!-- Cards will be initialized via JS -->
                </div>
            </div>
            
            <!-- Navigation Controls -->
            <div class="flex justify-center items-center gap-6 mt-8">
                <button id="prevBtn" class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center hover:bg-akaat-blue hover:text-white transition group">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                
                <!-- Auto-slide control -->
                <button id="autoSlideBtn" class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center hover:bg-brand-orange hover:text-white transition group" title="Pause/Play Auto-slide">
                    <svg id="pauseIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6"/>
                    </svg>
                    <svg id="playIcon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.333-5.89a1.5 1.5 0 000-2.538L6.3 2.841z"/>
                    </svg>
                </button>
                
                <button id="nextBtn" class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center hover:bg-akaat-blue hover:text-white transition group">
                    <svg class="w-6 h-6 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
            
            <!-- Progress indicator -->
            <div class="flex justify-center mt-4">
                <div class="flex gap-2" id="progressDots">
                    <!-- Dots will be generated by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <script>
        // Gallery 3D Slider Implementation
        const track = document.getElementById('galleryTrack');
        
        // Load portfolio items from database
        const portfolioItems = @json($portfolioItems ?? []);

        let activeIndex = 2; // Start with the 3rd image as center
        let currentFilter = 'all';
        let filteredItems = [...portfolioItems];
        let autoSlideInterval;
        let isAutoSliding = true;
        let autoSlideEnabled = true;

        function updateProgressDots() {
            const progressContainer = document.getElementById('progressDots');
            progressContainer.innerHTML = '';
            
            filteredItems.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${
                    index === activeIndex 
                        ? 'bg-brand-orange scale-125' 
                        : 'bg-gray-300 hover:bg-gray-400'
                }`;
                dot.onclick = () => {
                    activeIndex = index;
                    renderGallery();
                    pauseAutoSlide();
                };
                progressContainer.appendChild(dot);
            });
        }

        function updateAutoSlideButton() {
            const pauseIcon = document.getElementById('pauseIcon');
            const playIcon = document.getElementById('playIcon');
            
            if (autoSlideEnabled) {
                pauseIcon.classList.remove('hidden');
                playIcon.classList.add('hidden');
            } else {
                pauseIcon.classList.add('hidden');
                playIcon.classList.remove('hidden');
            }
        }

        function startAutoSlide() {
            if (autoSlideInterval) clearInterval(autoSlideInterval);
            
            autoSlideInterval = setInterval(() => {
                if (isAutoSliding && autoSlideEnabled && filteredItems.length > 1) {
                    activeIndex = (activeIndex + 1) % filteredItems.length;
                    renderGallery();
                }
            }, 4000); // Auto-slide every 4 seconds
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        function pauseAutoSlide() {
            isAutoSliding = false;
            setTimeout(() => {
                isAutoSliding = true;
            }, 8000); // Resume auto-slide after 8 seconds of inactivity
        }

        function filterGallery(category) {
            currentFilter = category;
            if (category === 'all') {
                filteredItems = [...portfolioItems];
            } else {
                filteredItems = portfolioItems.filter(item => item.category === category);
            }
            activeIndex = Math.min(activeIndex, filteredItems.length - 1);
            if (activeIndex < 0) activeIndex = 0;
            renderGallery();
            
            // Restart auto-slide with new filtered items
            startAutoSlide();
        }

        function renderGallery() {
            track.innerHTML = '';
            
            filteredItems.forEach((item, index) => {
                const card = document.createElement('div');
                card.className = 'gallery-card';
                const pos = index - activeIndex;
                card.setAttribute('data-pos', pos);
                
                if (Math.abs(pos) > 2) {
                    card.classList.add('hidden-pos');
                }

                // Add video play icon for video items
                let overlay = '';
                if (item.type === 'video') {
                    overlay = `
                        <div class="absolute bottom-6 right-6 play-btn w-12 h-12 rounded-full flex items-center justify-center cursor-pointer" onclick="openVideoModal('${item.media_url}', '${item.title}')">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.333-5.89a1.5 1.5 0 000-2.538L6.3 2.841z"/>
                            </svg>
                        </div>
                    `;
                }

                // Add title overlay with more information
                const titleOverlay = `
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <h3 class="text-white font-bold text-lg">${item.title}</h3>
                        <p class="text-white/80 text-sm capitalize">${item.category}</p>
                        ${item.description ? `<p class="text-white/70 text-xs mt-1 line-clamp-2">${item.description}</p>` : ''}
                    </div>
                `;

                card.innerHTML = `
                    <img src="${item.src}" class="w-full h-full object-cover" alt="${item.title}">
                    ${overlay}
                    ${titleOverlay}
                    ${pos === 0 ? '<div class="absolute inset-0 bg-black/0 hover:bg-black/10 transition-colors cursor-pointer flex items-center justify-center opacity-0 hover:opacity-100"><div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center"><svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg></div></div>' : ''}
                `;
                
                card.onclick = () => {
                    if (pos === 0) {
                        // If it's the center card, open lightbox
                        openImageLightbox(item);
                    } else {
                        // If it's a side card, center it
                        activeIndex = index;
                        renderGallery();
                        pauseAutoSlide();
                    }
                };
                
                track.appendChild(card);
            });
            
            updateProgressDots();
        }

        // Navigation controls
        document.getElementById('prevBtn').onclick = () => {
            if (activeIndex > 0) {
                activeIndex--;
            } else {
                activeIndex = filteredItems.length - 1; // Loop to end
            }
            renderGallery();
            pauseAutoSlide(); // Pause auto-slide when user interacts
        };

        document.getElementById('nextBtn').onclick = () => {
            if (activeIndex < filteredItems.length - 1) {
                activeIndex++;
            } else {
                activeIndex = 0; // Loop to beginning
            }
            renderGallery();
            pauseAutoSlide(); // Pause auto-slide when user interacts
        };

        // Filter controls
        document.querySelectorAll('.gallery-filter').forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active filter button
                document.querySelectorAll('.gallery-filter').forEach(b => {
                    b.classList.remove('active', 'bg-akaat-blue', 'text-white');
                    b.classList.add('border', 'border-gray-200', 'text-gray-600');
                });
                
                this.classList.add('active', 'bg-akaat-blue', 'text-white');
                this.classList.remove('border', 'border-gray-200', 'text-gray-600');
                
                // Filter gallery
                const filter = this.getAttribute('data-filter');
                filterGallery(filter);
                pauseAutoSlide(); // Pause auto-slide when user interacts
            });
        });

        // Auto-slide control button
        document.getElementById('autoSlideBtn').onclick = () => {
            autoSlideEnabled = !autoSlideEnabled;
            updateAutoSlideButton();
            
            if (autoSlideEnabled) {
                startAutoSlide();
            } else {
                stopAutoSlide();
            }
        };

        // Pause auto-slide when user hovers over gallery
        const galleryContainer = document.querySelector('.gallery-container');
        galleryContainer.addEventListener('mouseenter', () => {
            isAutoSliding = false;
        });
        
        galleryContainer.addEventListener('mouseleave', () => {
            isAutoSliding = true;
        });

        // Initialize gallery and start auto-slide
        renderGallery();
        updateAutoSlideButton();
        startAutoSlide();

        // Video modal functionality
        function openVideoModal(videoUrl, title) {
            // Extract YouTube video ID
            const videoId = videoUrl.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
            
            if (videoId && videoId[1]) {
                const embedUrl = `https://www.youtube.com/embed/${videoId[1]}?autoplay=1`;
                
                // Create modal
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4';
                modal.innerHTML = `
                    <div class="bg-white rounded-2xl overflow-hidden max-w-4xl w-full max-h-[90vh]">
                        <div class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-lg font-bold text-gray-900">${title}</h3>
                            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                        </div>
                        <div class="aspect-video">
                            <iframe src="${embedUrl}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
                
                // Close on background click
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
            }
        }

        // Image lightbox functionality
        function openImageLightbox(item) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/95 flex items-center justify-center z-50 p-4';
            modal.innerHTML = `
                <div class="relative max-w-7xl max-h-[95vh] w-full h-full flex items-center justify-center">
                    <!-- Close button -->
                    <button onclick="closeModal()" class="absolute top-4 right-4 z-10 w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    
                    <!-- Image container -->
                    <div class="relative max-w-full max-h-full flex flex-col items-center">
                        <img src="${item.src}" alt="${item.title}" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl">
                        
                        <!-- Image info -->
                        <div class="mt-6 text-center max-w-2xl">
                            <h3 class="text-2xl font-bold text-white mb-2">${item.title}</h3>
                            <p class="text-white/80 text-lg capitalize mb-3">${item.category}</p>
                            ${item.description ? `<p class="text-white/70 text-sm leading-relaxed">${item.description}</p>` : ''}
                            
                            <!-- Meta data -->
                            ${item.meta_data && item.meta_data.client ? `
                                <div class="mt-4 flex flex-wrap justify-center gap-4 text-sm text-white/60">
                                    <span>Client: ${item.meta_data.client}</span>
                                    ${item.meta_data.project_date ? `<span>Date: ${item.meta_data.project_date}</span>` : ''}
                                </div>
                            ` : ''}
                            
                            <!-- Technologies/Services -->
                            ${item.meta_data && (item.meta_data.technologies || item.meta_data.services) ? `
                                <div class="mt-3 flex flex-wrap justify-center gap-2">
                                    ${(item.meta_data.technologies || item.meta_data.services || []).map(tech => 
                                        `<span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs text-white">${tech}</span>`
                                    ).join('')}
                                </div>
                            ` : ''}
                        </div>
                    </div>
                    
                    <!-- Navigation arrows -->
                    <button onclick="navigateLightbox(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <button onclick="navigateLightbox(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            // Close on background click
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
            
            // Close on Escape key
            document.addEventListener('keydown', handleEscapeKey);
        }

        // Navigate through images in lightbox
        function navigateLightbox(direction) {
            const newIndex = (activeIndex + direction + filteredItems.length) % filteredItems.length;
            activeIndex = newIndex;
            
            // Close current modal and open new one
            closeModal();
            setTimeout(() => {
                openImageLightbox(filteredItems[activeIndex]);
            }, 100);
        }

        // Handle escape key
        function handleEscapeKey(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        }

        function closeModal() {
            const modal = document.querySelector('.fixed.inset-0.bg-black\\/95, .fixed.inset-0.bg-black\\/90');
            if (modal) {
                modal.remove();
                document.body.style.overflow = '';
                document.removeEventListener('keydown', handleEscapeKey);
            }
        }

        // Make functions global
        window.openVideoModal = openVideoModal;
        window.openImageLightbox = openImageLightbox;
        window.navigateLightbox = navigateLightbox;
        window.closeModal = closeModal;
    </script>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-10 grid lg:grid-cols-[1fr_2fr] gap-20 items-center">
            <!-- Left Side: Header & Nav -->
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">💬 TESTIMONIALS</span>
                </div>
                <h2 class="text-6xl font-extrabold text-slate-900 mb-8 leading-tight font-['Plus_Jakarta_Sans']">
                    From our<br/>
                    <span class="text-brand-orange italic">community</span>.
                </h2>
                <p class="text-gray-500 text-xl mb-12 max-w-sm font-['Inter']">
                    Here's what our clients and students say about AKAAT Technologies.
                </p>
                <div class="flex gap-4">
                    <button id="testimonialPrev" class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center hover:bg-akaat-blue hover:text-white transition group">
                        <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button id="testimonialNext" class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center hover:bg-akaat-blue hover:text-white transition group">
                        <svg class="w-6 h-6 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Right Side: Active Testimonial -->
            <div class="relative">
                <div class="relative z-10" id="activeTestimonial">
                    <span class="text-akaat-blue font-serif text-[120px] absolute -top-16 -left-8 opacity-20 leading-none">"</span>
                    <blockquote class="testimonial-quote text-[42px] font-bold text-slate-900 leading-[1.2] mb-12 relative z-10 font-['Plus_Jakarta_Sans']">
                        AKAAT Technologies transformed our business with their exceptional web development services. Professional, reliable, and innovative!
                    </blockquote>
                    <div class="flex items-center gap-4 testimonial-author">
                        <div class="w-16 h-16 rounded-full overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200" alt="John Mukasa" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                        </div>
                        <div>
                            <h4 class="text-xl font-extrabold text-slate-900 leading-none mb-1 font-['Plus_Jakarta_Sans']">John Mukasa</h4>
                            <p class="text-gray-500 text-sm font-['Inter']">CEO, Kampala Tech Solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Testimonials data
        const testimonials = [
            {
                quote: "AKAAT Technologies transformed our business with their exceptional web development services. Professional, reliable, and innovative!",
                author: "John Mukasa",
                position: "CEO, Kampala Tech Solutions",
                image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200",
                category: "web"
            },
            {
                quote: "The graphic design training program exceeded my expectations. I now run my own successful design studio thanks to AKAAT!",
                author: "Sarah Nakato",
                position: "Freelance Graphic Designer",
                image: "https://images.unsplash.com/photo-1494790108755-2616b612b786?q=80&w=200",
                category: "training"
            },
            {
                quote: "Outstanding printing quality and fast turnaround time. AKAAT has been our trusted partner for all marketing materials.",
                author: "David Ssemakula",
                position: "Marketing Manager, Uganda Retail Ltd",
                image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200",
                category: "printing"
            },
            {
                quote: "The custom software solution AKAAT developed streamlined our entire business operations. Highly recommended!",
                author: "Grace Namugga",
                position: "Operations Director, East Africa Logistics",
                image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200",
                category: "software"
            },
            {
                quote: "From zero programming knowledge to landing my first developer job in 6 months. AKAAT's training is world-class!",
                author: "Peter Kiggundu",
                position: "Junior Developer, Tech Innovations Uganda",
                image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200",
                category: "training"
            },
            {
                quote: "Professional business cards and branding materials that perfectly represent our company. Excellent attention to detail!",
                author: "Mary Namusoke",
                position: "Founder, Kampala Fashion House",
                image: "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=200",
                category: "printing"
            }
        ];

        let currentTestimonialIndex = 0;

        function updateTestimonial(index) {
            const testimonial = testimonials[index];
            const quoteElement = document.querySelector('.testimonial-quote');
            const authorElement = document.querySelector('.testimonial-author');
            
            // Fade out
            quoteElement.style.opacity = '0';
            authorElement.style.opacity = '0';
            
            setTimeout(() => {
                // Update content
                quoteElement.textContent = testimonial.quote;
                authorElement.innerHTML = `
                    <div class="w-16 h-16 rounded-full overflow-hidden">
                        <img src="${testimonial.image}" alt="${testimonial.author}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                    </div>
                    <div>
                        <h4 class="text-xl font-extrabold text-slate-900 leading-none mb-1 font-['Plus_Jakarta_Sans']">${testimonial.author}</h4>
                        <p class="text-gray-500 text-sm font-['Inter']">${testimonial.position}</p>
                    </div>
                `;
                
                // Fade in
                quoteElement.style.opacity = '1';
                authorElement.style.opacity = '1';
            }, 300);
        }

        // Navigation controls
        document.getElementById('testimonialPrev').addEventListener('click', () => {
            currentTestimonialIndex = (currentTestimonialIndex - 1 + testimonials.length) % testimonials.length;
            updateTestimonial(currentTestimonialIndex);
        });

        document.getElementById('testimonialNext').addEventListener('click', () => {
            currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
            updateTestimonial(currentTestimonialIndex);
        });

        // Auto-rotate testimonials
        setInterval(() => {
            currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
            updateTestimonial(currentTestimonialIndex);
        }, 8000); // Change every 8 seconds

        // Add smooth transitions
        document.querySelector('.testimonial-quote').style.transition = 'opacity 0.3s ease';
        document.querySelector('.testimonial-author').style.transition = 'opacity 0.3s ease';
    </script>

    <!-- Modern CTA Section -->
    <section class="py-32 bg-gradient-to-br from-gray-50 via-white to-gray-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #0F4C81 2px, transparent 2px), radial-gradient(circle at 75% 75%, #2ECC71 2px, transparent 2px); background-size: 80px 80px;"></div>
        </div>
        
        <!-- Floating Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-akaat-blue/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-brand-orange/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-akaat-green/3 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-10 relative z-10">
            <div class="grid lg:grid-cols-[1.2fr_1fr] gap-20 items-center">
                <!-- Left Side: Enhanced Content -->
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full mb-8 border border-gray-200 shadow-lg">
                        <div class="w-2 h-2 bg-brand-orange rounded-full animate-pulse"></div>
                        <span class="text-sm font-bold text-brand-orange">TRANSFORM YOUR BUSINESS TODAY</span>
                    </div>
                    
                    <h2 class="text-5xl lg:text-7xl font-extrabold text-[#111827] leading-[0.9] mb-8 font-['Plus_Jakarta_Sans']">
                        Let's Build Something
                        <span class="text-brand-orange italic block">Amazing Together</span>
                    </h2>
                    
                    <p class="text-xl text-gray-600 leading-relaxed mb-12 max-w-xl font-['Inter']">
                        From concept to completion, we're your trusted technology partner. Join 500+ businesses that have transformed their digital presence with AKAAT.
                    </p>
                    
                    <!-- Enhanced Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 mb-16">
                        <a href="{{ route('contact') }}" class="group bg-brand-orange hover:bg-[#e14a30] text-white px-12 py-6 rounded-2xl font-bold text-lg shadow-2xl shadow-orange-200/50 hover:-translate-y-2 transition-all duration-300 flex items-center justify-center gap-4 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 transform -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            <span class="relative z-10">Start Your Project</span>
                            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform relative z-10">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                            </div>
                        </a>
                        
                        <a href="tel:+256123456789" class="group bg-white border-2 border-gray-200 hover:border-akaat-blue hover:bg-akaat-blue text-[#111827] hover:text-white px-12 py-6 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-4 shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Call Us Now
                        </a>
                    </div>
                    
                    <!-- Enhanced Trust Indicators -->
                    <div class="grid grid-cols-3 gap-8">
                        <div class="text-center group">
                            <div class="text-4xl font-bold text-akaat-blue mb-2 group-hover:scale-110 transition-transform">500+</div>
                            <div class="text-sm text-gray-500 font-medium">Projects Delivered</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-4xl font-bold text-akaat-green mb-2 group-hover:scale-110 transition-transform">98%</div>
                            <div class="text-sm text-gray-500 font-medium">Client Satisfaction</div>
                        </div>
                        <div class="text-center group">
                            <div class="text-4xl font-bold text-brand-orange mb-2 group-hover:scale-110 transition-transform">24/7</div>
                            <div class="text-sm text-gray-500 font-medium">Support Available</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Enhanced Visual Element -->
                <div class="relative">
                    <!-- Main Dashboard Card -->
                    <div class="relative bg-white rounded-[32px] p-8 shadow-2xl border border-gray-100 overflow-hidden">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-akaat-blue/5 via-transparent to-brand-orange/5"></div>
                        
                        <!-- Header -->
                        <div class="relative z-10 flex items-center justify-between mb-8">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-akaat-blue to-akaat-green rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-xl">A</span>
                                </div>
                                <div>
                                    <div class="font-bold text-[#111827] text-lg">AKAAT Technologies</div>
                                    <div class="text-sm text-gray-500">Your Technology Partner</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-xs text-gray-500 font-medium">Online</span>
                            </div>
                        </div>
                        
                        <!-- Services Grid -->
                        <div class="relative z-10 grid grid-cols-2 gap-4 mb-8">
                            <div class="group p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="w-10 h-10 bg-akaat-blue rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <div class="font-semibold text-[#111827] text-sm">Web Dev</div>
                                <div class="text-xs text-gray-500">50+ Projects</div>
                            </div>
                            
                            <div class="group p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="w-10 h-10 bg-akaat-green rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="font-semibold text-[#111827] text-sm">Software</div>
                                <div class="text-xs text-gray-500">30+ Solutions</div>
                            </div>
                            
                            <div class="group p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="w-10 h-10 bg-brand-orange rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="font-semibold text-[#111827] text-sm">Training</div>
                                <div class="text-xs text-gray-500">200+ Students</div>
                            </div>
                            
                            <div class="group p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl hover:shadow-lg transition-all duration-300 cursor-pointer">
                                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </div>
                                <div class="font-semibold text-[#111827] text-sm">Printing</div>
                                <div class="text-xs text-gray-500">100+ Orders</div>
                            </div>
                        </div>
                        
                        <!-- Bottom CTA -->
                        <div class="relative z-10 flex items-center justify-between p-5 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl">
                            <div>
                                <div class="font-semibold text-[#111827] text-sm">Ready to start?</div>
                                <div class="text-xs text-gray-500">Get your free consultation</div>
                            </div>
                            <div class="flex items-center gap-2 text-brand-orange font-semibold text-sm group cursor-pointer">
                                <span>Let's Talk</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Floating Elements -->
                    <div class="absolute -top-8 -right-8 w-32 h-32 bg-gradient-to-br from-brand-orange/20 to-brand-orange/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <div class="w-16 h-16 bg-brand-orange rounded-full flex items-center justify-center shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-gradient-to-br from-akaat-green/30 to-akaat-green/10 rounded-full backdrop-blur-sm"></div>
                    <div class="absolute top-1/3 -left-10 w-12 h-12 bg-gradient-to-br from-akaat-blue/40 to-akaat-blue/20 rounded-full backdrop-blur-sm"></div>
                    
                    <!-- Animated Dots -->
                    <div class="absolute top-10 right-20 w-2 h-2 bg-brand-orange rounded-full animate-bounce" style="animation-delay: 0s;"></div>
                    <div class="absolute bottom-20 right-10 w-2 h-2 bg-akaat-green rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                    <div class="absolute top-1/2 right-5 w-2 h-2 bg-akaat-blue rounded-full animate-bounce" style="animation-delay: 1s;"></div>
                </div>
            </div>
        </div>
    </section>
@endsection