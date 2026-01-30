@extends('layouts.guest')

@section('title', 'Register - AKAAT Technologies')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 flex">
    <!-- Left Column - Register Form -->
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
                    Create Account
                </h1>
                <p class="text-gray-600">
                    Join AKAAT Technologies and unlock access to our courses, services, and more
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-2xl">
                    <p class="text-sm text-green-800">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name"
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Enter your full name">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

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
                               autocomplete="new-password"
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Create a password">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:border-akaat-blue focus:ring-2 focus:ring-akaat-blue/20 outline-none transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Confirm your password">
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms and Privacy -->
                <div class="flex items-start">
                    <input id="terms" 
                           type="checkbox" 
                           name="terms"
                           required
                           class="h-4 w-4 text-akaat-blue border-gray-300 rounded focus:ring-akaat-blue focus:ring-2 mt-1">
                    <label for="terms" class="ml-3 text-sm text-gray-600">
                        I agree to the <a href="#" class="text-akaat-blue hover:text-blue-700 font-medium">Terms of Service</a> and <a href="#" class="text-akaat-blue hover:text-blue-700 font-medium">Privacy Policy</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button type="submit" 
                        class="w-full bg-akaat-blue text-white py-4 px-6 rounded-2xl font-semibold text-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Create Account
                </button>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gradient-to-br from-blue-50 via-white to-green-50 text-gray-500">
                            Already have an account?
                        </span>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center justify-center w-full py-4 px-6 border-2 border-akaat-blue text-akaat-blue rounded-2xl font-semibold text-lg hover:bg-akaat-blue hover:text-white focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:ring-offset-2 transition-all duration-200">
                        Sign In Instead
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Column - Brand Image/Content -->
    <div class="hidden lg:flex flex-1 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-akaat-green via-green-600 to-green-800">
            <!-- Geometric Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="grid-register" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid-register)" />
                </svg>
            </div>
            
            <!-- Floating Elements -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-32 right-16 w-24 h-24 bg-akaat-blue/20 rounded-full blur-lg animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white/5 rounded-full blur-md animate-pulse delay-500"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-center px-12 text-white">
            <!-- Main Logo/Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-white/10 backdrop-blur-sm rounded-3xl flex items-center justify-center border border-white/20 shadow-2xl">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
            </div>

            <!-- Welcome Message -->
            <h2 class="text-4xl font-bold font-['Plus_Jakarta_Sans'] mb-4">
                Join AKAAT Technologies
            </h2>
            <p class="text-xl text-green-100 mb-8 max-w-md leading-relaxed">
                Start your journey with us and gain access to cutting-edge courses, professional services, and expert guidance.
            </p>

            <!-- Benefits List -->
            <div class="space-y-4 text-left">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-green-100">Access to Premium Courses & Training</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-green-100">Professional Certificates & Badges</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-green-100">Priority Support & Services</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-green-100">Exclusive Member Benefits</span>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-8 p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                <p class="text-sm text-green-100 mb-2">Join our community</p>
                <p class="text-lg font-semibold">Start learning and growing today</p>
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
    .from-akaat-green { --tw-gradient-from: #2ECC71; }
    .via-akaat-green { --tw-gradient-via: #2ECC71; }
    .to-akaat-green { --tw-gradient-to: #2ECC71; }
    .bg-akaat-blue\/20 { background-color: rgba(15, 76, 129, 0.2); }
    
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
