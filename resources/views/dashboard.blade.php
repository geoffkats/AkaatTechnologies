@extends('layouts.app')

@section('title', 'Dashboard - AKAAT Technologies')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body { font-family: 'Inter', sans-serif; }
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .sidebar-item {
        transition: all 0.2s ease;
    }
    .sidebar-item:hover {
        background-color: rgba(15, 76, 129, 0.1);
        transform: translateX(4px);
    }
    .sidebar-item.active {
        background-color: #0F4C81;
        color: white;
    }
    .sidebar-item.active svg {
        color: white;
    }
    
    .metric-card {
        transition: all 0.3s ease;
    }
    .metric-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .upgrade-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .chart-container {
        position: relative;
        height: 300px;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-akaat-blue rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-jakarta font-bold text-lg text-gray-900">AKAAT Dashboard</h1>
                        <p class="text-xs text-gray-500">Technologies</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <div class="space-y-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">GENERAL</p>
                    
                    <a href="{{ route('dashboard') }}" class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Dashboard
                        <span class="ml-auto text-xs bg-akaat-blue text-white px-2 py-1 rounded-full">⌘ D</span>
                    </a>
                    
                    <a href="{{ route('dashboard.orders') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Orders
                    </a>
                    
                    <a href="{{ route('shop') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Products
                    </a>
                    
                    <a href="{{ route('courses.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Analytics
                    </a>
                    
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Messages
                    </a>
                </div>
                
                <div class="mt-8">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">HELP & SETTINGS</p>
                    
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"/>
                        </svg>
                        Customer support
                    </a>
                    
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Settings
                    </a>
                </div>
            </nav>
            
            <!-- Upgrade Card -->
            <div class="p-4">
                <div class="upgrade-card rounded-2xl p-4 text-white relative overflow-hidden">
                    <div class="absolute top-2 right-2">
                        <button class="text-white/70 hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mb-3">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="font-jakarta font-bold text-sm mb-1">Upgrade your plan to unlock</h3>
                        <p class="text-xs text-white/80 mb-3">You're not using your plan. Upgrade plan to continue using.</p>
                    </div>
                    <button class="w-full bg-white/20 hover:bg-white/30 text-white text-xs font-medium py-2 px-3 rounded-lg transition-colors">
                        Free plan
                        <span class="ml-2">→</span>
                    </button>
                    <p class="text-xs text-white/60 mt-2 text-center">4 days left</p>
                </div>
            </div>
        </div>
        
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
                                        <p class="font-medium text-gray-900">AKAAT 12.12 event special sales</p>
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
                                        <p class="font-medium text-gray-900">Free delivery Uganda</p>
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
</div>
@endsection

@push('scripts')
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
@endpush