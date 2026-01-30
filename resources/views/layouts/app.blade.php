<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'AKAAT Technologies - Your Technology Partner')</title>
    <meta name="description" content="@yield('description', 'AKAAT Technologies offers printing & stationery, web development, software development, and computer training services.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
    
    <style>
        .bg-akaat-blue { background-color: #0F4C81; }
        .text-akaat-blue { color: #0F4C81; }
        .bg-akaat-green { background-color: #2ECC71; }
        .text-akaat-green { color: #2ECC71; }
        .bg-brand-orange { background-color: #F39C12; }
        .text-brand-orange { color: #F39C12; }
        .border-akaat-green { border-color: #2ECC71; }
        .hover\:text-akaat-blue:hover { color: #0F4C81; }
        .hover\:text-akaat-green:hover { color: #2ECC71; }
        .hover\:bg-akaat-green:hover { background-color: #2ECC71; }
        
        .nav-link {
            @apply px-4 py-2 text-sm font-medium text-gray-700 hover:text-akaat-blue rounded-lg transition-colors duration-200;
        }
        
        .nav-link.active {
            @apply text-akaat-blue bg-blue-50;
        }
        
        .btn-primary {
            @apply bg-akaat-green hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    <!-- Professional Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Professional Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-akaat-blue rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">A</span>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-akaat-blue">AKAAT</div>
                            <div class="text-sm text-gray-500 -mt-1">Technologies</div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        About Us
                    </a>
                    <div class="relative group">
                        <button class="nav-link flex items-center {{ request()->routeIs('services.*') ? 'active' : '' }}">
                            Services
                            <svg class="ml-1 h-4 w-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ route('services.printing') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-blue transition-colors">
                                    <div class="font-medium">Printing & Stationery</div>
                                    <div class="text-xs text-gray-500">Business cards, flyers, banners</div>
                                </a>
                                <a href="{{ route('services.development') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-blue transition-colors">
                                    <div class="font-medium">Web Development</div>
                                    <div class="text-xs text-gray-500">Modern websites & applications</div>
                                </a>
                                <a href="{{ route('services.software') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-blue transition-colors">
                                    <div class="font-medium">Software Development</div>
                                    <div class="text-xs text-gray-500">Custom software solutions</div>
                                </a>
                                <a href="{{ route('services.training') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-blue transition-colors">
                                    <div class="font-medium">Training Programs</div>
                                    <div class="text-xs text-gray-500">Professional courses</div>
                                </a>
                                <div class="border-t border-gray-100 mt-2 pt-2">
                                    <a href="{{ route('training.enroll') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-green transition-colors">
                                        <div class="font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            Enroll in Training
                                        </div>
                                        <div class="text-xs text-gray-500">Join our courses</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('courses.index') }}" class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }} flex items-center">
                        <svg class="w-4 h-4 mr-1 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Courses
                    </a>
                    <a href="{{ route('shop') }}" class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}">
                        Shop
                    </a>
                    <a href="{{ route('printing.order') }}" class="nav-link {{ request()->routeIs('printing.*') ? 'active' : '' }} flex items-center">
                        <svg class="w-4 h-4 mr-1 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Orders
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </div>

                <!-- Auth Links & CTA -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-700 hover:text-akaat-blue transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                        </svg>
                        <span class="cart-count absolute -top-1 -right-1 bg-akaat-green text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium hidden">0</span>
                    </a>
                    
                    @auth
                        <div class="relative group">
                            <button class="flex items-center text-gray-700 hover:text-akaat-blue text-sm font-medium">
                                <div class="w-8 h-8 bg-akaat-blue rounded-full flex items-center justify-center text-white text-xs font-bold mr-2">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                {{ auth()->user()->name }}
                                <svg class="ml-1 h-4 w-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="py-2">
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-blue transition-colors">
                                        <div class="font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2V7"/>
                                            </svg>
                                            Dashboard
                                        </div>
                                        <div class="text-xs text-gray-500">Orders & account</div>
                                    </a>
                                    @if(auth()->user()->role === 'student' || auth()->user()->role === 'admin')
                                        <a href="/student/dashboard" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-akaat-green transition-colors">
                                            <div class="font-medium flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                                Student Portal
                                            </div>
                                            <div class="text-xs text-gray-500">Courses & learning</div>
                                        </a>
                                    @endif
                                    <div class="border-t border-gray-100 mt-2 pt-2">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full text-left block px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                <div class="font-medium flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                    </svg>
                                                    Sign Out
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-akaat-blue text-sm font-medium">Login</a>
                        <a href="{{ route('contact') }}" class="btn-primary text-sm">Get Started</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <button type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition-colors" id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="px-4 pt-2 pb-3 space-y-1 bg-white border-t border-gray-100">
                <a href="{{ route('home') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">About Us</a>
                <div class="px-3 py-3">
                    <div class="text-base font-medium text-gray-900 mb-2">Services</div>
                    <div class="space-y-1 pl-4">
                        <a href="{{ route('services.printing') }}" class="block py-2 text-sm text-gray-600 hover:text-akaat-blue">Printing & Stationery</a>
                        <a href="{{ route('services.development') }}" class="block py-2 text-sm text-gray-600 hover:text-akaat-blue">Web Development</a>
                        <a href="{{ route('services.software') }}" class="block py-2 text-sm text-gray-600 hover:text-akaat-blue">Software Development</a>
                        <a href="{{ route('services.training') }}" class="block py-2 text-sm text-gray-600 hover:text-akaat-blue">Training Programs</a>
                        <div class="border-t border-gray-200 mt-2 pt-2">
                            <a href="{{ route('training.enroll') }}" class="block py-2 text-sm text-akaat-green hover:text-green-700 font-medium">📚 Enroll in Training</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('shop') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">Shop</a>
                <a href="{{ route('printing.order') }}" class="block px-3 py-3 text-base font-medium text-akaat-green hover:text-green-700 hover:bg-gray-50 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Print Orders
                </a>
                <a href="{{ route('printing.order') }}" class="block px-3 py-3 text-base font-medium text-akaat-green hover:text-green-700 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Orders
                    </div>
                </a>
                <a href="{{ route('cart.index') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                        </svg>
                        Cart
                        <span class="cart-count ml-auto bg-akaat-green text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium hidden">0</span>
                    </div>
                </a>
                <a href="{{ route('contact') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">Contact</a>
                <div class="pt-4 border-t border-gray-100">
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">Dashboard</a>
                        @if(auth()->user()->role === 'student' || auth()->user()->role === 'admin')
                            <a href="/student/dashboard" class="block px-3 py-3 text-base font-medium text-akaat-green hover:text-green-700 hover:bg-gray-50 rounded-lg">📚 Student Portal</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full text-left block px-3 py-3 text-base font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg">Sign Out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:text-akaat-blue hover:bg-gray-50 rounded-lg">Login</a>
                        <a href="{{ route('contact') }}" class="block mx-3 mt-2 btn-primary text-center">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    @hasSection('breadcrumbs')
        @yield('breadcrumbs')
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="bg-[#111827] text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #0F4C81 2px, transparent 2px), radial-gradient(circle at 75% 75%, #2ECC71 2px, transparent 2px); background-size: 80px 80px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-10 relative z-10">
            <!-- Main Footer Content -->
            <div class="py-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-16 h-16 bg-brand-orange rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-2xl">A</span>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white font-['Plus_Jakarta_Sans']">AKAAT Technologies</div>
                            <div class="text-brand-orange font-medium font-['Inter']">Your Technology Partner</div>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-8 max-w-md leading-relaxed font-['Inter']">
                        Empowering businesses and individuals with cutting-edge technology solutions, professional training, and exceptional service. Transform your digital presence with AKAAT.
                    </p>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4 mb-8">
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-brand-orange rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="h-5 w-5 text-white group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-brand-orange rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="h-5 w-5 text-white group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-brand-orange rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="h-5 w-5 text-white group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-brand-orange rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="h-5 w-5 text-white group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Newsletter Signup -->
                    <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                        <h4 class="text-lg font-bold text-white mb-3 font-['Plus_Jakarta_Sans']">Stay Updated</h4>
                        <p class="text-gray-300 text-sm mb-4 font-['Inter']">Get the latest tech insights and updates</p>
                        <div class="flex gap-3">
                            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange">
                            <button class="bg-brand-orange hover:bg-[#e14a30] px-6 py-3 rounded-xl font-semibold transition-colors">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-xl font-bold mb-8 text-white font-['Plus_Jakarta_Sans'] flex items-center">
                        <div class="w-2 h-8 bg-brand-orange rounded-full mr-3"></div>
                        Services
                    </h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('services.printing') }}" class="text-gray-300 hover:text-brand-orange transition-colors flex items-center group font-['Inter']">
                            <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Printing & Stationery
                        </a></li>
                        <li><a href="{{ route('services.development') }}" class="text-gray-300 hover:text-brand-orange transition-colors flex items-center group font-['Inter']">
                            <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Web Development
                        </a></li>
                        <li><a href="{{ route('services.software') }}" class="text-gray-300 hover:text-brand-orange transition-colors flex items-center group font-['Inter']">
                            <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Software Development
                        </a></li>
                        <li><a href="{{ route('services.training') }}" class="text-gray-300 hover:text-brand-orange transition-colors flex items-center group font-['Inter']">
                            <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Training Programs
                        </a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-300 hover:text-brand-orange transition-colors flex items-center group font-['Inter']">
                            <svg class="w-4 h-4 mr-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Shop Products
                        </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-8 text-white font-['Plus_Jakarta_Sans'] flex items-center">
                        <div class="w-2 h-8 bg-akaat-green rounded-full mr-3"></div>
                        Get in Touch
                    </h3>
                    <ul class="space-y-6 text-gray-300">
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-brand-orange/20 rounded-xl flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="h-5 w-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-white mb-1">+256 123 456 789</div>
                                <div class="text-sm text-gray-400">Mon-Fri 8AM-6PM</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-akaat-green/20 rounded-xl flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="h-5 w-5 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-white mb-1">info@akaattech.com</div>
                                <div class="text-sm text-gray-400">24/7 Support</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-akaat-blue/20 rounded-xl flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                <svg class="h-5 w-5 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-white mb-1">Kampala, Uganda</div>
                                <div class="text-sm text-gray-400">East Africa</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-white/10 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-gray-400 text-sm font-['Inter']">
                        &copy; {{ date('Y') }} AKAAT Technologies. All rights reserved. Built with ❤️ in Uganda.
                    </div>
                    <div class="flex flex-wrap gap-8 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors font-['Inter']">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors font-['Inter']">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors font-['Inter']">Cookie Policy</a>
                        <a href="{{ route('contact') }}" class="text-brand-orange hover:text-[#e14a30] transition-colors font-semibold font-['Inter']">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/1234567890" target="_blank" class="w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-110 flex items-center justify-center">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
            </svg>
        </a>
    </div>

    @livewireScripts
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        
        // Load cart count on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadCartCount();
        });
        
        function loadCartCount() {
            fetch('/cart/data')
                .then(response => response.json())
                .then(data => {
                    updateCartCount(data.count);
                })
                .catch(error => {
                    console.log('Cart count not available');
                });
        }
        
        // Initialize cart count on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
        });
        
        function updateCartCount(count = null) {
            if (count === null) {
                // Fetch current cart count
                fetch('/cart/data')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateCartCountDisplay(data.totalItems);
                        }
                    })
                    .catch(error => console.error('Error fetching cart data:', error));
            } else {
                updateCartCountDisplay(count);
            }
        }
        
        function updateCartCountDisplay(count) {
            const cartCountElements = document.querySelectorAll('.cart-count');
            cartCountElements.forEach(element => {
                element.textContent = count;
                if (count > 0) {
                    element.classList.remove('hidden');
                } else {
                    element.classList.add('hidden');
                }
            });
        }
    </script>
    
    @livewireScripts
    @stack('scripts')
</body>
</html>