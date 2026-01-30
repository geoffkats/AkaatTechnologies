@extends('layouts.guest')

@section('title', 'Login - AKAAT Technologies')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 flex">
    <!-- Left Column - Login Form -->
    <div class="flex-1 flex items-center justify-center px-6 lg:px-12 py-12">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center space-x-3">
                    <div class="w-16 h-16 bg-akaat-blue rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-2xl">A</span>
                    </div>
                    <div class="text-left">
                        <div class="text-3xl font-bold text-akaat-blue">AKAAT</div>
                        <div class="text-sm text-gray-500 -mt-1">Technologies</div>
                    </div>
                </a>
            </div>

            <!-- Welcome Text -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] mb-2">
                    Welcome Back
                </h1>
                <p class="text-gray-600">
                    Sign in to access your dashboard and continue your journey with us
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-2xl">
                    <p class="text-sm text-green-800">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Enter your email address">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Enter your password">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember"
                               class="h-4 w-4 text-akaat-blue border-gray-300 rounded focus:ring-akaat-blue focus:ring-2">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm text-akaat-blue hover:text-blue-700 font-medium transition-colors">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" 
                        class="w-full bg-akaat-blue text-white py-4 px-6 rounded-2xl font-semibold text-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Sign In
                </button>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gradient-to-br from-blue-50 via-white to-green-50 text-gray-500">
                            New to AKAAT Technologies?
                        </span>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center justify-center w-full py-4 px-6 border-2 border-akaat-blue text-akaat-blue rounded-2xl font-semibold text-lg hover:bg-akaat-blue hover:text-white focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:ring-offset-2 transition-all duration-200">
                        Create Account
                    </a>
                </div>
            </form>

            <!-- Demo Credentials -->
            <div class="mt-8 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Demo Credentials:</h3>
                <div class="text-xs text-gray-600 space-y-1">
                    <div><strong>Admin:</strong> admin@akaattech.com / password</div>
                    <div><strong>Customer:</strong> customer@example.com / password</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column - Brand Image/Content -->
    <div class="hidden lg:flex flex-1 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-akaat-blue via-blue-600 to-blue-800">
            <!-- Geometric Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)" />
                </svg>
            </div>
            
            <!-- Floating Elements -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-32 right-16 w-24 h-24 bg-akaat-green/20 rounded-full blur-lg animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white/5 rounded-full blur-md animate-pulse delay-500"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-center px-12 text-white">
            <!-- Main Logo/Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-white/10 backdrop-blur-sm rounded-3xl flex items-center justify-center border border-white/20 shadow-2xl">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
            </div>

            <!-- Welcome Message -->
            <h2 class="text-4xl font-bold font-['Plus_Jakarta_Sans'] mb-4">
                Welcome to AKAAT Technologies
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-md leading-relaxed">
                Your trusted partner for innovative technology solutions, professional training, and digital transformation.
            </p>

            <!-- Features List -->
            <div class="space-y-4 text-left">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-akaat-green rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-blue-100">Professional Web & Software Development</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-akaat-green rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-blue-100">Comprehensive Training Programs</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-akaat-green rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-blue-100">Quality Printing & Stationery Services</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-akaat-green rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-blue-100">E-Learning Platform & Certifications</span>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-8 p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                <p class="text-sm text-blue-100 mb-2">Ready to get started?</p>
                <p class="text-lg font-semibold">Join thousands of satisfied customers</p>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .focus\:border-akaat-blue:focus { border-color: #0F4C81; }
    .focus\:ring-akaat-blue:focus { --tw-ring-color: #0F4C81; }
    .focus\:ring-akaat-blue\/20:focus { --tw-ring-color: rgba(15, 76, 129, 0.2); }
    .hover\:bg-akaat-blue:hover { background-color: #0F4C81; }
    .hover\:text-akaat-blue:hover { color: #0F4C81; }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .via-akaat-blue { --tw-gradient-via: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
    .bg-akaat-green\/20 { background-color: rgba(46, 204, 113, 0.2); }
    
    /* Animation for floating elements */
    @keyframes pulse {
        0%, 100% { opacity: 0.4; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }
    
    .animate-pulse {
        animation: pulse 3s ease-in-out infinite;
    }
    
    .delay-500 {
        animation-delay: 0.5s;
    }
    
    .delay-1000 {
        animation-delay: 1s;
    }
</style>
@endsection
