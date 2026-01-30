<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - AKAAT Technologies</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --akaat-blue: #0F4C81;
            --akaat-green: #2ECC71;
            --akaat-dark: #1a202c;
        }
        
        body { 
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .sidebar {
            transition: transform 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
        
        .sidebar-item {
            transition: all 0.2s ease;
            position: relative;
        }
        
        .sidebar-item:hover {
            background-color: rgba(15, 76, 129, 0.1);
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background: linear-gradient(135deg, #0F4C81 0%, #1e88e5 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(15, 76, 129, 0.3);
        }
        
        .sidebar-item.active svg {
            color: white;
        }
        
        .metric-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }
        
        .metric-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-green {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        
        .gradient-orange {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .gradient-purple {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideInUp 0.5s ease-out forwards;
        }
        
        .progress-ring {
            transition: stroke-dashoffset 0.5s ease;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #0F4C81;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #1e88e5;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50">

    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
    
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-white shadow-2xl flex flex-col h-full">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-jakarta font-bold text-xl text-gray-900">AKAAT</h1>
                        <p class="text-xs text-gray-500 font-medium">Technologies</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <div class="space-y-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 px-3">MAIN MENU</p>
                    
                    <a href="{{ route('dashboard') }}" class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('dashboard.orders') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        My Orders
                        @if($stats['pending_orders'] > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $stats['pending_orders'] }}</span>
                        @endif
                    </a>
                    
                    <a href="{{ route('shop') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Shop Products
                    </a>
                </div>
                
                <div class="mt-8 space-y-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 px-3">E-LEARNING</p>
                    
                    <a href="{{ route('courses.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        My Courses
                        @if($learningStats['active_courses'] > 0)
                        <span class="ml-auto bg-purple-500 text-white text-xs px-2 py-1 rounded-full">{{ $learningStats['active_courses'] }}</span>
                        @endif
                    </a>
                    
                    <a href="{{ route('student.dashboard') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Learning Progress
                    </a>
                    
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        Achievements
                        @if($learningStats['total_badges'] > 0)
                        <span class="ml-auto bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">{{ $learningStats['total_badges'] }}</span>
                        @endif
                    </a>
                </div>
                
                <div class="mt-8 space-y-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 px-3">SERVICES</p>
                    
                    <a href="{{ route('printing.order') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Printing Services
                    </a>
                    
                    <a href="{{ route('training.enroll') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Training Programs
                    </a>
                </div>
            </nav>
            
            <!-- User Profile -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-900 text-sm truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <div class="bg-white border-b border-gray-200 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-jakarta font-bold text-gray-900">Good Morning,</h1>
                        <p class="text-lg text-gray-600 font-medium">{{ auth()->user()->name }} 👋</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.07 2.82l-.9.9a2 2 0 000 2.83L12 9.38l2.83-2.83a2 2 0 000-2.83l-.9-.9a2 2 0 00-2.83 0z"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- Cart -->
                        <button class="relative p-2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-akaat-green text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                        
                        <!-- Profile -->
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-akaat-blue rounded-full flex items-center justify-center text-white font-bold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="hidden md:block">
                                <p class="font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="p-8">
                <!-- Hero Card -->
                <div class="bg-gradient-to-r from-akaat-green to-green-600 rounded-2xl p-8 mb-8 text-white relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-64 h-64 opacity-20">
                        <svg viewBox="0 0 200 200" class="w-full h-full">
                            <circle cx="100" cy="100" r="80" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="100" cy="100" r="60" fill="none" stroke="currentColor" stroke-width="2"/>
                            <circle cx="100" cy="100" r="40" fill="none" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    
                    <div class="relative z-10 flex items-center justify-between">
                        <div class="flex-1">
                            <h2 class="text-3xl font-jakarta font-bold mb-2">Here's happening in your sales last weeks 👋</h2>
                            <div class="flex items-baseline gap-2 mb-4">
                                <span class="text-4xl font-bold">
                                    UGX 
                                    @php
                                        $amount = $stats['total_spent'];
                                        if ($amount >= 1000000) {
                                            echo number_format($amount / 1000000, 1) . 'M';
                                        } elseif ($amount >= 1000) {
                                            echo number_format($amount / 1000, 0) . 'K';
                                        } else {
                                            echo number_format($amount);
                                        }
                                    @endphp
                                </span>
                                <span class="text-lg opacity-80">Sales profit</span>
                            </div>
                            <p class="opacity-90 mb-6">{{ $stats['total_orders'] }} products are selling and it's increasing from last week.</p>
                            <button class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                View report →
                            </button>
                        </div>
                        
                        <div class="hidden lg:block">
                            <div class="w-64 h-48 relative">
                                <!-- Illustration placeholder -->
                                <div class="absolute inset-0 bg-white/10 rounded-2xl flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Metrics Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- All sessions -->
                    <div class="metric-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-gray-600">All sessions</h3>
                            <div class="flex items-center gap-1">
                                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+12.5%</span>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_orders'] * 12) }}</span>
                            <span class="text-sm text-gray-500">+12.5%</span>
                        </div>
                        <p class="text-sm text-gray-500">No ongoing activity</p>
                        <div class="mt-4 text-sm text-gray-600">44.5%</div>
                    </div>
                    
                    <!-- Product views -->
                    <div class="metric-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-gray-600">Product views</h3>
                            <div class="flex items-center gap-1">
                                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+18.2%</span>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_orders'] * 8) }}</span>
                            <span class="text-sm text-gray-500">+18.2%</span>
                        </div>
                        <p class="text-sm text-gray-500">No cart addition</p>
                        <div class="mt-4 text-sm text-gray-600">26.9%</div>
                    </div>
                    
                    <!-- Add to cart -->
                    <div class="metric-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-gray-600">Add to cart</h3>
                            <div class="flex items-center gap-1">
                                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+24.3%</span>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_orders'] * 3) }}</span>
                            <span class="text-sm text-gray-500">+24.3%</span>
                        </div>
                        <p class="text-sm text-gray-500">Cart conversion</p>
                        <div class="mt-4 text-sm text-gray-600">8.7%</div>
                    </div>
                    
                    <!-- Checkout -->
                    <div class="metric-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-gray-600">Checkout</h3>
                            <div class="flex items-center gap-1">
                                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+31.2%</span>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 mb-2">
                            <span class="text-3xl font-bold text-gray-900">{{ $stats['total_orders'] }}</span>
                            <span class="text-sm text-gray-500">+31.2%</span>
                        </div>
                        <p class="text-sm text-gray-500">Checkout conversion</p>
                        <div class="mt-4 text-sm text-gray-600">19.2%</div>
                    </div>
                </div>
                
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Sales Funnel Chart -->
                    <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-jakarta font-bold text-gray-900">Sales funnel</h3>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="chart-container mb-6">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Right Sidebar -->
                    <div class="space-y-6">
                        <!-- Top Categories -->
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-jakarta font-bold text-gray-900">Top categories</h3>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="relative mb-6">
                                <div class="w-32 h-32 mx-auto">
                                    <canvas id="categoryChart"></canvas>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_orders'] * 100) }}</div>
                                        <div class="text-xs text-gray-500 uppercase">TOTAL SALES</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-akaat-green rounded-full"></div>
                                        <span class="text-sm text-gray-600">Fashion</span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">80.02%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-gray-800 rounded-full"></div>
                                        <span class="text-sm text-gray-600">Electronics</span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">24.53%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                        <span class="text-sm text-gray-600">Food</span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">16.47%</span>
                                </div>
                            </div>
                            
                            <button class="w-full mt-4 text-sm text-akaat-blue hover:text-blue-700 font-medium">
                                View details →
                            </button>
                        </div>
                        
                        <!-- Next Upcoming Event -->
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-jakarta font-bold text-gray-900">Next Upcoming Event</h3>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="mb-6">
                                <div class="w-full h-32 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-4">
                                    <div class="text-white text-center">
                                        <div class="text-3xl font-bold mb-1">%</div>
                                        <div class="text-sm">Special Offer</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Lazada 12.12 event special sales</p>
                                        <p class="text-sm text-gray-500">12 - 14 December 2024 | 20:00</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Free shipping worldwide</p>
                                        <p class="text-sm text-gray-500">12 - 14 December 2024 | 20:00</p>
                                    </div>
                                </div>
                            </div>
                            
                            <button class="w-full mt-4 text-sm text-akaat-blue hover:text-blue-700 font-medium">
                                View event calendar →
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Top Selling Products -->
                <div class="mt-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-jakarta font-bold text-gray-900">Top selling products</h3>
                        <button class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-sm font-medium text-gray-500 border-b border-gray-200">
                                    <th class="pb-3">PRODUCTS</th>
                                    <th class="pb-3">STOCKS</th>
                                    <th class="pb-3">PRICE</th>
                                    <th class="pb-3">SALES</th>
                                    <th class="pb-3">EARNINGS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @if($orders->count() > 0)
                                    @foreach($orders->take(5) as $order)
                                        @foreach($order->orderItems->take(1) as $item)
                                        <tr class="text-sm">
                                            <td class="py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-gray-900">{{ $item->product_name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 text-gray-600">{{ rand(100, 999) }}</td>
                                            <td class="py-4 text-gray-600">UGX {{ number_format($item->unit_price) }}</td>
                                            <td class="py-4 text-gray-600">{{ $item->quantity }}</td>
                                            <td class="py-4">
                                                <div class="flex items-center gap-2">
                                                    <span class="font-medium text-gray-900">UGX {{ number_format($item->total_price) }}</span>
                                                    <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+8.32%</span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-gray-500">
                                            No products sold yet
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Sales Funnel Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3, 20, 25, 18, 30, 28, 35],
                    borderColor: '#2ECC71',
                    backgroundColor: 'rgba(46, 204, 113, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Category Doughnut Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Fashion', 'Electronics', 'Food'],
                datasets: [{
                    data: [80.02, 24.53, 16.47],
                    backgroundColor: ['#2ECC71', '#374151', '#F97316'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>

        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            <!-- Recent Orders - Enhanced -->
            <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 p-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-akaat-blue to-blue-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        Recent Orders
                    </h2>
                    <a href="{{ route('dashboard.orders') }}" class="bg-akaat-blue text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        View All Orders
                    </a>
                </div>
                
                @if($orders->count() > 0)
                    <div class="space-y-6">
                        @foreach($orders as $order)
                            <div class="group border border-gray-200 rounded-2xl p-6 hover:border-akaat-blue hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-akaat-green to-green-600 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $order->order_number }}</p>
                                            <p class="text-sm text-gray-600 font-['Inter']">{{ $order->created_at->format('M d, Y • g:i A') }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-gray-900 text-lg font-['Plus_Jakarta_Sans']">
                                            UGX 
                                            @php
                                                $amount = $order->total_amount;
                                                if ($amount >= 1000000) {
                                                    echo number_format($amount / 1000000, 1) . 'M';
                                                } elseif ($amount >= 1000) {
                                                    echo number_format($amount / 1000, 0) . 'K';
                                                } else {
                                                    echo number_format($amount);
                                                }
                                            @endphp
                                        </p>
                                        <span class="px-3 py-1 rounded-full text-xs font-bold
                                            {{ $order->status->value === 'delivered' ? 'bg-green-100 text-green-800' : 
                                               ($order->status->value === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                            {{ ucfirst($order->status->value) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center gap-4 text-gray-600 font-['Inter']">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                            {{ $order->orderItems->count() }} item(s)
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            </svg>
                                            {{ ucfirst($order->delivery_method) }}
                                        </span>
                                    </div>
                                    <button class="text-akaat-blue hover:text-blue-700 font-medium group-hover:translate-x-1 transition-transform duration-300">
                                        View Details →
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 font-['Plus_Jakarta_Sans']">No orders yet</h3>
                        <p class="text-gray-600 mb-6 font-['Inter']">Start shopping to see your orders here</p>
                        <a href="{{ route('shop') }}" class="bg-akaat-green text-white px-8 py-3 rounded-xl font-bold hover:bg-green-600 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            Start Shopping
                        </a>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Pending Reviews -->
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mr-2">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        </div>
                        Pending Reviews
                    </h3>
                    
                    @if($reviewableOrders->count() > 0)
                        <div class="space-y-4">
                            @foreach($reviewableOrders->take(3) as $order)
                                @foreach($order->orderItems as $item)
                                    <div class="border border-gray-200 rounded-xl p-4 hover:border-akaat-green hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-gray-900 font-['Plus_Jakarta_Sans']">{{ $item->product_name }}</p>
                                                <p class="text-xs text-gray-600 font-['Inter']">Delivered {{ $order->delivered_at ? $order->delivered_at->diffForHumans() : 'recently' }}</p>
                                            </div>
                                        </div>
                                        <button onclick="openReviewModal({{ $item->product_id }}, '{{ $item->product_name }}', {{ $order->id }})" 
                                                class="w-full bg-akaat-green text-white py-2 rounded-lg text-sm font-medium hover:bg-green-600 transition-colors">
                                            Write Review
                                        </button>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 font-['Inter']">No products to review</p>
                            <p class="text-sm text-gray-400 font-['Inter']">Reviews become available after order delivery</p>
                        </div>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-akaat-green to-green-600 rounded-3xl shadow-xl p-6 text-white">
                    <h3 class="text-lg font-bold mb-6 font-['Plus_Jakarta_Sans']">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('shop') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-colors">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <span class="font-medium">Shop Products</span>
                        </a>
                        <a href="{{ route('printing.order') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-colors">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="font-medium">Print Orders</span>
                        </a>
                        <a href="{{ route('training.enroll') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-colors">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="font-medium">Training Programs</span>
                        </a>
                        <a href="{{ route('courses.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-colors">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <span class="font-medium">Browse Courses</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- E-Learning Section -->
        @if($learningStats['total_courses'] > 0)
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    Learning Progress
                </h2>
                <a href="{{ route('student.dashboard') }}" class="bg-purple-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-purple-700 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    Learning Dashboard
                </a>
            </div>

            <!-- Learning Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Active Courses -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $learningStats['active_courses'] }}</p>
                            <p class="text-sm text-gray-600 font-['Inter']">Active Courses</p>
                        </div>
                    </div>
                </div>

                <!-- Completed Courses -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $learningStats['completed_courses'] }}</p>
                            <p class="text-sm text-gray-600 font-['Inter']">Completed</p>
                        </div>
                    </div>
                </div>

                <!-- Total Badges -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $learningStats['total_badges'] }}</p>
                            <p class="text-sm text-gray-600 font-['Inter']">Badges Earned</p>
                        </div>
                    </div>
                </div>

                <!-- Learning Streak -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $learningStats['learning_streak'] }}</p>
                            <p class="text-sm text-gray-600 font-['Inter']">Day Streak</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Learning Section -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Active Courses -->
                <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                        <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        Continue Learning
                    </h3>
                    
                    @if($activeEnrollments->count() > 0)
                        <div class="space-y-6">
                            @foreach($activeEnrollments->take(3) as $enrollment)
                                <div class="border border-gray-200 rounded-2xl p-6 hover:border-purple-300 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-gray-900 font-['Plus_Jakarta_Sans']">{{ $enrollment->course->title }}</h4>
                                                <p class="text-sm text-gray-600 font-['Inter']">{{ $enrollment->course->level }} • {{ $enrollment->course->duration }} hours</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-purple-600 font-['Plus_Jakarta_Sans']">{{ number_format($enrollment->progress_percentage, 0) }}%</p>
                                            <p class="text-xs text-gray-500 font-['Inter']">Complete</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Progress Bar -->
                                    <div class="mb-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full transition-all duration-300" 
                                                 style="width: {{ $enrollment->progress_percentage }}%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-gray-600 font-['Inter']">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Last accessed {{ $enrollment->last_accessed_at ? $enrollment->last_accessed_at->diffForHumans() : 'never' }}
                                            </span>
                                        </div>
                                        <a href="{{ route('courses.show', $enrollment->course) }}" 
                                           class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors">
                                            Continue Learning
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 font-['Plus_Jakarta_Sans']">No active courses</h3>
                            <p class="text-gray-600 mb-6 font-['Inter']">Enroll in a course to start your learning journey</p>
                            <a href="{{ route('courses.index') }}" class="bg-purple-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-purple-700 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                Browse Courses
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Recent Badges & Next Lesson -->
                <div class="space-y-6">
                    <!-- Recent Badges -->
                    @if($recentBadges->count() > 0)
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                            <div class="w-6 h-6 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mr-2">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            Recent Badges
                        </h3>
                        
                        <div class="space-y-3">
                            @foreach($recentBadges->take(3) as $badge)
                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                        🏆
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900 font-['Plus_Jakarta_Sans'] text-sm">{{ $badge->name }}</p>
                                        <p class="text-xs text-gray-600 font-['Inter']">{{ $badge->points }} points</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Next Lesson -->
                    @if($nextLesson)
                    <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-3xl shadow-xl p-6 text-white">
                        <h3 class="text-lg font-bold mb-4 font-['Plus_Jakarta_Sans']">Continue Learning</h3>
                        <div class="mb-4">
                            <p class="font-medium font-['Plus_Jakarta_Sans']">{{ $nextLesson->title }}</p>
                            <p class="text-sm text-purple-100 font-['Inter']">{{ $nextLesson->course->title }}</p>
                        </div>
                        <a href="{{ route('courses.show', $nextLesson->course) }}" 
                           class="block w-full bg-white/20 text-center py-3 rounded-xl font-medium hover:bg-white/30 transition-colors">
                            Start Lesson
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Review Modal -->
<div id="review-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900 font-['Plus_Jakarta_Sans']">Write Review</h3>
            <button onclick="closeReviewModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form id="review-form">
            @csrf
            <input type="hidden" id="review-product-id" name="product_id">
            <input type="hidden" id="review-order-id" name="order_id">
            
            <div class="mb-6">
                <p class="font-bold text-gray-900 mb-4 font-['Plus_Jakarta_Sans']" id="review-product-name"></p>
                
                <label class="block text-sm font-medium text-gray-700 mb-3">Rating *</label>
                <div class="flex gap-2 mb-6">
                    <button type="button" class="star-rating text-2xl" data-rating="1">⭐</button>
                    <button type="button" class="star-rating text-2xl" data-rating="2">⭐</button>
                    <button type="button" class="star-rating text-2xl" data-rating="3">⭐</button>
                    <button type="button" class="star-rating text-2xl" data-rating="4">⭐</button>
                    <button type="button" class="star-rating text-2xl" data-rating="5">⭐</button>
                </div>
                <input type="hidden" id="rating" name="rating" required>
            </div>
            
            <div class="mb-6">
                <label for="review-title" class="block text-sm font-medium text-gray-700 mb-2">Review Title *</label>
                <input type="text" id="review-title" name="title" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
            </div>
            
            <div class="mb-8">
                <label for="review-comment" class="block text-sm font-medium text-gray-700 mb-2">Your Review *</label>
                <textarea id="review-comment" name="comment" rows="4" required 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors"
                          placeholder="Share your experience with this product..."></textarea>
            </div>
            
            <div class="flex gap-4">
                <button type="button" onclick="closeReviewModal()" 
                        class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-medium hover:bg-gray-200 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="flex-1 bg-akaat-blue text-white py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let selectedRating = 0;
    
    // Star rating functionality
    document.querySelectorAll('.star-rating').forEach(star => {
        star.addEventListener('click', function() {
            selectedRating = parseInt(this.dataset.rating);
            document.getElementById('rating').value = selectedRating;
            
            // Update star display
            document.querySelectorAll('.star-rating').forEach((s, index) => {
                if (index < selectedRating) {
                    s.style.opacity = '1';
                } else {
                    s.style.opacity = '0.3';
                }
            });
        });
    });
    
    function openReviewModal(productId, productName, orderId) {
        document.getElementById('review-product-id').value = productId;
        document.getElementById('review-product-name').textContent = productName;
        document.getElementById('review-order-id').value = orderId;
        document.getElementById('review-modal').classList.remove('hidden');
        
        // Reset form
        document.getElementById('review-form').reset();
        selectedRating = 0;
        document.querySelectorAll('.star-rating').forEach(s => s.style.opacity = '0.3');
    }
    
    function closeReviewModal() {
        document.getElementById('review-modal').classList.add('hidden');
    }
    
    // Review form submission
    document.getElementById('review-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (selectedRating === 0) {
            alert('Please select a rating');
            return;
        }
        
        const formData = new FormData(this);
        const productId = document.getElementById('review-product-id').value;
        
        fetch(`/products/${productId}/reviews`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Review submitted successfully!');
                closeReviewModal();
                location.reload();
            } else {
                alert(data.message || 'An error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
</script>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .border-akaat-green { border-color: #2ECC71; }
    .hover\:border-akaat-blue:hover { border-color: #0F4C81; }
    .hover\:border-akaat-green:hover { border-color: #2ECC71; }
    .focus\:ring-akaat-blue:focus { --tw-ring-color: #0F4C81; }
    .focus\:border-akaat-blue:focus { border-color: #0F4C81; }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
    .from-akaat-green { --tw-gradient-from: #2ECC71; }
    .to-akaat-green { --tw-gradient-to: #2ECC71; }
    
    .star-rating {
        opacity: 0.3;
        transition: opacity 0.2s;
        background: none;
        border: none;
        cursor: pointer;
    }
    
    .star-rating:hover {
        opacity: 1;
    }
</style>