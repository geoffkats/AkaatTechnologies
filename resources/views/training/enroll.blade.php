@extends('layouts.app')

@section('title', 'Training Enrollment - AKAAT Technologies')
@section('description', 'Enroll in AKAAT Technologies training programs. Choose from Computer Basics, Graphic Design, or Programming courses.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Services', 'url' => '#'],
    ['title' => 'Training Programs', 'url' => route('services.training')],
    ['title' => 'Enrollment', 'url' => route('training.enroll')]
]" />
@endsection

@section('content')
    <!-- Training Enrollment Form -->
    <section class="py-20 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full mb-6 border border-gray-200">
                    <span class="text-xs font-bold text-brand-orange">🎓 TRAINING ENROLLMENT</span>
                </div>
                <h1 class="text-4xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">
                    Enroll in Our Training Programs
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto font-['Inter']">
                    Take the first step towards mastering new skills. Fill out the form below to enroll in our professional training programs.
                </p>
            </div>

            <!-- Enrollment Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-800 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('training.enroll.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Personal Information -->
                    <div>
                        <h3 class="text-xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                            <svg class="w-5 h-5 text-brand-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Personal Information
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors"
                                       value="{{ old('first_name') }}">
                                @error('first_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors"
                                       value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors"
                                       value="{{ old('phone') }}" placeholder="+256 XXX XXX XXX">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Training Program Selection -->
                    <div>
                        <h3 class="text-xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                            <svg class="w-5 h-5 text-brand-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Training Program Selection
                        </h3>
                        
                        @php
                            $trainingPrograms = \App\Models\Service::where('category', 'training')
                                ->where('status', 'active')
                                ->get();
                        @endphp

                        <div class="space-y-4">
                            @foreach($trainingPrograms as $program)
                                @php
                                    $pricing = $program->pricing[0] ?? [];
                                    $priceValue = $pricing['price'] ?? 0;
                                    if ($priceValue >= 1000000) {
                                        $price = 'UGX ' . number_format($priceValue / 1000000, 1) . 'M';
                                    } elseif ($priceValue >= 1000) {
                                        $price = 'UGX ' . number_format($priceValue / 1000) . 'K';
                                    } else {
                                        $price = $priceValue > 0 ? 'UGX ' . number_format($priceValue) : 'Contact for Price';
                                    }
                                @endphp
                                
                                <label class="flex items-start p-4 border border-gray-200 rounded-lg hover:border-brand-orange hover:bg-orange-50 transition-colors cursor-pointer">
                                    <input type="radio" name="training_program" value="{{ $program->id }}" required 
                                           class="mt-1 text-brand-orange focus:ring-brand-orange">
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-bold text-[#111827] text-lg">{{ $program->name }}</h4>
                                                <p class="text-gray-600 mt-1">{{ $program->short_description }}</p>
                                                @if(isset($pricing['duration']))
                                                    <p class="text-sm text-gray-500 mt-2">Duration: {{ $pricing['duration'] }}</p>
                                                @endif
                                            </div>
                                            <div class="text-right">
                                                <span class="text-xl font-bold text-brand-orange">{{ $price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        
                        @error('training_program')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <h3 class="text-xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans'] flex items-center">
                            <svg class="w-5 h-5 text-brand-orange mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Additional Information
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="experience_level" class="block text-sm font-semibold text-gray-700 mb-2">Experience Level</label>
                                <select id="experience_level" name="experience_level" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors">
                                    <option value="">Select your level</option>
                                    <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="advanced" {{ old('experience_level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="preferred_schedule" class="block text-sm font-semibold text-gray-700 mb-2">Preferred Schedule</label>
                                <select id="preferred_schedule" name="preferred_schedule" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors">
                                    <option value="">Select schedule</option>
                                    <option value="weekdays" {{ old('preferred_schedule') == 'weekdays' ? 'selected' : '' }}>Weekdays</option>
                                    <option value="weekends" {{ old('preferred_schedule') == 'weekends' ? 'selected' : '' }}>Weekends</option>
                                    <option value="evenings" {{ old('preferred_schedule') == 'evenings' ? 'selected' : '' }}>Evenings</option>
                                    <option value="flexible" {{ old('preferred_schedule') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Additional Comments or Questions</label>
                            <textarea id="message" name="message" rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-colors"
                                      placeholder="Tell us about your goals, any specific requirements, or questions you have...">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center pt-6">
                        <button type="submit" 
                                class="bg-brand-orange hover:bg-[#e14a30] text-white font-bold px-12 py-4 rounded-full text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Submit Enrollment Application
                        </button>
                        <p class="text-sm text-gray-500 mt-4">
                            We'll contact you within 24 hours to confirm your enrollment and provide payment details.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection