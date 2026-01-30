@extends('layouts.app')

@section('title', 'Courses - AKAAT Technologies')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Courses', 'url' => route('courses')]
]" />
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 font-['Plus_Jakarta_Sans'] mb-4">
                    Available <span class="text-akaat-green italic">Courses</span>
                </h1>
                <p class="text-xl text-gray-600 font-['Inter'] max-w-3xl mx-auto">
                    Enhance your skills with our professional training programs designed for real-world success
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <!-- Coming Soon Message -->
        <div class="text-center py-20">
            <div class="w-32 h-32 bg-gradient-to-br from-akaat-blue to-blue-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            
            <h2 class="text-3xl font-bold text-gray-900 mb-4 font-['Plus_Jakarta_Sans']">
                Courses Coming Soon!
            </h2>
            
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto font-['Inter']">
                We're preparing comprehensive training programs in web development, software development, 
                and computer skills. Our e-learning platform will be available soon with interactive 
                lessons, quizzes, and certificates.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('training.enroll') }}" class="bg-akaat-green hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    Pre-Register for Training
                </a>
                <a href="{{ route('contact') }}" class="bg-white border-2 border-akaat-blue text-akaat-blue hover:bg-akaat-blue hover:text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Features Preview -->
        <div class="grid md:grid-cols-3 gap-8 mt-16">
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 font-['Plus_Jakarta_Sans']">Interactive Lessons</h3>
                <p class="text-gray-600 font-['Inter']">Engaging video content with hands-on exercises and real-world projects</p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 font-['Plus_Jakarta_Sans']">Certificates</h3>
                <p class="text-gray-600 font-['Inter']">Earn recognized certificates upon successful completion of courses</p>
            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 font-['Plus_Jakarta_Sans']">Achievement Badges</h3>
                <p class="text-gray-600 font-['Inter']">Unlock badges and track your progress as you master new skills</p>
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
    .hover\:bg-akaat-blue:hover { background-color: #0F4C81; }
    .hover\:text-akaat-blue:hover { color: #0F4C81; }
    .from-akaat-blue { --tw-gradient-from: #0F4C81; }
    .to-akaat-blue { --tw-gradient-to: #0F4C81; }
</style>
@endsection